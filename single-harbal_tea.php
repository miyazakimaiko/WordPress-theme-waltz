<?php get_header(); ?>

		<main id="main" role="main" itemscope itemprop="mainContentOfPage" itemtype="http://schema.org/Blog">
			
			<div class="flex-row flex-row-narrow">
	
				<?php 
					if (have_posts()) : while (have_posts()) : the_post();
				    $id = get_the_ID();
				?>

				<article id="post-<?php the_ID(); ?>" class="contents-section" itemscope itemprop="blogPost" itemtype="http://schema.org/BlogPosting">

					<?php custom_breadcrumb(); ?>

					<div class="contents-section__inner">
						<div class="eyecatch">
							<?php the_post_thumbnail('waltz-thumb-560'); ?>
						</div>
					</div>
					<div class="contents-section__inner">
						<div class="contents-title">
							<h2 itemprop="headline"><span><?php the_title(); ?></span></h2>
						</div>
						<div class="contents-main-area">
							<div class="contents-main-area__text" itemprop="articleBody">

								<p>ブレンド：
								<?php
									$terms = wp_get_object_terms($id,'harb_type');
									foreach($terms as $term):
									echo $term->name;
								?>
								
								<?php		
									endforeach;
									wp_reset_postdata();
								?>
								</p>

								<?php
									the_content();

									wp_link_pages( array(
									'before'      => '<div class="page-links"><span class="page-links-title">' . __( 'Pages:', 'bonestheme' ) . '</span>',
									'after'       => '</div>',
									'link_before' => '<span>',
									'link_after'  => '</span>',
									) );
								?>
							</div>
						</div>
					</div><!-- .contents-section__inner -->

					<footer class="article-footer">

						<?php get_template_part( 'template-parts/content', 'share-button' ); ?>

					</footer> 
					
					<?php
					tea_related_posts(array(
						'limit' => 8
					));
					?>

				</article>
				<?php endwhile; ?>

				<?php else : ?>

					<article id="post-not-found">
							<header class="article-header">
								<h1><?php _e( 'Oops, Post Not Found!', 'bonestheme' ); ?></h1>
							</header>
							<section class="entry-content">
								<p><?php _e( 'Uh Oh. Something is missing. Try double checking things.', 'bonestheme' ); ?></p>
							</section>
							<footer class="article-footer">
									<p><?php _e( 'This is the error message in the single.php template.', 'bonestheme' ); ?></p>
							</footer>
					</article>

				<?php endif; ?>
				
				<?php get_sidebar(); ?>
				
			</div>

		</main>

<?php get_footer(); ?>
