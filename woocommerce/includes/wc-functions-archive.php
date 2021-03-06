<?php

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

add_action('woocommerce_before_main_content', 'wc_archive_wrapper_start',40);
function wc_archive_wrapper_start(){
    ?>
    <div class="mobiles">
        <div class="container">
            <div class="w3ls_mobiles_grids">

    <?
}

add_action('woocommerce_after_main_content', 'wc_archive_wrapper_end',40);
function wc_archive_wrapper_end(){
    ?>
                <div class="clearfix"></div>
            </div>
        </div>
    </div>
    <?
}

add_action('woocommerce_before_main_content', 'wc_archive_content_wrapper_start',60);
function wc_archive_content_wrapper_start(){
    ?>
    <div class="col-md-8 w3ls_mobiles_grid_right">
    <?
}

add_action('woocommerce_after_main_content', 'wc_archive_content_wrapper_end',25);
function wc_archive_content_wrapper_end(){
    ?>
    </div>
    <?
}

add_filter('woocommerce_show_page_title','wc_store_hide_title_shop');
function wc_store_hide_title_shop($hide){
	if(is_shop()){
		$hide = false;

	}
	return $hide;
}
remove_action('woocommerce_before_shop_loop_item','woocommerce_template_loop_product_link_open',10);
remove_action( 'woocommerce_after_shop_loop_item', 'woocommerce_template_loop_product_link_close', 5);
add_action('woocommerce_before_shop_loop_item','wc_store_loop_product_div_open', 5);
function wc_store_loop_product_div_open(){
	?>
	<div class="agile_ecommerce_tab_left mobiles_grid">
	<?
}
add_action('woocommerce_after_shop_loop_item','wc_store_loop_product_div_close', 20);
function wc_store_loop_product_div_close(){
	?>
	</div>
	<?
}

add_action( 'woocommerce_before_shop_loop_item_title', 'wc_loop_product_div_image_open', 5 );
function wc_loop_product_div_image_open(){
	?>
	<div class="hs-wrapper hs-wrapper2 mobiles_grid">
	<?php
}
add_action( 'woocommerce_before_shop_loop_item_title', 'wc_loop_product_div_image_close', 30);
function wc_loop_product_div_image_close(){
	global $product;
	$attachment_ids = $product->get_gallery_image_ids();

	if ( $attachment_ids && has_post_thumbnail() ) {
		foreach ( $attachment_ids as $attachment_id ) {
			echo wp_get_attachment_image( $attachment_id, 'shop_catalog');
		}
	}
	?>
	<div class="w3_hs_bottom w3_hs_bottom_sub1">
		<?php woocommerce_show_product_loop_sale_flash(); ?>
		<ul>
			<li>
				<a href="#" data-toggle="modal" data-target="#modal-product"  data-product-id="<?php echo $product->get_id();?>" class="modal-product-link">
					<span class="glyphicon glyphicon-eye-open" aria-hidden="true"></span>
				</a>
			</li>
		</ul>
	</div>
	</div>
	<?php
}

remove_action( 'woocommerce_shop_loop_item_title', 'woocommerce_template_loop_product_title',10 );
add_action( 'woocommerce_shop_loop_item_title', 'wc_template_loop_product_title' , 10);
function wc_template_loop_product_title(){
	echo '<h5><a href="'. get_permalink() .'">' . get_the_title() . '</a></h5>';
}

add_action( 'woocommerce_after_shop_loop_item_title', 'wc_loop_product_div_price_open', 7 );
function wc_loop_product_div_price_open(){
	?>
	<div class="col-md-6 w3ls_mobiles_grid_right_left">
	<?php
}

add_action( 'woocommerce_after_shop_loop_item', 'wc_loop_product_div_price_close', 15 );
function wc_loop_product_div_price_close(){
	?>
	</div>
	<?php
}

add_filter( 'woocommerce_loop_add_to_cart_args', 'wc_add_class_add__to_cart' );
function wc_add_class_add__to_cart($args){

	$args['class'] =  $args['class'] . ' w3ls-cart';
	return $args;
}

remove_filter( 'woocommerce_before_shop_loop', 'woocommerce_result_count',20  );
remove_filter( 'woocommerce_before_shop_loop', 'woocommerce_catalog_ordering',30  );
add_action( 'woocommerce_before_shop_loop', 'wcwc_wrapper_count_and_ordering_start', 15 );
function wcwc_wrapper_count_and_ordering_start(){
	?>
	<div class="w3ls_mobiles_grid_right_grid2">
	<div class="w3ls_mobiles_grid_right_grid2_left">
		<?php woocommerce_result_count();?>
	</div>
	<?php
}
add_action( 'woocommerce_before_shop_loop', 'wc_wrapper_count_and_ordering_close', 35 );
function wc_wrapper_count_and_ordering_close(){
	?>
	<div class="w3ls_mobiles_grid_right_grid2_right">
		<?php woocommerce_catalog_ordering();?>
	</div>
	<div class="clearfix"></div>
	</div>
	<?php
}

// add_action( 'woocommerce_sidebar', 'wc_add_custom_filter', 15);
// function wc_add_custom_filter(){
// 	require get_template_part() . 'parts/filter.php';
// }
