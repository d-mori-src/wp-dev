<?php 
    $uri = get_theme_file_uri(); 
    $site_url = site_url();
?>

<?php get_header(); ?>
    <main>
        <!-- archive-news.phpから流用 -->
        <?php if(have_posts()): while(have_posts()): the_post();?>
            <ul>
                <li>
                    <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
                </li>
            </ul>
        <?php endwhile; endif;?>
        <a href="<?=$site_url?>/news">← ニュース一覧へ</a>
    </main>
<?php get_footer(); ?>