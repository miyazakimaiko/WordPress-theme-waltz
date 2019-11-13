<?php get_header(); ?>

		<main id="main" role="main" itemscope itemprop="mainContentOfPage" itemtype="http://schema.org/Blog">

			<!-- FLEXBOX -->
			<div class="flex-row flex-row-narrow">

				<!-- CONTENTS SECTION -->
				<section class="contents-section">

					<h1 class="archive-title"><span><?php _e( 'Search Results for:', 'bonestheme' ); ?></span> <?php echo esc_attr(get_search_query()); ?></h1>

					<div class="contents-section__inner">

						<div class="contents-main-area">
					
							<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
			
									<article id="post-<?php the_ID(); ?>" role="article" class="product product-coffee">

										<a class="product__image" href="<?php the_permalink() ?>">
											<?php
												$thumbnail_id = get_post_thumbnail_id( $post->ID );
												$alt = get_post_meta($thumbnail_id, '_wp_attachment_image_alt', true);   
												the_post_thumbnail( 'full', array( 'alt' => $alt ) );
											?>
										</a>

										<h3 class="product__name">
											<a href="<?php the_permalink() ?>" rel="bookmark" title="<?php the_title_attribute(); ?>">
												<?php the_title(); ?>
											</a>
										</h3>

										<div class="product__description">
											<?php the_excerpt( '<span class="read-more">' . __( 'Read more &raquo;', 'bonestheme' ) . '</span>' ); ?>
										</div>
						
									</article>

							<?php endwhile; ?>

							<?php else : ?>

									<article id="post-not-found" class="hentry cf">
										<header class="article-header">
											<h1><?php _e( 'Sorry, No Results.', 'bonestheme' ); ?></h1>
										</header>
										<section class="entry-content">
											<p><?php _e( 'Try your search again.', 'bonestheme' ); ?></p>
										</section>
										<footer class="article-footer">
												<p><?php _e( 'This is the error message in the search.php template.', 'bonestheme' ); ?></p>
										</footer>
									</article>

							<?php endif; ?>

						</div>

					</div><!-- .contents-section__inner -->

					<?php bones_page_navi(); ?>
			
				</section>

				<?php get_sidebar(); ?>

			</div>

			<!-- BOTTOM-BANNER SECTION -->
			<?php get_template_part( 'template-parts/content', 'banner' ); ?>
		
		</main>

<?php get_footer(); ?>
