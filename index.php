<?php


$header_two = carbon_get_theme_option('wc_header_two');
$header_one = carbon_get_theme_option('wc_header_one');

if('on'=== $header_two){

	get_header('one');
if('on'=== $header_one){

		get_header('two');

	}

}else{
	get_header();
}

?>

<div class="container">
	<div class="row">
		<div class="col-md-12">
			<?php
				while(have_posts()){
					the_post();?>
					<div class="col-md-8">
					<h2><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
					<?php the_post_thumbnail(); ?>

					</div>
					<div class="col-md-4">
						<p><?php the_author_posts_link(); ?><?= get_avatar(get_the_author_meta('email')); ?><?php echo get_the_category_list(', '); ?></p>
						<p><?php the_date(); ?></p>
						<p><?php the_excerpt(); ?></p>
					</div>
				<?}
			 ?>
		</div>
	</div>
	<?php
		echo paginate_links();
	?>
</div>

<?php
get_footer();
