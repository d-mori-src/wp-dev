<?php

// 変数一覧
$header = null;
$body = null;
$reply_subject = null;
$reply_text = null;
$notice_subject = null;
$notice_text = null;

// メールヘッダー情報
$header = "MIME-Version: 1.0\n";
$header .= "Content-Type: multipart/mixed;boundary=\"__BOUNDARY__\"\n";
$header .= "From: <example@example.com>\n";
$header .= "Reply-To: <example@example.com>\n";

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
$reply_text .= "送信元: ホームページ管理者<example@example.com>";

// 自動返信メールの送信
mail($esc['email'], $reply_subject, $reply_text, $header);

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

// テキストメッセージをセット
$body = "--__BOUNDARY__\n";
$body .= "Content-Type: text/plain; charset=\"ISO-2022-JP\"\n\n";
$body .= $notice_text . "\n";
$body .= "--__BOUNDARY__\n";

// ファイルを添付
$body .= "Content-Type: application/octet-stream; name=\"{$esc['attachment_file']}\"\n";
$body .= "Content-Disposition: attachment; filename=\"{$esc['attachment_file']}\"\n";
$body .= "Content-Transfer-Encoding: base64\n";
$body .= "\n";
$body .= chunk_split(base64_encode(file_get_contents(FILE_DIR.$esc['attachment_file'])));
$body .= "--__BOUNDARY__--";

// 管理者通知メールの送信
mail('example@example.com', $notice_subject, $body, $header);