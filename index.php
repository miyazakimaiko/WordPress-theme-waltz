<?php get_header(); ?>

	<main id="main" role="main" itemscope itemprop="mainContentOfPage" itemtype="http://schema.org/Blog">
		
		<!-- FLEXBOX -->
        <div class="flex-row flex-row-narrow">

            <!-- CONTENTS SECTION -->
            <section class="contents-section contents-article">

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
                
                <?php bones_page_navi();  endif; wp_reset_postdata(); ?>
				
            </section>
        
            <?php get_sidebar('2'); ?>

        </div>

        <!-- BOTTOM-BANNER SECTION -->
        <?php get_template_part( 'template-parts/content', 'banner' ); ?>

	</main>

<?php get_footer(); ?>
