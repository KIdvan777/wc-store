<?php
if(! defined('ABSPATH')){

	exit;// Exit if accessed directly
}
/**
 * Enqueue scripts and styles.
 */
add_action( 'wp_enqueue_scripts', 'wc_store_styles' );
function wc_store_styles() {
	wp_enqueue_style( 'wc-store-style', get_stylesheet_uri(), array('wc-store-bootstrap-style'),microtime());
	wp_enqueue_style( 'wc-store-google-fonts-style',
	'https://fonts.googleapis.com/css?family=Roboto+Condensed:400,400i,700,700i|Roboto+Slab:300,400,700|Roboto:400,400i,700,700i&amp;subset=cyrillic,cyrillic-ext',
	 array('wc-store-bootstrap-style'), null, 'all');

	wp_enqueue_style( 'wc-store-bootstrap-style', get_template_directory_uri() . '/assets/css/bootstrap.css', array(), null, 'all' );
	wp_enqueue_style( 'wc-store-fasthover-style', get_template_directory_uri() . '/assets/css/fasthover.css', array(), null, 'all' );
	wp_enqueue_style( 'wc-store-flexslider-style', get_template_directory_uri() . '/assets/css/flexslider.css', array(), null, 'all' );
	wp_enqueue_style( 'wc-store-font-awesome-style', get_template_directory_uri() . '/assets/css/font-awesome.css', array(), null, 'all' );
	wp_enqueue_style( 'wc-store-jquery-countdown-style', get_template_directory_uri() . '/assets/css/jquery.countdown.css', array(), null, 'all' );
	wp_enqueue_style( 'wc-store-popuo-box-style', get_template_directory_uri() . '/assets/css/popuo-box.css', array(), null, 'all');
}
add_action( 'wp_enqueue_scripts', 'wc_store_scripts' );

function wc_store_scripts() {
// underscores scripts
	// wp_enqueue_script( 'wc-store-navigation', get_template_directory_uri() . '/js/navigation.js', array(), '20151215', true );
	// wp_enqueue_script( 'wc-store-skip-link-focus-fix', get_template_directory_uri() . '/js/skip-link-focus-fix.js', array(), '20151215', true );

// Theme scripts
	wp_enqueue_script( 'wc-store-jquery-script', get_template_directory_uri() . '/assets/js/jquery.min.js', array(), '20151215', true );
	wp_enqueue_script( 'wc-store-botstrap-script', get_template_directory_uri() . '/assets/js/bootstrap-3.1.1.min.js', array(), '20151215', true );
	wp_enqueue_script( 'wc-store-easyResponsiveTabs-script', get_template_directory_uri() . '/assets/js/easyResponsiveTabs.js', array(), '20151215', true );
	wp_enqueue_script( 'wc-store-imagezoom-script', get_template_directory_uri() . '/assets/js/imagezoom.js', array(), '20151215', true );
	wp_enqueue_script( 'wc-store-jquery-countdown-script', get_template_directory_uri() . '/assets/js/jquery.countdown.js', array(), '20151215', true );
	wp_enqueue_script( 'wc-store-jquery-flexisel-script', get_template_directory_uri() . '/assets/js/jquery.flexisel.js', array(), '20151215', true );
	wp_enqueue_script( 'wc-store-jquery-magnific-popup', get_template_directory_uri() . '/assets/js/jquery.magnific-popup.js', array(), '20151215', true );
	wp_enqueue_script( 'wc-store-jquery-wmuSlider', get_template_directory_uri() . '/assets/js/jquery.wmuSlider.js', array(), '20151215', true );
	wp_enqueue_script( 'wc-store-minicart', get_template_directory_uri() . '/assets/js/minicart.js', array(), '20151215', true );
	wp_enqueue_script( 'wc-store-ajax-search', get_template_directory_uri() . '/assets/js/ajax-search.js', array(), '20151215', true );
	wp_localize_script('wc-store-ajax-search', 'search_form' , array(
		'url' => admin_url( 'admin-ajax.php' ),
		'nonce' => wp_create_nonce('search-nonce'),
	));

	wp_enqueue_script( 'wc-store-ajax-view', get_template_directory_uri() . '/assets/js/ajax-quick-view.js', array(), '20151215', true );
	wp_localize_script('wc-store-ajax-view', 'ajax_quick_view' , array(
		'url' => admin_url( 'admin-ajax.php' ),
		'nonce' => wp_create_nonce('quick-nonce'),
	));

	wp_enqueue_script( 'wc-store-script', get_template_directory_uri() . '/assets/js/custom.min.js', array(), '20151215', true );
	wp_enqueue_script( 'wc-store-script', get_template_directory_uri() . '/assets/js/vendor.min.js', array(), '20151215', true );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
