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