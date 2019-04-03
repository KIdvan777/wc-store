<?php
if(! defined('ABSPATH')){
    exit;
};
?>
<div class="cart cart box_1">
    <?php
       if ( function_exists( 'wc_store_woocommerce_header_cart' ) ) {
           wc_store_woocommerce_header_cart();
       }
    ?>
</div>
