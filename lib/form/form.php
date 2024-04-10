<?php
    require_once 'inc/validation.php';

    $esc = []; // エスケープさせた値を格納するための変数
    $flag = 0; // 変数（フラグ）の初期化
    $error = []; // バリデーションエラーを格納するための変数

    // postデータをエスケープして格納
    if(!empty($_POST)) {
        foreach($_POST as $key => $value) {
            $esc[$key] = htmlspecialchars($value, ENT_QUOTES);
        }
    }

    // 状況に応じてフラグの切り替え
    if (!empty($esc['confirm'])) {
        // 「確認画面へ」ボタンが押された時の処理
        //バリデーション
        $error = validation($esc);
        if(empty($error)) {
            $flag = 1;
            $_SESSION['page'] = true;
        }
    } elseif (!empty($esc['submit'])) {
        session_start();

        if (!empty($_SESSION['page']) && $_SESSION['page'] === true) {
            // 「送信」ボタンが押された時の処理
            $flag = 2;

            require_once 'inc/mail.php';

            // セッション削除
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