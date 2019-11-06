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

								<a href="<?php the_permalink() ?>" class="product__text" rel="bookmark" title="<?php the_title_attribute(); ?>">
									<p><?php the_title(); ?></p>
								</a>

								<div class="product__description">
									<p><?php the_excerpt(); ?></p>
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