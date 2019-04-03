<?php
if(! defined('ABSPATH')){
    exit;
};
?>
<div class="w3l_logo">
    <?php
    $logo_id = carbon_get_theme_option(wc_header_logo);
    $logo = $logo_id ? wp_get_attachment_image_src($logo_id, 'full') : '';
    $site_name = carbon_get_theme_option('wc_header_name')? carbon_get_theme_option('wc_header_name'):get_bloginfo('name');
    $site_decs = carbon_get_theme_option('wc_header_desc')? carbon_get_theme_option('wc_header_desc'):get_bloginfo('description');
    ?>

    <?php if (is_front_page() && is_home()) :?>
        <?php if ($logo_id) :?>
            <h1 class="logo-title">
                <img src="<?php echo $logo[0];?>" width="<?php echo $logo[1];?>" height="<?php echo $logo[2];?>" alt="">
            </h1>
        <?php else: ?>
            <h1 class="logo-title">
                <?php echo $site_name; ?><span><?php echo $site_decs; ?></span>
            </h1>
        <?php endif;?>
    <?php else:?>
        <?php if ($logo_id) :?>
            <div class="logo-title h1">
                <a href="<?php echo home_url('/');?>">
                    <img src="<?php echo $logo[0];?>" width="<?php echo $logo[1];?>" height="<?php echo $logo[2];?>" alt="">
                </a>
            </div>
        <?php else: ?>
            <div class="logo-title h1">
                <a href="<?php echo home_url('/');?>">
                    <?php echo $site_name; ?><span><?php echo $site_decs; ?></span>
                </a>
            </div>
        <?php endif;?>
    <?php endif;?>
</div>
