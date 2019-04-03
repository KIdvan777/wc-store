<?php
if(! defined('ABSPATH')){
    exit;
};

register_nav_menus(array(
    'primary'=>'Первичное',
    'secondary'=>'Вторичное'
));

function wc_primary_menu(){
    wp_nav_menu(array(
        'theme_location'=>'primary',
        'menu_id'       => 'primary-menu',
        'menu_class'    =>'nav navbar-nav',
        'walker'        => new WCC_Walker_Nav,
    ));
}

class WCC_Walker_Nav extends Walker_Nav_Menu{

    public $start_row = '';
    public $end_row = '';

    public function start_lvl( &$output, $depth = 0, $args = array() ) {
        if ( isset( $args->item_spacing ) && 'discard' === $args->item_spacing ) {
            $t = '';
            $n = '';
        } else {
            $t = "\t";
            $n = "\n";
        }
        $indent = str_repeat( $t, $depth );

        // Default class.
        $classes = array( 'sub-menu','dropdown-menu' );
        if(isset($this->start_row) && !empty($this->start_row)){
            $classes[] = 'multi-column columns-3';
        }

        $class_names = join( ' ', apply_filters( 'nav_menu_submenu_css_class', $classes, $args, $depth ) );
        $class_names = $class_names ? ' class="' . esc_attr( $class_names ) . '"' : '';

        $output .= "{$n}{$indent}<ul$class_names>{$n}{$this->start_row}";
    }

    public function end_lvl( &$output, $depth = 0, $args = array() ) {
        if ( isset( $args->item_spacing ) && 'discard' === $args->item_spacing ) {
            $t = '';
            $n = '';
        } else {
            $t = "\t";
            $n = "\n";
        }
        $indent  = str_repeat( $t, $depth );
        $output .= "$indent{$this->end_row}</ul>{$n}";
    }

    public function start_el( &$output, $item, $depth = 0, $args = array(), $id = 0 ) {
        if ( isset( $args->item_spacing ) && 'discard' === $args->item_spacing ) {
            $t = '';
            $n = '';
        } else {
            $t = "\t";
            $n = "\n";
        }
        $indent = ( $depth ) ? str_repeat( $t, $depth ) : '';

        $classes   = empty( $item->classes ) ? array() : (array) $item->classes;
        $classes[] = 'menu-item-' . $item->ID;

        if(in_array('menu-item-has-children', $classes)){
            $classes[] = 'dropdown';
        }

        if(in_array('columns', $classes) && $args->walker->has_children == 1){
            $this->start_row = '<div class="row">';
            $this->end_row = '</div>';
        }else{
            $this->start_row = '';
            $this->end_row = '';
        }

        $args = apply_filters( 'nav_menu_item_args', $args, $item, $depth );

        $class_names = join( ' ', apply_filters( 'nav_menu_css_class', array_filter( $classes ), $item, $args, $depth ) );
        $class_names = $class_names ? ' class="' . esc_attr( $class_names ) . '"' : '';

        $id = apply_filters( 'nav_menu_item_id', 'menu-item-' . $item->ID, $item, $args, $depth );
        $id = $id ? ' id="' . esc_attr( $id ) . '"' : '';

        $output .= $indent . '<li' . $id . $class_names . '>';



        $atts                 = array();
        $atts['title']        = ! empty( $item->attr_title ) ? $item->attr_title : '';
        $atts['target']       = ! empty( $item->target ) ? $item->target : '';
        $atts['rel']          = ! empty( $item->xfn ) ? $item->xfn : '';
        $atts['href']         = ! empty( $item->url ) ? $item->url : '';

        $atts['data-toggle']   = $args->walker->has_children == 1 ? 'dropdown' : '';
		$atts['class']   = $args->walker->has_children == 1 ? 'dropdown-toggle' : '';
		$atts['role']   = $args->walker->has_children == 1 ? 'button' : '';
		$atts['aria-haspopup']   = $args->walker->has_children == 1 ? 'true' : '';
		$atts['aria-expanded']   = $args->walker->has_children == 1 ? 'false' : '';
        $atts['aria-current'] = $item->current ? 'page' : '';


        $atts = apply_filters( 'nav_menu_link_attributes', $atts, $item, $args, $depth );

        $attributes = '';
        foreach ( $atts as $attr => $value ) {
            if ( ! empty( $value ) ) {
                $value       = ( 'href' === $attr ) ? esc_url( $value ) : esc_attr( $value );
                $attributes .= ' ' . $attr . '="' . $value . '"';
            }
        }
        $caret = $args->walker->has_children == 1 ? '<span class="caret"></span>' : '';
        $title = apply_filters( 'the_title', $item->title, $item->ID );

        $title = apply_filters( 'nav_menu_item_title', $title, $item, $args, $depth );

        $item_output  = $args->before;
        $item_output .= '<a' . $attributes . '>';
        $item_output .= $args->link_before . $title . $args->link_after . $caret;
        $item_output .= '</a>';
        $item_output .= $args->after;

        $output .= apply_filters( 'walker_nav_menu_start_el', $item_output, $item, $depth, $args );
    }

    public function end_el( &$output, $item, $depth = 0, $args = array() ) {
        if ( isset( $args->item_spacing ) && 'discard' === $args->item_spacing ) {
            $t = '';
            $n = '';
        } else {
            $t = "\t";
            $n = "\n";
        }
        $output .= "</li>{$n}";
    }

}

add_filter('widget_nav_menu_args', 'wc_add_classes_widget_footer');
function wc_add_classes_widget_footer($nav_menu_args){
    $nav_menu_args['menu_class'] = 'info';
    return $nav_menu_args;

}
