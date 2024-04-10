<?php

// タイムゾーンの設定
date_default_timezone_set('Asia/Tokyo');

// 使用言語（日本語）の設定
mb_language('uni'); // mb_language('ja'); だと日本語が表示されない
mb_internal_encoding('UTF-8');

// 自動返信メール件名
$reply_subject = "お問い合わせいただきありがとうございます";

// 自動返信メール本文
$reply_text = "下記の内容でお問い合わせを受け付けました。"."\n\n";
$reply_text .= "お問い合わせ受付日時：".date('Y-m-d H:i')."\n";
$reply_text .= "選択ボックス：".$esc['box']."\n";
$reply_text .= "お名前：".$esc['fullname']."\n";
$reply_text .= "メールアドレス：".$esc['email']."\n";
$reply_text .= "電話番号：".$esc['tel']."\n";
$reply_text .= "お問い合わせ内容：".$esc['message']."\n\n";
$reply_text .= "管理人";

// メールヘッダー情報
$header = "MIME-Version: 1.0\n";
$header .= "Content-Type: text/plain;charset=UTF-8\n";
$header .= "From: <example@example.com>\n";
$header .= "Reply-To: <example@example.com>\n";

// 自動返信メールの送信
mb_send_mail($esc['email'], $reply_subject, $reply_text, $header);

// 管理者通知メールの件名
$notice_subject = "ホームページからメッセージがありました";

// 管理者通知メールの本文
$notice_text = "下記の内容でお問い合わせを受け付けました。"."\n\n";
$notice_text .= "お問い合わせ受付日時：".date('Y-m-d H:i')."\n";
$notice_text .= "選択ボックス：".$esc['box']."\n";
$notice_text .= "お名前：".$esc['fullname']."\n";
$notice_text .= "メールアドレス：".$esc['email']."\n";
$notice_text .= "電話番号：".$esc['tel']."\n";
$notice_text .= "お問い合わせ内容：".$esc['message']."\n";
$notice_text .= "プライバシーポリシー：".$esc['agree']."\n";

// 管理者通知メールの送信
mb_send_mail('example@example.com', $notice_subject, $notice_text, $header);