# Паттерны программирования

# Подготовка

`127.0.0.1:8003` - link 

## запуск проекта

```bash
docker-compose up -d
```

### Debug
```
PHP_IDE_CONFIG: serverName=patternlaravel
mapping server: /var/www/backend
```

```bash
php artisan key:generate
php artisan migrate
php artisan db:seed --class=DatabaseSeeder
```
