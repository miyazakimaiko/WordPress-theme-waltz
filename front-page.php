<?php get_header(); ?>

                    <main id="main" class="site-main">

                        <!-- BACKGROUND-WALL -->
                        <div class="bcg-wall">

                            <!-- HERO SECTION -->
                            <section class="hero-section">

                                <div class="hero-img-wrapper">
                                    <div class="slider-contaner" id="slider">
                                        <div class="slides">
                                            <div class="slide">
                                                <?php 
                                                $thumbnail_id = get_post_thumbnail_id( $post->ID );
                                                $alt = get_post_meta($thumbnail_id, '_wp_attachment_image_alt', true);   
                                                the_post_thumbnail( 'full', array( 'alt' => $alt ) );
                                                ?>
                                            </div>
                                        </div>
                                    </div>
                                    <div id="hero-description" class="hero-description">
                                        <h1><?php the_field('catch_copy'); ?></h1>
                                        <a href="<?php echo get_permalink( get_page_by_path('about-waltz-coffee-roastery', OBJECT, 'post') ); ?>">ワルツについて、もっと知る</a>
                                    </div>
                                </div>
                            </section>
                            <?php get_template_part( 'template-parts/content', 'banner' ); ?>
                        </div>

                        <!-- FLEXBOX -->
                        <div class="flex-row">

                            <!-- CONTENTS SECTION -->
                            <section class="contents-section">

                                <div class="contents-section__inner">
                                    <div class="contents-title">

                                    <?php
                                        $wp_query = new WP_Query();
                                        $my_posts1 = array(
                                            'post_type' => 'single_origin',
                                            'posts_per_page'=> '6',
                                            'orderby' => 'rand'
                                        );
                                        $wp_query->query( $my_posts1 );

                                        the_archive_title( '<h1><span>', '</span></h1>' );
                                    ?>

                                    </div>

                                    <div class="contents-main-area">

                                    <?php
                                        if( $wp_query->have_posts() ): while( $wp_query->have_posts() ) : $wp_query->the_post();
                                        $id = get_the_ID();
                                    ?>

                                        <div class="product" id="product-<?php echo $id ?>">

                                            <a class="product__image" href="<?php the_permalink(); ?>">
                                                <?php
                                                $thumbnail_id = get_post_thumbnail_id( $post->ID );
                                                $alt = get_post_meta($thumbnail_id, '_wp_attachment_image_alt', true);   
                                                the_post_thumbnail( 'full', array( 'alt' => $alt ) );
                                                ?>
                                            </a>

                                            <h3 class="product__name">
                                                <a href="<?php the_permalink(); ?>" rel="bookmark" title="<?php the_title_attribute(); ?>"><span><?php the_title(); ?></span></a>
                                            </h3>

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
                                                <?php the_excerpt(); ?>
                                            </div>

                                        </div>

                                    <?php endwhile; endif; wp_reset_postdata(); ?>

                                    </div><!-- .contents-main-area -->

                                    <div class="read-more-link">
                                        <a href="<?php echo get_permalink( get_page_by_path('coffee-beans') ); ?>" class="read-more-link">一覧をみる</a>
                                    </div>

                                </div><!-- .contents-section__inner -->

                                <div class="contents-section__inner">

                                    <div class="contents-title">

                                        <?php
                                            $wp_query = new WP_Query();
                                            $my_posts2 = array(
                                                'post_type' => 'blend'
                                            );
                                            $wp_query->query( $my_posts2 );

                                            the_archive_title( '<h1><span>', '</span></h1>' );
                                        ?>
        
                                    </div>

                                    <div class="contents-main-area">

                                        <?php
                                            if( $wp_query->have_posts() ): while( $wp_query->have_posts() ) : $wp_query->the_post();
                                            $id = get_the_ID();
                                        ?>

                                        <div class="product" id="product-<?php echo $id ?>">

                                            <a class="product__image" href="<?php the_permalink(); ?>">
                                                <?php
                                                    $thumbnail_id = get_post_thumbnail_id( $post->ID );
                                                    $alt = get_post_meta($thumbnail_id, '_wp_attachment_image_alt', true);   
                                                    the_post_thumbnail( 'full', array( 'alt' => $alt ) );
                                                ?>
                                            </a>

                                            <h3 class="product__name">
                                                <a href="<?php the_permalink(); ?>" rel="bookmark" title="<?php the_title_attribute(); ?>"><span><?php the_title(); ?></span></a>
                                            </h3>

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
                                                <?php the_excerpt(); ?>
                                            </div>

                                        </div>

                                        <?php endwhile; endif; wp_reset_postdata(); ?>

                                    </div>

                                </div><!-- .contents-section__inner -->

                            </section>

                            <?php get_sidebar(); ?>
                            
                        </div><!-- .flex-row -->

                    </main><!-- #main -->

<?php get_footer(); ?>
