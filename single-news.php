<?php 
    global $post;
    $uri = get_theme_file_uri(); 
    $site_url = site_url();
?>

<?php get_header(); ?>
    <div class="termTag">
        <?php echo get_the_term_list($post->ID,'news_tag'); ?>
    </div>
    <h1><?php the_title(); ?></h1>
    <?php the_post_thumbnail('thumbnail'); ?>
    <?php the_content(); ?>
    <a href="<?=$site_url?>/news">← ニュース一覧へ</a>

    
    <!-- 関連記事 -->
    <?php
        $term = array_shift(get_the_terms($post->ID, 'news_cate'));
        var_dump($term );
        $news_args = [
            'post_type' => 'news',
            'posts_per_page' => 3,
            'taxonomy' => 'news_cate',
            'term' => $term->slug,
            'orderby' => 'rand',
            'post__not_in' => array($post->ID),
        ];
        $news_wp_query = new WP_Query($news_args);
    ?>
    <h3>関連記事</h3>
    <ul class="items">
        <?php if ($news_wp_query->have_posts()): ?>
            <?php while ($news_wp_query->have_posts()): $news_wp_query->the_post(); ?>
                <li>
                    <a href="<?php the_permalink(); ?>">
                        <?php the_title(); ?>
                        <?php the_post_thumbnail('thumbnail'); ?>
                    </a>
                </li>
            <?php endwhile; ?>
        <?php else: ?>
            関連記事はありません
        <?php endif; ?>
    </ul>


<?php get_footer(); ?>