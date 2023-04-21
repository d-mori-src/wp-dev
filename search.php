<?php 
    $uri = get_theme_file_uri(); 
    $site_url = site_url();
?>

<?php get_header(); ?>

<?php if( have_posts() ): ?>
    <h2>「<?php the_search_query(); ?>」の検索結果</h2>
    <p><?php echo $wp_query->found_posts; ?>件の記事がヒットしました。</p>
        
    <?php while( have_posts() ): the_post(); ?>
        <ul>
            <li>
                <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
            </li>
        </ul>
    <?php endwhile; ?>

<?php else: ?>
    <h2>「<?php the_search_query(); ?>」の検索結果</h2>
    <p><?php echo $wp_query->found_posts; ?>件で検索結果はありませんでした。</p>
    <p>再度サイト内検索、または下部リンクより目的のページをお探しください。</p>
<?php endif; ?>

<?php get_footer(); ?>