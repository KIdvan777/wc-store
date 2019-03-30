<?php

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}
// Remove customize and than add breadcrumbs template single-product
remove_action('woocommerce_before_main_content','woocommerce_breadcrumb',20);

add_action('woocommerce_before_main_content', 'wc_add_breadcrumbs', 20);
function wc_add_breadcrumbs(){
    ?>
    <!-- breadcrumbs -->
    <div class="breadcrumb_dress">
        <div class="container">
            <?php woocommerce_breadcrumb(); ?>
        </div>
    </div>
    <!-- //breadcrumbs -->
    <?
}
/*
 * Wrappers single product
 */
add_action('woocommerce_before_single_product','wc_wrapper_product_start',5 );
function wc_wrapper_product_start(){
	?>
	<div class="single">
		<div class="container">
	<?
}

add_action('woocommerce_after_single_product','wc_wrapper_product_end',5 );
function wc_wrapper_product_end(){
	?>
		</div>
	</div>
	<?
}

add_action( 'woocommerce_before_single_product_summary', 'wc_wrapper_product_image_start', 5 );
function wc_wrapper_product_image_start() {
	?>
	<div class="col-md-4 single-left">
	<?php
}
add_action( 'woocommerce_before_single_product_summary', 'wc_wrapper_product_image_end', 25 );
function wc_wrapper_product_image_end() {
	?>
	</div>
	<?php
}
add_action( 'woocommerce_before_single_product_summary', 'wc_wrapper_product_entry_start', 30 );
function wc_wrapper_product_entry_start() {
	?>
	<div class="col-md-8 single-right">
	<?php
}
add_action( 'woocommerce_after_single_product_summary', 'wc_wrapper_product_entry_end', 5 );
function wc_wrapper_product_entry_end() {
	?>
	</div>
	<div class="clearfix"> </div>
	<?php
}
//  add rewiews stars
function wc_store_woocommerce_scripts() {
	wp_enqueue_style( 'wc-store-woocommerce-style', get_template_directory_uri() . '/woocommerce.css' );

	$font_path   = WC()->plugin_url() . '/assets/fonts/';
	$inline_font = '@font-face {
			font-family: "star";
			src: url("' . $font_path . 'star.eot");
			src: url("' . $font_path . 'star.eot?#iefix") format("embedded-opentype"),
				url("' . $font_path . 'star.woff") format("woff"),
				url("' . $font_path . 'star.ttf") format("truetype"),
				url("' . $font_path . 'star.svg#star") format("svg");
			font-weight: normal;
			font-style: normal;
		}';

	wp_add_inline_style( 'wc-store-woocommerce-style', $inline_font );
}
add_action( 'wp_enqueue_scripts', 'wc_store_woocommerce_scripts' );
// customize product description(excerpt)
add_filter('woocommerce_short_description','wc_short_description', 10);
function wc_short_description($content){
?>
<div class="description">
	<?php echo $content; // WPCS: XSS ok. ?>
</div>
<?
}
/*
 * Tabs single product
 */
add_filter('woocommerce_product_tabs', 'wc_custom_product_tabs');
function wc_custom_product_tabs($tabs){
// get_vd($tabs);
if ( ! empty( $tabs ) ) : ?>
<div class="woocommerce-tabs wc-tabs-wrapper additional_info">
		<div class="container">
			<div class="sap_tabs">
				<div id="horizontalTab1" style="display: block; width: 100%; margin: 0px;">
					<ul>
						<?php foreach ( $tabs as $key => $tab ) : ?>
							<li class="<?php echo esc_attr( $key ); ?>_tab resp-tab-item"
								id="tab-title-<?php echo esc_attr( $key ); ?>" role="tab">
								<span><?php echo apply_filters( 'woocommerce_product_' . $key .
								'_tab_title', esc_html( $tab['title'] ), $key ); ?></span>
							</li>
						<?php endforeach; ?>
					</ul>
					<?php foreach ( $tabs as $key => $tab ) : ?>
						<div class=" resp-tab-content resp-tab-content-active additional_info_grid"
							id="tab-<?php echo esc_attr( $key ); ?>" role="tabpanel">
							<?php if ( isset( $tab['callback'] ) ) {
								call_user_func( $tab['callback'], $key, $tab );
							} ?>
						</div>
					<?php endforeach; ?>
				</div>
			</div>
			<!-- <script type="text/javascript">
                jQuery(document).ready(function () {
                    jQuery('#horizontalTab1').easyResponsiveTabs({
                        type: 'default', //Types: default, vertical, accordion
                        width: 'auto', //auto or any width like 600px
                        fit: true   // 100% fit in a container
                    });
                });
			</script> -->
		</div>
<?php endif; }

add_filter('woocommerce_product_additional_information_heading', 'wc_heading_tab_remove');

add_filter('woocommerce_product_description_heading', 'wc_heading_tab_remove');
function wc_heading_tab_remove($heading){
	$heading = false;
	return $heading;
}
/*
 * Tabs reviews single product
 */
add_filter( 'woocommerce_review_gravatar_size', 'estore_resize_gravatar' );
function estore_resize_gravatar(){
return '80';
}
remove_filter( 'woocommerce_review_before_comment_meta', 'woocommerce_review_display_rating', 10 );
add_action( 'woocommerce_review_after_comment_text', 'woocommerce_review_display_rating', 10 );
