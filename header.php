<?php 
  $uri = get_theme_file_uri(); 
  $site_url = site_url();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://use.fontawesome.com/releases/v5.0.6/css/all.css" rel="stylesheet">
    <link rel="stylesheet" href="<?=$uri;?>/css/style.css">
    <?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
    <header>
      <ul>
        <li><a href="<?=$site_url;?>">TOP</a></li>
        <li><a href="<?=$site_url;?>/news/">NEWS</a></li>
      </ul>

      <?php get_search_form(); // 検索フォーム(どこでも置ける) ?>
      
    </header>