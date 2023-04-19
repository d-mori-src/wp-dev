<?php 
    $uri = get_theme_file_uri(); 
    $site_url = site_url();

    $terms = get_terms('news_cate');
    // echo $term->name;  //ターム名
    // echo $term->slug;  //スラッグ
    // echo $term->count; //件数
    // echo get_term_link($term);
    // echo get_term_link($term->slug, 'news_cate');
?>

<?php get_header(); ?>

<main>
    <ul>
        <li><a class="active" href="<?=$site_url;?>/news/">全て</a></li>
        <?php foreach($terms as $term): ?>
            <li><a href="<?=get_term_link($term);?>"><?=$term->name;?></a></li>
        <?php endforeach; ?>
    </ul>

    <h1>全ての一覧</h1>
    <?php if(have_posts()): while(have_posts()): the_post();?>
        <ul>
            <li>
                <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
            </li>
        </ul>
    <?php endwhile; endif;?>
</main>

<?php get_footer(); ?>