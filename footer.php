<?php 
    $uri = get_theme_file_uri(); 
    $site_url = site_url();
?>
    <footer>footer</footer>
    <?php wp_footer(); ?>

    <script src="<?=$uri?>/js/jquery.3.4.1.js"></script>
    <script src="<?=$uri?>/js/main.js"></script>
</body>
</html>