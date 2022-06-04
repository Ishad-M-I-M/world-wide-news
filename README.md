# World Wide News
CS 3022 - Software Engineering group project.

### Versions used
* PHP : 8.1
* Composer : 2.3
* MySQL server : 8.0

## Steps to configure in local computer
1. Clone the repository
2. Navigate into the directory and run 
``` shell
composer install
```
3. Create an `.env` by following `.env.example` file. Make sure to edit 
```apacheconf
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=laravel
DB_USERNAME=root
DB_PASSWORD=
```
according to your mysql server configurations. Need to create a database manually in SQL server with name given for ```DB_DATABASE```.<br/>
ADMIN properties given in `.env` will be used to generate admin account for the application. 
```apacheconf
ADMIN_NAME="Test User"
ADMIN_EMAIL="hello@example.com"
ADMIN_PASSWORD="password"
```
4. Generate `APP_KEY` by
```shell
php artisan key:generate
```
5. Generate tables in database with Migrations and run seeds for generate ADMIN account.
```shell
php artisan migrate
php artisan db:seed
```
6. Start the application server & enjoy.
```shell
php artisan serve
```
## Documentations
* Software Requirements Specification : https://docs.google.com/document/d/10Y38c-RFoeZ0ladKSIO6rtdsGfoPjNmh
* Software Architecture Document : https://docs.google.com/document/d/14cB7BNPPhqm1wGgn_HsCcrfOAkjdL8Nd
* User Manual : https://docs.google.com/document/d/1cu3S__xca4_5Gj53hnYCaHIsiEmPDYEoUbVvt__5iKs
* Instruction manual for deploying / hosting : https://docs.google.com/document/d/1-l7W86mmpqIh9B6RYe7B-N-HarIJR-74ysS3isPFNGs
## Built with :
<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400"></a></p>

<p align="center">
<a href="https://travis-ci.org/laravel/framework"><img src="https://travis-ci.org/laravel/framework.svg" alt="Build Status"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/dt/laravel/framework" alt="Total Downloads"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/v/laravel/framework" alt="Latest Stable Version"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/l/laravel/framework" alt="License"></a>
</p>
