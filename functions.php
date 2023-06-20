<?php

add_theme_support('post-thumbnails');

function add_prev_posts_link_class() {
    return 'class="prevLink"';
}
add_filter( 'previous_posts_link_attributes', 'add_prev_posts_link_class' );

function add_next_posts_link_class() {
    return 'class="nextLink"';
}
add_filter( 'next_posts_link_attributes', 'add_next_posts_link_class' );

function news_post_type_link( $link, $post ){
    if ( $post->post_type === 'news' ) {
        return home_url( '/news/' . $post->ID );
    } else {
        return $link;
    }
}
add_filter( 'post_type_link', 'news_post_type_link', 1, 2 );

function news_rewrite_rules_array( $rules ) {
    $new_rewrite_rules = array( 
        'news/([0-9]+)/?$' => 'index.php?post_type=news&p=$matches[1]',
    );
    return $new_rewrite_rules + $rules;
}
add_filter( 'rewrite_rules_array', 'news_rewrite_rules_array' );

// ランキング機能
// 記事のPVをカウントする
function setPostViews($postID) {
  $count_key = 'post_views_count'; // キーを設定
  $count = get_post_meta($postID, $count_key, true); // PV数を取得
  // メタデータの有無で判定
  if ($count=='') {
    // メタデータがない時
    $count = 1; // 初回アクセス時は1からスタート
    add_post_meta($postID, $count_key, '1'); // カウント1のメタデータを追加
  } else {
    // メタデータが既にある時
    $count++; // PV数を+1する
    update_post_meta($postID, $count_key, $count); // メタデータを更新する
  }

  // デバック用
  // var_dump('postID: '.$postID.' / count: '.$count);
}
// PV数を取得する関数
function getPostViews($postID) {
  $count_key = 'post_views_count'; // キーを設定
  $count = get_post_meta($postID, $count_key, true); // PV数を取得
  return $count;
}
remove_action( 'wp_head', 'adjacent_posts_rel_link_wp_head', 10, 0);
// PVオールリセット
// function resetAllNewsViews() {
//   $args = array(
//       'post_type' => 'news',
//       'posts_per_page' => -1
//   );

//   $news_posts = get_posts($args);

//   foreach ($news_posts as $news_post) {
//       $postID = $news_post->ID;
//       $count_key = 'post_views_count';
//       delete_post_meta($postID, $count_key);
//   }
// }
// resetAllNewsViews();

// functions切り離す場合
// get_template_part('functions/***');

// function create_post_type_1() {
//     register_post_type( 'news', // 投稿タイプ名の定義
//         array(
//             'labels' => array(
//             'name' => __( '新着情報' ), // 表示する投稿タイプ名
//             'singular_name' => __( '新着情報' )
//             ),
//             'public' => true,
//             'has_archive' => true,
//             'menu_position' => 5,
//             'show_in_rest'  => true,

//             // GlaphQL用設定
//             'show_in_graphql' => true,
//             'graphql_single_name' => 'newsItem',
//             'graphql_plural_name' => 'news'
//         )
//     );
// }
// add_action('init', 'create_post_type_1');

/* 投稿アーカイブページの作成 */
// function post_has_archive( $args, $post_type ) {
//     if ( 'news' == $post_type ) {
//         $args['rewrite'] = true;
//         $args['has_archive'] = 'news'; //任意のスラッグ名
//     }
//     return $args;
// }
// add_filter( 'register_post_type_args', 'post_has_archive', 10, 2 );

// function add_article_post_rewrite_rules( $post_rewrite ) {
//     $return_rule = array();
//     foreach ( $post_rewrite as $regex => $rewrite ) {
//         $return_rule['article/' . $regex] = $rewrite;
//     }
//     return $return_rule;
// }
// add_filter( 'post_rewrite_rules', 'add_article_post_rewrite_rules' );