# WordPress雛形テンプレート
※以降WordPressはWPと略す

## 環境構築

ファイルダウンロード
```
$ cd Desktop
$ git clone https://github.com/d-mori-src/wp-dev.git

# もしくはCode → Doenload ZIP から直接ダウンロード
```

ファイル名を任意の名前に付け直してWPのthemeフォルダに入れる

## ファイル説明

### style.css
- WPテーマ情報
※テーマ情報以外は基本いじらない

### screenshot.jpg
- WPテーマのサムネイル

### functions.php
- post-thumbnails
- prevLinkとnextLinkのclass付与
- カスタム投稿(カスタム投稿名: news)のURL、投稿名を数字に変更する
- コメントアウトしてるものは適宜使用

### header.php
- ヘッダーページ
- head情報
- headerナビゲーション

### footer.php
- フッターページ
- jQuery3.4.1読み込み
- main.js読み込み

### index.php
- ルートページ(主にTOPページとして利用)
- 投稿記事のループ

### single.php
- 投稿記事の詳細ページ
- 投稿記事の詳細

### archive-news.php
- newsのカスタム投稿のループページ
- ターム一覧とカスタム投稿記事のループ

### single-news.php
- newsのカスタム投稿の詳細ページ
- ターム一覧とカスタム投稿記事の詳細
- 関連記事

### page-xxx.php
- 固定ページ

### taxonomy-news_cate.php
- タクソノミーページ(タクソノミー名: news_cate)
- ターム一覧とタクソノミー 一覧

### taxonomy-news_tag.php
- タクソノミーページ(タクソノミー名: news_tag)
- タクソノミー 一覧

## おすすめプラグイン(ほぼ必須)

### Custom Post Type UI
- カスタム投稿タイプを管理画面で管理できる
- カスタムタクソノミーも簡単に作成できるので初心者におすすめ

### Advanced Custom Fields
- 独自のカスタムフィールドを作成することができる
- `the_content`と違い要素の順番を入れ替えることはできないが、ユーザー操作が簡単になるのでおすすめ

### Table of Contents Plus
- `the_content`の見出しタグに連動して目次を自動生成してくれる
- さまざまな設定ができるので大体の要件は実現可能