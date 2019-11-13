<?php get_header(); ?>

		<main id="main" role="main" itemscope itemprop="mainContentOfPage" itemtype="http://schema.org/Blog">

			<!-- FLEXBOX -->
			<div class="flex-row flex-row-narrow">

				<!-- CONTENTS SECTION -->
				<section class="contents-section">
					<?php custom_breadcrumb(); ?>
					<div class="contents-section__inner">
						<div class="contents-title">
						<?php
							$paged = ( get_query_var( 'paged' ) ) ? get_query_var( 'paged' ) : 1;
							$wp_query = new WP_Query();
							$my_posts1 = array(
								'paged' => $paged,
								'post_type' => 'harbal_tea',
								'posts_per_page'=> '12'
							);
							$wp_query->query( $my_posts1 );

							the_archive_title( '<h2><span>', '</span></h2>' );
							the_archive_description( '<div class="taxonomy-description">', '</div>' );
						?>
						</div>
						<div class="contents-main-area">

						<?php
							if( $wp_query->have_posts() ): while( $wp_query->have_posts() ) : $wp_query->the_post();
							$id = get_the_ID();
						?>
	
							<article id="post-<?php echo $id ?>" role="article" class="product product-coffee">

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

								<ul class="product__tags">
										<?php
											$terms = wp_get_object_terms($id,'harb_type');
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
									?>
								</ul>

								<div class="product__description">
									<?php the_excerpt(); ?>
								</div>
				
							</article>

							<?php endwhile; ?>
					
						</div>
					</div><!-- .contents-section__inner -->

					<?php bones_page_navi();  endif; wp_reset_postdata(); ?>

				</section>

				<?php get_sidebar(); ?>

			</div>

			<!-- BOTTOM-BANNER SECTION -->
			<?php get_template_part( 'template-parts/content', 'banner' ); ?>

		</main>

<?php get_footer(); ?>
