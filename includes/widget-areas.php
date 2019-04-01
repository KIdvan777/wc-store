<?php
if(! defined('ABSPATH')){

	exit;// Exit if accessed directly
}
/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
add_action( 'widgets_init', 'wc_store_widgets_init' );
function wc_store_widgets_init() {
	register_sidebar( array(
		'name'          => esc_html__( 'Сайдбар магазина', 'wc-store' ),
		'id'            => 'sidebar-shop',
		'description'   => esc_html__( 'Add widgets here.', 'estore' ),
		'before_widget' => '<section id="%1$s" class="widget w3ls_mobiles_grid_left_grid %2$s">',
		'after_widget'  => '</div></section>',
		'before_title'  => '<h3 class="widget-title">',
		'after_title'   => '</h3><div class="w3ls_mobiles_grid_left_grid_sub__shop">',
	) );

	register_sidebar( array(
		'name'          => esc_html__( 'Sidebar', 'wc-store' ),
		'id'            => 'sidebar-1',
		'description'   => esc_html__( 'Add widgets here.', 'estore' ),
		'before_widget' => '<section id="%1$s" class="widget  %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h3>',
		'after_title'   => '</h3>',
	) );

	register_sidebar( array(
		'name'          => esc_html__( 'Контакты', 'wc-store' ),
		'id'            => 'footer-1',
		'description'   => esc_html__( 'Add widgets here.', 'wc-store' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h3>',
		'after_title'   => '</h3>',
	) );
	register_sidebar( array(
		'name'          => esc_html__( 'Информация', 'wc-store' ),
		'id'            => 'footer-2',
		'description'   => esc_html__( 'Add widgets here.', 'wc-store' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h3>',
		'after_title'   => '</h3>',
	) );
	register_sidebar( array(
		'name'          => esc_html__( 'Категории', 'wc-store' ),
		'id'            => 'footer-3',
		'description'   => esc_html__( 'Add widgets here.', 'wc-store' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h3>',
		'after_title'   => '</h3>',
	) );
	register_sidebar( array(
		'name'          => esc_html__( 'Профаил', 'wc-store' ),
		'id'            => 'footer-5',
		'description'   => esc_html__( 'Add widgets here.', 'wc-store' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h3>',
		'after_title'   => '</h3>',
	) );
}
