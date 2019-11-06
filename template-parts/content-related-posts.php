<?php if (!empty($related_posts)) { ?>
    <div class="related-posts">
    
        <?php
        if(get_post_type() === 'single_origin' && is_single() ||
            get_post_type() === 'harbal_tea' && is_single() ||
            get_post_type() === 'blend' && is_single() ) : 
        ?>
        <h3 class="widget-title"><span><?php _e('この商品に似た商品はこちら', 'wpcrumbs'); ?></span></h3>
        <?php
        else :
        ?>
        <h3 class="widget-title"><span><?php _e('関連記事', 'wpcrumbs'); ?></span></h3>
        <?php 
        endif;
        ?>    
        <ul class="related-posts-list">
            <?php
            foreach ($related_posts as $post) {
                setup_postdata($post);
            ?>
            <li>
                <a class="title" href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>">
                    <?php if (has_post_thumbnail()) { ?>
                    <div class="thumb">
                        <?php echo get_the_post_thumbnail(null, 'medium', array('alt' => the_title_attribute(array('echo' => false)))); ?>
                    </div>
                    <?php } ?>
                    <span><?php the_title(); ?></span>
                </a>
            </li>
            <?php } ?>
        </ul>
        <div class="clearfix"></div>
    </div>
<?php
} else {
?>
    <div class="contents-section__inner">
        <?php get_template_part( 'template-parts/content', 'banner' ); ?>
    </div>
<?php
}
?>