<div>
    <h4>よく読まれている記事</h4>

    <?php
        $args = [
            'post_type' => 'news',
            'meta_key' => 'post_views_count',
            'orderby' => 'meta_value_num',
            'posts_per_page' => -1,
            'order'=>'DESC',
        ];
        $the_view_query = new WP_Query( $args );
    ?>
    <?php if ($the_view_query->have_posts()):?>
        <?php while($the_view_query->have_posts()): $the_view_query->the_post();?>
            <!-- サムネイルの表示 -->
            <div>
                <a href="<?php echo get_permalink(); ?>">
                    <?php if ( has_post_thumbnail() ) { the_post_thumbnail( 'post-thumbnail'); } ?>
                </a>
            </div>

            <!-- タイトル表示 -->
            <div>
                <a href="<?php the_permalink(); ?>"><?php the_title_attribute(); ?></a>
                <?php echo getPostViews($post->ID); ?>Views
            </div>
        <?php endwhile; ?>
    <?php endif; ?>
    <?php wp_reset_postdata(); ?>
</div>