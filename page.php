<?php
/**
 * The template for displaying all single posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package estore
 */
get_header(); ?>
	<div class="container single-section">
		<div class="w3ls_mobiles_grids">
			<?php
				$parent_page = wp_get_post_parent_id(get_the_id());
				$page_array = get_pages(array(
					'child_of'=>get_the_id()
				));?>
			<div id="primary" <? if($parent_page or $page_array ){
				?>
				class="col-md-8"
				<?
			}else{?>
				class="col-md-12"
			<?}?>>
				<!-- Breadcrumbs -->
				<div class="breadcrumbs">
					<?php

						if($parent_page){
						?>
							<a class="btn btn-danger" href="<?= get_permalink($parent_page);?>">Back to:<?= get_the_title($parent_page); ?></a>
							<span class="btn btn-simple"><?php the_title(); ?></span>
						<?
						}
					 ?>

				</div>

				<main id="main" class="site-main">

					<?php
					while ( have_posts() ) : the_post();
						get_template_part( 'template-parts/content', get_post_type() );
						the_post_navigation();
						// If comments are open or we have at least one comment, load up the comment template.
						if ( comments_open() || get_comments_number() ) :
							comments_template();
						endif;
					endwhile; // End of the loop.
					?>

				</main><!-- #main -->
			</div><!-- #primary -->
			<div class="col-md-4 newest">


						<?php if($parent_page or $page_array){?>

							<h2 >
								<a class="btn btn-primary" href="<?= get_permalink($parent_page);?>">
									<?= get_the_title($parent_page); ?></a>
							</h2>

							<ul>
								<?php
								if($parent_page){
									$children_pages = $parent_page;
								}else{
									$children_pages = get_the_id();
								}

								// add_filter( 'wp_list_pages', 'filter_function_name_3998', 10, 3 );
								// function filter_function_name_3998( $output, $r, $pages ){
								// 	get_pr($r);
                                //
                                //
								// 	return $output;
								// 	}

								wp_list_pages(array(
									'title_li' => NULL,
									'child_of' => $children_pages,

								));?>
								<style media="screen">
									.current_page_item{
										color: red;
									}
								</style>
							</ul>
							<?}?>



				 <?php #get_sidebar(); ?>
			</div>
		</div>
	</div>
<?php
get_footer();
