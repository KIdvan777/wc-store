<?php
if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}

add_action( 'header_parts', 'wc_header_modal', 10 );
function wc_header_modal() {
	get_template_part( 'template-parts/header/modal-login' );
}
add_action( 'header_parts', 'wc_container_start', 15 );
function wc_container_start() {
	?>
	<div class="container">
<?php
}
add_action( 'header_parts', 'wc_header_icon_login', 20 );
function wc_header_icon_login() {
	get_template_part( 'template-parts/header/login-icon' );
}
add_action( 'header_parts_two', 'wc_header_icon_login_two', 20 );
function wc_header_icon_login_two() {
	get_template_part( 'template-parts/header/login-icon-two' );
}
add_action( 'header_parts', 'wc_header_logo', 30 );
function wc_header_logo() {
	get_template_part( 'template-parts/header/logo' );
}
add_action( 'header_parts', 'wc_header_search', 40 );
function wc_header_search() {
	get_template_part( 'template-parts/header/search' );
}
add_action( 'header_parts', 'wc_header_card', 50 );
function wc_header_card() {
	get_template_part( 'template-parts/header/mini-card' );
}
add_action( 'header_parts', 'wc_container_end', 55 );
function wc_container_end() {
	?>
	</div>
	<?php
}
add_action( 'header_parts', 'wc_header_navi', 60 );
function wc_header_navi() {
	get_template_part( 'template-parts/header/navi' );
}
