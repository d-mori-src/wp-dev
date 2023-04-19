<?php 
    $uri = get_theme_file_uri(); 
    $site_url = site_url();
?>

<?php get_header(); ?>
    <main>
        <?php if(have_posts()): while(have_posts()): the_post();?>
            <ul>
                <li>
                    <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
                </li>
            </ul>
        <?php endwhile; endif;?>
    </main>
<?php get_footer(); ?>