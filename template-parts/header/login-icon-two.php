<?php
if(! defined('ABSPATH')){
    exit;
};

$header_bgc = carbon_get_theme_option('wc_header_background_one');
$header_title = carbon_get_theme_option('wc_header_name_one');
$fon_src = $header_bgc ? wp_get_attachment_image_src($header_bgc, 'full') : '';
$header_desc = carbon_get_theme_option('wc_header_desc_one');
?>

<div class="head-container">
    <div class="">



                    <div class="line">
                        <div class="container">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="navigation">
                                        <div class="container">
                                            <nav class="navbar navbar-default">

                                                <!-- Brand and toggle get grouped for better mobile display -->
                                                <div class="navbar-header nav_2">
                                                    <button type="button" class="navbar-toggle collapsed navbar-toggle1" data-toggle="collapse" data-target="#bs-megadropdown-tabs">
                                                        <span class="sr-only">Toggle navigation</span>
                                                        <span class="icon-bar"></span>
                                                        <span class="icon-bar"></span>
                                                        <span class="icon-bar"></span>
                                                    </button>
                                                </div>
                                                <div class="collapse navbar-collapse" id="bs-megadropdown-tabs">
                                                    <?php
                                                     wc_primary_menu();
                                                     ?>
                                                </div>
                                            </nav>
                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>
<img class="img" src="<?php echo $fon_src[0];?>" width="<?php echo $fon_src[1];?>" height="<?php echo $fon_src[2];?>" alt="">
    </div>

</div>

<style media="screen">
    .head-container{
        height: 400px;
        overflow: hidden;
    }

    .img{
        max-width: 100%;
        height: auto;
    }

.head-container .line{
    position: absolute;
    width: 100%;
    height: 40px;
    background-color: #fff;
    opacity: 0.5;
    font-size: 16px;
    font-weight: bold;
}

</style>
