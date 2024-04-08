<?php
  function breadcrumb() { 
?>

<ul class="breadcrumbs">
  <!-- ホームは共通 -->
  <li class="breadcrumb">
    <a href="<?php echo esc_url(home_url()); ?>">ホーム</a>
  </li>

  <!-- 固定ページの場合 -->
  <?php if (is_page()): ?>
    <li><img src="<?php echo get_template_directory_uri(); ?>/img/clamb-allow.svg" alt="" /></li>
    <li class="breadcrumb active">
      <?php echo get_the_title(); ?>
    </li>

  <!-- カスタム投稿のアーカイブページの場合 -->
  <?php elseif(is_post_type_archive()): ?>
    <li><img src="<?php echo get_template_directory_uri(); ?>/img/clamb-allow.svg" alt="" /></li>
    <li class="breadcrumb active">
      <?php post_type_archive_title(); ?>
    </li>

  <!-- 記事ページの場合 -->
  <?php elseif(is_single()): ?>
    <li><img src="<?php echo get_template_directory_uri(); ?>/img/clamb-allow.svg" alt="" /></li>
    <li class="breadcrumb">
      <a href="<?php echo get_post_type_archive_link(get_post_type()); ?>">
        <?php echo esc_html(get_post_type_object(get_post_type())->label); ?>
      </a>
    </li>
    <li><img src="<?php echo get_template_directory_uri(); ?>/img/clamb-allow.svg" alt="" /></li>
    <li class="breadcrumb active">
      <?php single_post_title(); ?>
    </li>

  <!-- タクソノミーのアーカイブページの場合 -->
  <?php elseif(is_tax()): ?>
    <li><img src="<?php echo get_template_directory_uri(); ?>/img/clamb-allow.svg" alt="" /></li>
    <li class="breadcrumb">
      <a href="<?php echo get_post_type_archive_link(get_post_type()); ?>">
        <?php echo esc_html(get_post_type_object(get_post_type())->label); ?>
      </a>
    </li>
    <li><img src="<?php echo get_template_directory_uri(); ?>/img/clamb-allow.svg" alt="" /></li>
    <li class="breadcrumb active">
      <?php single_term_title(); ?>
    </li>

  <!--  404エラーページの場合 -->
  <?php elseif(is_404()): ?>
    <li><img src="<?php echo get_template_directory_uri(); ?>/img/clamb-allow.svg" alt="" /></li>
    <li class="breadcrumb active">404 Not Found</li>

  <?php endif; ?>
  </ul>

<?php
 }
?>