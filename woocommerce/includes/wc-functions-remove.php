<?php
if(! defined('ABSPATH')){

	exit;// Exit if accessed directly
}
// turn off wocommerce styles
// add_filter('woocommerce_enqueue_styles', 'jk_dequeue_styles');
// function jk_dequeue_styles($enqueque_styles){
// 	// get_vd($enqueue_styles);
// 	unset( $enqueue_styles['woocommerce-general']); // Remov the gloss
// 	unset( $enqueue_styles['woocommerce-layout']); // Remov the layout
// 	unset( $enqueue_styles['woocommerce-smallscreen']); // Remov the smallscreen
// 	return $enqueue_styles;
// }
// OR
add_filter( 'woocommerce_enqueue_styles', '__return_empty_array' );

// remove sidebar from single-product page
remove_action('woocommerce_sidebar','woocommerce_get_sidebar',10);

// remove_action('woocommerce_after_single_product_summary','woocommerce_output_product_data_tabs',10);
remove_action('woocommerce_after_single_product_summary','woocommerce_upsell_display',15);
// remove_action('woocommerce_after_single_product_summary','woocommerce_output_related_products',20);
remove_action('woocommerce_before_shop_loop_item_title','woocommerce_show_product_loop_sale_flash',10);

/*
 * remove all actions from conten of single-product page
 */
// remove_all_filters('woocommerce_after_single_product_summary');
