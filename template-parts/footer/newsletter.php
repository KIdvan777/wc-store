<?php
if(! defined('ABSPATH')){
    exit;
};
?>

<?php
	$newsletter = carbon_get_theme_option('wc_footer_newsletter_show');
	if('on'=== $newsletter):?>
		<div class="newsletter">
			<div class="container">
				<div class="col-md-6 w3agile_newsletter_left">
					<h3>Newsletter</h3>
					<p>Excepteur sint occaecat cupidatat non proident, sunt.</p>
				</div>
				<div class="col-md-6 w3agile_newsletter_right">
					<form action="#" method="post">
						<input type="email" name="Email" placeholder="Email" required="">
						<input type="submit" value="" />
					</form>
				</div>
				<div class="clearfix"> </div>
			</div>
		</div>
		<!-- //newsletter -->
 <?php endif;?>
