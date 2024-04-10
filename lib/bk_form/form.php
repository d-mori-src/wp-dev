<?php
    // エスケープ処理後のデータを格納ための変数
    $esc = [];

    // エスケープ処理
    if(!empty($_POST)) {
        foreach($_POST as $key => $value) {
            $esc[$key] = htmlspecialchars($value, ENT_QUOTES);
        }
    }

    // 変数（フラグ）の初期化
    $flag = 0;

    // バリデーションエラーを格納するための変数
    $error = [];

    // バリデーション関数
    function validation($data) {
        $error = [];
        if (empty($data['fullname'])) {
            $error['fullname'] = '入力必須です';
        }
        if (empty($data['email'])) {
            $error['email'] = '入力必須です';
        } elseif (!preg_match('/^[0-9a-z_.\/?-]+@([0-9a-z-]+\.)+[0-9a-z-]+$/', $data['email'])) {
            $error['email_format'] = '正しいメールアドレスで入力してください';
        }
        if (empty($data['tel'])) {
            $error['tel'] = '入力必須です';
        } elseif (!preg_match('/^(0[5-9]0[-(]?[0-9]{4}[-)]?[0-9]{4}|0120[-]?\d{1,3}[-]?\d{4}|050[-]?\d{4}[-]?\d{4}|0[1-9][-]?\d{1,4}[-]?\d{1,4}[-]?\d{4})*$/', $data['tel'])) {
            $error['tel_format'] = '正しい電話番号で入力してください';
        }
        if (empty($data['message'])) {
            $error['message'] = '入力必須です';
        }
        if (empty($data['agree'])) {
            $error['agree'] = '同意してください';
        }
        return $error;
    }

    // 状況に応じてフラグの切り替え
    if(!empty($esc['confirm'])) {
        // 「確認画面へ」ボタンが押された時の処理

        //バリデーション
        $error = validation($esc);
        if(empty($error)) {
            $flag = 1;
            $_SESSION['page'] = true;
        }

    } else if(!empty($esc['submit'])) {
        session_start();

        if(!empty($_SESSION['page']) && $_SESSION['page'] === true) {
            // 「送信」ボタンが押された時の処理
            $flag = 2;

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

            // 自動返信メールヘッダー情報
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

            // セッション削除
            unset($_SESSION['page']);
        } else {
            $flag = 0;
        }
    } else {
        $flag = 0;
    }
?>

<?php if($flag === 1) :?><!-- 確認画面のHTMLコード -->
    <section class="form">
        <form method="post" action="">
            <ul class="formWrap">
                <li class="formSet">
                    <div class="label">選択ボックス</div>
                    <div class="inputWrap"><?php echo $esc['box'] ?></div>
                </li>
                <li class="formSet">
                    <div class="label">お名前</div>
                    <div class="inputWrap"><?php echo $esc['fullname'] ?></div>
                </li>
                <li class="formSet">
                    <div class="label">メールアドレス</div>
                    <p><?php echo $esc['email'] ?></p>
                </li>
                <li class="formSet">
                    <div class="label">電話番号</div>
                    <p><?php echo $esc['tel'] ?></p>
                </li>
                <li class="formSet">
                    <div class="label">お問い合わせ内容</div>
                    <p><?php echo $esc['message'] ?></p>
                </li>
            </ul>  

            <input type="submit" name="back" value="戻る">
            <input type="submit" name="submit" value="送信">

            <!-- データを受け渡すために一時的に保存 -->
            <input type="hidden" name="box" value="<?php echo $esc['box'] ?>">
            <input type="hidden" name="fullname" value="<?php echo $esc['fullname'] ?>">
            <input type="hidden" name="email" value="<?php echo $esc['email'] ?>">
            <input type="hidden" name="tel" value="<?php echo $esc['tel'] ?>">
            <input type="hidden" name="message" value="<?php echo $esc['message'] ?>">
            <input type="hidden" name="agree" value="<?php echo $esc['agree'] ?>">
        </form>
    </section>

<?php elseif($flag === 2):?><!-- 送信完了画面のHTMLコード -->

    <p>送信が完了しました。</p>

<?php else: ?><!-- お問い合わせフォームのHTMLコード -->
    
    <section class="form">
        <form method="post" action="">
            <ul class="formWrap">
                <li class="formSet">
                    <div class="label">選択ボックス</div>
                    <div class="inputWrap selectWrap">
                        <select name="box">
                            <option value="A" <?php echo $esc['box'] == 'A' ? 'selected' : ''  ?>>A</option>
                            <option value="B" <?php echo $esc['box'] == 'B' ? 'selected' : ''  ?>>B</option>
                            <option value="C" <?php echo $esc['box'] == 'C' ? 'selected' : ''  ?>>C</option>
                        </select>
                    </div>
                </li>
                <li class="formSet">
                    <div class="label">お名前</div>
                    <div class="inputWrap">
                        <input type="text" name="fullname" value="<?php if(!empty($esc['fullname'])) {echo $esc['fullname'];} ?>">
                        <?php echo !empty($error['fullname']) ? $error['fullname'] : ''; ?>
                    </div>
                </li>
                <li class="formSet">
                    <div class="label">メールアドレス</div>
                    <div class="inputWrap">
                        <input type="text" name="email" value="<?php if(!empty($esc['email'])) {echo $esc['email'];} ?>">
                        <?php echo !empty($error['email']) ? $error['email'] : ''; ?>
                        <?php echo !empty($error['email_format']) ? $error['email_format'] : ''; ?>
                    </div>
                </li>
                <li class="formSet">
                    <div class="label">電話番号</div>
                    <div class="inputWrap">
                        <input type="tel" name="tel" value="<?php if(!empty($esc['tel'])) {echo $esc['tel'];} ?>">
                        <?php echo !empty($error['tel']) ? $error['tel'] : ''; ?>
                        <?php echo !empty($error['tel_format']) ? $error['tel_format'] : ''; ?>
                    </div>
                </li>
                <li class="formSet">
                    <div class="label">お問い合わせ内容</div>
                    <div class="inputWrap">
                        <textarea name="message"><?php if(!empty($esc['message'])) {echo $esc['message'];} ?></textarea>
                        <?php echo !empty($error['message']) ? $error['message'] : ''; ?>
                    </div>
                </li class="formSet">
            </ul>

            <label>
                <input type="checkbox" name="agree" value="プライバシーボリシーに同意" <?php echo !empty($esc['agree']) ? 'checked' : ''  ?>>
                プライバシーボリシーに同意する
            </label>
            <?php echo !empty($error['agree']) ? $error['agree'] : ''; ?>

            <input type="submit" name="confirm" value="確認画面へ">
        </form>
    </section>

<?php endif; ?>