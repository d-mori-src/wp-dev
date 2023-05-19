<?php
    if (array_key_exists('favItem', $_COOKIE)) {
        $checked_items = $_COOKIE['favItem'];
        $checked_items = json_decode($checked_items);
    }
?>

<?php get_header(); ?>
     
<?php if ($checked_items): ?>
    <?php foreach ($checked_items as $checked_item) : ?>
        <a style="display: block;" href="<?php echo $permalink = get_permalink($checked_item); ?>">
            <?php echo get_the_post_thumbnail($checked_item); ?>
            <?php echo $title = get_the_title($checked_item); ?>
            <?php echo get_the_date('', $checked_item); ?>
        </a>
    <?php endforeach; ?>
<?php else: ?>
    ストックがありません。
<?php endif; ?>

<?php get_footer(); ?>
