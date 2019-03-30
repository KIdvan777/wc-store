<?php
if(! defined('ABSPATH')){
    exit;
};
?>

<?php
	$footer_widgets = carbon_get_theme_option('wc_footer_widget_show');
    if('on'=== $footer_widgets):?>
<div class="container">
    <div class="w3_footer_grids">
        <div class="col-md-3 w3_footer_grid">
            <?php if(is_active_sidebar('footer-1')){
                dynamic_sidebar('footer-1');
            } ?>
        </div>
        <div class="col-md-3 w3_footer_grid">
            <?php if(is_active_sidebar('footer-2')){
                dynamic_sidebar('footer-2');
            } ?>
        </div>
        <div class="col-md-3 w3_footer_grid">
            <?php if(is_active_sidebar('footer-3')){
                dynamic_sidebar('footer-3');
            } ?>
        </div>
        <div class="col-md-3 w3_footer_grid">
            <?php if(is_active_sidebar('footer-4')){
                dynamic_sidebar('footer-4');
            } ?>
            
        </div>
        <div class="clearfix"> </div>
    </div>
</div>
<?php endif;?>
