<?php

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}

add_action( 'wc_footer_action', 'wc_footer_newsletter', 10 );
function wc_footer_newsletter() {
	get_template_part( 'template-parts/footer/newsletter' );
}
add_action( 'wc_footer_action', 'wc_footer_container_start',15 );
function wc_footer_container_start() {
?>
    <div class="footer">

<?php
}

add_action( 'wc_footer_action', 'wc_footer_widgets', 20 );
function wc_footer_widgets() {
    get_template_part( 'template-parts/footer/widgets' );
}
add_action( 'wc_footer_action', 'wc_footer_copyright', 30 );
function wc_footer_copyright() {
	get_template_part( 'template-parts/footer/copyright' );
}

add_action( 'wc_footer_action', 'wc_footer_container_end', 35 );
function wc_footer_container_end() {
?>
    </div>
<?php
}
