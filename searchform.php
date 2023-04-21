<form action="<?php echo home_url(); ?>" method="get">
    <input type="text" name="s" value="<?php the_search_query(); ?>" placeholder="検索する">

    <!-- 1つの投稿で検索かける場合 -->
    <input type="hidden" name="post_type" value="<?php echo esc_html(get_post_type_object(get_post_type())->name); ?>">

    <!-- 複数の投稿で検索かける場合 -->
    <!-- <input type="hidden" name="post_type[]" value="post">
    <input type="hidden" name="post_type[]" value="news"> -->
    <button>送信する</button>
</form>
