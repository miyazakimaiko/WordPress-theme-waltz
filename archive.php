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
							the_archive_title( '<h2>', '</h2>' );
							the_archive_description( '<div class="taxonomy-description">', '</div>' );
						?>
						</div>
						<div class="contents-main-area">
							
							<?php if (have_posts()) : while (have_posts()) : the_post(); ?>

							<article id="post-<?php the_ID(); ?>" class="each-article" role="article">
                
								<div class="contents-section__inner">
									<header class="contents-title">
										<h2 itemprop="name headline">
											<a href="<?php the_permalink() ?>" rel="bookmark" title="<?php the_title_attribute(); ?>">
												<span><?php the_title(); ?><span>
											</a>
										</h2>
									</header>
									<?php get_template_part( 'template-parts/content', 'entry-info' ); ?>
								</div><!-- .contents-section__inner -->

								<div class="contents-section__inner">
									<div class="eyecatch">
									<?php the_post_thumbnail( 'full' ); ?>
									</div>
								</div>

								<div class="contents-section__inner">
									<div class="contents-main-area">
										<div class="contents-main-area__text">
											<p><?php the_excerpt(); ?></p>
										</div>
									</div>
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

				</section>

				<?php get_sidebar(); ?>

			</div>

		</main>

<?php get_footer(); ?>
