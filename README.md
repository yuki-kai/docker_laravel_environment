# 開発環境構築手順

```
cp .env.example .env

docker compose up -d --build
docker compose exec php composer install
docker compose exec php php artisan key:generate
```

# git管理から外す

このリポジトリはdocker laravel9の環境を構築するためのものなので、
開発をしたい時は別のリポジトリとしてgit管理する

```
rm -rf .git
```
