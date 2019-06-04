# laravel-realty
based on Admin LTE 3 panel

## Installation
```bash
php composer install
cp .env.example .env
# configure your .env
php artisan key:generate
php artisan storage:link
php artisan migrate:fresh --seed --path=database/migrations/combined
```
