<?php
    date_default_timezone_set('Asia/Tokyo');
    mb_language('ja');
    mb_internal_encoding('UTF-8');
    define( 'FILE_DIR', './strage/mail/');

    $esc = [];
    $flag = 0;
    $error = [];

    require_once 'inc/validation.php';
    require_once 'inc/escape.php';

    // 状況に応じてフラグの切り替え
    if (!empty($esc['confirm'])) {
        // 「確認画面へ」ボタンが押された時の処理
        $error = validation($esc);
        if(empty($error)) {
            $flag = 1;
            $_SESSION['page'] = true;

            // ファイルのアップロード
            if( !empty($_FILES['attachment_file']['tmp_name']) ) {
                $upload_res = move_uploaded_file( $_FILES['attachment_file']['tmp_name'], FILE_DIR.$_FILES['attachment_file']['name']);
                if( $upload_res !== true ) {
                    $error[] = 'ファイルのアップロードに失敗しました。';
                } else {
                    $esc['attachment_file'] = $_FILES['attachment_file']['name'];
                }
            }
        }
    } elseif (!empty($esc['submit'])) {
        session_start();

        if (!empty($_SESSION['page']) && $_SESSION['page'] === true) {
            // 「送信」ボタンが押された時の処理
            $flag = 2;
            require_once 'inc/mail.php';
            unset($_SESSION['page']);
        } else {
            $flag = 0;
        }
    } else {
        $flag = 0;
    }

    // ビューの描画
    if ($flag === 1) {
        // 確認画面のHTMLコード
        require_once 'template/confirm.php';
    } elseif($flag === 2) {
        // 送信完了画面のHTMLコード 
        require_once 'template/thanks.php';
    } else {
        // お問い合わせフォームのHTMLコード
        require_once 'template/contact.php';
    }