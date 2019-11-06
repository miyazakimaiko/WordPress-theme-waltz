            <!-- BANNER SECTION -->
            <section class="banner-section">
                <ul class="banner-lists">
                <?php
                $pickup_posts = get_posts( array(
                'post_type' => 'post', // 投稿タイプ
                'posts_per_page' => '3', // 3件取得
                'tag' => 'pickup', // pickupタグがついたものを
                'orderby' => 'DESC', // 新しい順に
                ) );
                ?>
                <?php foreach ( $pickup_posts as $post ) : setup_postdata($post); ?>
                    <li class="banner-list">
                        <?php
                        if ( has_post_thumbnail() ) {
                        the_post_thumbnail('large');
                        } else {
                        echo '<img src="' . esc_url( get_template_directory_uri() ) . '/img/noimg.png" alt="">';
                        }
                        ?>
                        <a href="<?php echo esc_url( get_permalink() ); ?>" class="banner-description">
                            <h3><?php the_title(); ?></h3>
                        </a>
                    </li>
                <?php endforeach; wp_reset_postdata(); ?>
                </ul>
            </section>