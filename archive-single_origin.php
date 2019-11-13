<?php get_header(); ?>

	<main id="main" role="main" itemscope itemprop="mainContentOfPage" itemtype="http://schema.org/Blog">

		<!-- FLEXBOX -->
		<div class="flex-row flex-row-narrow">
            <!-- SIDE BAR -->
            <?php get_sidebar(); ?>

            <!-- CONTENTS SECTION -->
            <section class="contents-section">
				<?php custom_breadcrumb(); ?>
                <div class="contents-section__inner">
                    <div class="contents-title">
					<?php
						the_archive_title( '<h2>', '</h2>' );
						the_archive_description( '<div class="taxonomy-description">', '</div>' );
					?>
                    </div>
                    <div class="contents-main-area">

					<?php 
					if (have_posts()) : while (have_posts()) : the_post(); 
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

							<a href="<?php the_permalink() ?>" class="product__text" rel="bookmark" title="<?php the_title_attribute(); ?>"><p><?php the_title(); ?></p></a>

							<ul class="product__tags">
									<?php
										$terms = wp_get_object_terms($id,'roast_grade');
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
								<p>¥<?php the_field('price_for_a_cup'); ?>/１杯　¥<?php the_field('price_for_100g'); ?>/100g(豆売)</p>
							</div>
			
						</article>

						<?php endwhile; ?>

								<?php bones_page_navi(); ?>

						<?php else : ?>

						<article id="post-not-found" class="hentry cf">
							<header class="article-header">
								<h1><?php _e( 'Oops, Post Not Found!', 'bonestheme' ); ?></h1>
							</header>
							<section class="entry-content">
								<p><?php _e( 'Uh Oh. Something is missing. Try double checking things.', 'bonestheme' ); ?></p>
							</section>
							<footer class="article-footer">
									<p><?php _e( 'This is the error message in the archive.php template.', 'bonestheme' ); ?></p>
							</footer>
						</article>

						<?php endif; ?>
                
                    </div>
                </div><!-- .contents-section__inner -->
            </section>

        </div>

        <!-- BOTTOM-BANNER SECTION -->
        <?php get_template_part( 'template-parts/content', 'banner' ); ?>

	</main>

<?php get_footer(); ?>
