<?php get_header(); ?>

		<main id="main" role="main" itemscope itemprop="mainContentOfPage" itemtype="http://schema.org/Blog">

			<!-- FLEXBOX -->
			<div class="flex-row flex-row-narrow">

				<!-- CONTENTS SECTION -->
				<section class="contents-section">
					<?php custom_breadcrumb(); ?>
					<div class="contents-section__inner">
						<div class="contents-title">
						<h2><?php single_cat_title(); ?></h2>
						</div>
						<div class="contents-main-area">

						<?php
							if( have_posts() ): while( have_posts() ) : the_post();
							$id = get_the_ID();
						?>
	
							<article id="post-<?php echo $id ?>" role="article" class="product product-coffee">

								<a class="product__image" href="<?php the_permalink() ?>">
									<?php the_post_thumbnail( 'full' );	?>
								</a>

								<h3 class="product__name">
									<a href="<?php the_permalink() ?>" rel="bookmark" title="<?php the_title_attribute(); ?>">
										<?php the_title(); ?>
									</a>
								</h3>

								<ul class="product__tags">
									<?php
										$terms = wp_get_object_terms($id,'roast_grade');
										if($terms):
										foreach($terms as $term):
									?>
										<li class="<?php echo $term->slug; ?>">
											<span class="tag-span">
												<small><?php echo $term->name; ?></small>
											</span>
										</li>
									<?php
										endforeach;
										wp_reset_postdata();
										endif;
									?>
								</ul>

								<div class="product__description">
									<?php the_excerpt(); ?>
								</div>
				
							</article>

							<?php endwhile; endif; wp_reset_postdata(); ?>

									<?php bones_page_navi(); ?>
					
						</div>
					</div><!-- .contents-section__inner -->

				</section>

				<?php get_sidebar(); ?>

			</div>

			<!-- BOTTOM-BANNER SECTION -->
			<?php get_template_part( 'template-parts/content', 'banner' ); ?>

		</main>

<?php get_footer(); ?>