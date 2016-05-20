今日も一日がんばるぞいボタン
==========

今日も一日がんばりたい時は押してみよう！
元ネタは芳文社 まんがタイムきららCaratの NEW GAME! の涼風青葉ちゃんのセリフです。
どくじた様からキャラクターボイスのご提供を頂きました、ありがとうございます！

## 設定

DB設定ファイルを作る必要があります。
dbディレクトリ内に `config.php` を作り、環境にあった設定を入れる。

```php
<?php
// DB情報
define(DB_HOST, "ホスト名");
define(DB_USER, "ユーザ名");
define(DB_PASS, "パスワード");
define(DB_NAME, "データベース名");
define(DBSN, "mysql:dbname=" . DB_NAME . ";host=" . DB_HOST . ";charset=utf8");
```

テーブルスキーマ…また今度あげます。
