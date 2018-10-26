## Requirment

PHP7, Laravel 5.5.44, Mysql 5.7+, composer.

## Build Setup

# Add database settings in  .env file
- DB_CONNECTION=mysql
- DB_HOST=127.0.0.1
- DB_PORT=3306
- DB_DATABASE={MYSQL-DATABASE-NAME}
- DB_USERNAME={MYSQL-USER}
- DB_PASSWORD={MYSQL-PASSWORD}

# update composer and load dependencies
- composer update
- composer dump-autoload -o

# Migrate database
- php artisan migrate

# Seeder to inset fake data
- php artisan db:seed

