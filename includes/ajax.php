<?php
if(! defined('ABSPATH')){
    exit;
}
add_action('wp_ajax_search-ajax', 'wc_ajax_search_action_callback');
add_action('wp_ajax_nopriv_search-ajax', 'wc_ajax_search_action_callback');
function wc_ajax_search_action_callback(){
    // get_vd($_POST);

    if (!wp_verify_nonce($_POST['nonce'], 'search-nonce')){
		wp_die('Данные отправлены с левого адреса');
	}

	$args = array(
		'post_type' => array('post', 'product'),
		'post_status' => 'publish',
		's' => $_POST['s']
	);
	$query_ajax = new WP_Query($args);
    $json_data['out'] = ob_start(PHP_OUTPUT_HANDLER_CLEANABLE);
    if($query_ajax->have_posts()){
        while($query_ajax->have_posts()){
            $query_ajax->the_post();
            ?>
            <div class="search-result-text">
                <div class="title-search">
                    <a href="<?= get_permalink(); ?>" style="color:#fff"><?php echo get_the_title(); ?></a>
                </div>
            </div>
            <?
        }
    }else{
        ?>
            <div class="search-result-text" style="color:#fff">
                Ничего не найдено
            </div>
        <?
    }
    $json_data['out'] .= ob_get_clean();
    wp_send_json($json_data);
    wp_die();
}
