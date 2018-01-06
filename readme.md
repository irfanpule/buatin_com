<p align="center"><img src="https://lh4.googleusercontent.com/-kEeaEN82IYU/AAAAAAAAAAI/AAAAAAAAACU/njFQdIBrWrE/photo.jpg" width="150px"></p>

## About Buatin

buatin is a platform that can bring someone who has the ability to make something with somebody who needs something.

## Requirment
- [npm](https://www.npmjs.com/)
- [composer](https://getcomposer.org/download/)
- webserver
- mysql server

## Installation
- `git clone https://github.com/irfanpule/buatin_com.git`
- `cd buatin_com`
- `npm install`
- `composer install`
- `cp .env.example .env`
- `php artisan key:generate`
- `php artisan storage:link`
- `npm run production`


## Setting database

This project uses two databases. First database for main data. Second database for region data.
- `Create main and region database`
- `Import database/db daerah.sql to region database`
- `Copy this and paste into .env.`
----
    DB_CONNECTION=mysql_daerah
    DB_HOST2=127.0.0.1
    DB_PORT2=3306
    DB_DATABASE2=your_region_db
    DB_USERNAME2=yourusername
    DB_PASSWORD2=yourpassword
----
- `php artisan migrate`
----

## Setting Socialite Package

You can follow this tutorial. Focus on tutorial get API and Auth.
* [github socialite ](https://github.com/laravel/socialite)
* [facebook and Twitter](https://scotch.io/tutorials/laravel-social-authentication-with-socialite)
* [google](https://tuts.codingo.me/google-oauth-and-laravel-in-60-seconds)
* `Use this to fill callback or redirect URL` 
----
    for facebook    http://localhost:8000/auth/facebook/callback
    for twitter     http://127.0.0.1:8000/auth/twitter/callback
    for google      http://127.0.0.1:8000/auth/google/callback




