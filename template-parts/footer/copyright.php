<?php
if(! defined('ABSPATH')){
    exit;
};
?>
<?php $copyright = carbon_get_theme_option('wc_footer_copyright'); ?>
<div class="footer-copy">
    <div class="footer-copy1">
        <div class="footer-copy-pos">
            <a href="#home1" class="scroll"><img src="<?= get_template_directory_uri() . '/assets/images/arrow.png'?>" alt=" " class="img-responsive" /></a>
        </div>
    </div>
    <div class="container">
        <p><?php echo $copyright; ?></p>
    </div>
</div>
