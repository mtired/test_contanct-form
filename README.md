# お問い合わせフォーム(FashionablyLate)

## 環境構築

### Docker ビルド
```bash
git clone https://github.com/mtired/test_contanct-form.git
docker-compose up -d --build
docker-compose exec php bash
composer install

cp .env.example .env # .env の環境変数を適宜変更

php artisan key:generate
php artisan migrate
php artisan db:seed

## 開発環境
お問い合わせ画面：
http://localhost/

ユーザー登録：
http://localhost/register

ログイン：
http://localhost/login

phpMyAdmin：
http://localhost:8080/

## 使用技術(実行環境)
Laravel:8.83.29
mysql:8.0.26
nginx:1.21.1
php:8.1
Composer:2.9.2

## ER図
![ER図](./public/images/er.png)