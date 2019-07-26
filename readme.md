## Salary calculator

## Installation
- create database
- run `composer install`
- `mv .env.example .env`
- `php artisan key:generate`
- fill .env file with connection options (database, user, password)
- run `php artisan migrate --seed`

## Run
run `php artisan salary:calculate`
