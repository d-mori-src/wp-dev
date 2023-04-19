<?php 
    $uri = get_theme_file_uri(); 
    $site_url = site_url();
    $server_uri = $_SERVER['REQUEST_URI'];

    $cat = get_queried_object();
    $cat_name = $cat->name;
    $cat_slug = $cat->slug;
    $cat_count = $cat->count;
    $cat_taxonomy = $cat->taxonomy;
?>
<?php get_header(); ?>
    <main>
        <ul class="nav">
            <li><a href="<?=$site_url?>/news/">すべて</a></li>
            <?php $terms = get_terms('news_cate'); foreach ( $terms as $term ):  ?>
            <li>
                <a
                    href="<?=$site_url?>/<?=esc_html($term->taxonomy);?>/<?=esc_html($term->slug);?>"
                    class="<?= $active = $server_uri === '/'.esc_html($term->taxonomy).'/'.esc_html($term->slug).'/' ? 'active' : '';  ?>"
                >
                    <?=esc_html($term->name);?>
                </a>
            </li>
            <?php endforeach; ?>
        </ul>

        <h1><?php echo$cat_name;?>の記事一覧 <?php echo $cat_count;?>件</h1>
        <?php if(have_posts()): while(have_posts()): the_post();?>
            <ul>
                <li>
                    <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
                </li>
            </ul>
        <?php endwhile; endif;?>

        <a href="<?=$site_url;?>/news/">一覧に戻る</a>
    </main>
<?php get_footer(); ?>