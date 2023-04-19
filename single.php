<?php 
    $uri = get_theme_file_uri(); 
    $site_url = site_url();
?>

<?php get_header(); ?>
    <h1><?php the_title(); ?></h1>
    <?php the_content(); ?>
    <a href="<?=$site_url?>">← ホームへ</a>
<?php get_footer(); ?>