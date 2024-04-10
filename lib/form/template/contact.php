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