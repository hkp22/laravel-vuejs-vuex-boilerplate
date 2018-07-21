# Laravel, Vuejs, Vuex - SPA Boilerplate

Boilerplate SPA made with Laravel 5.6, Bootstrap 4, JWT Auth, Vue 2, Vue-router 3, Vuex 3, Axios.

## Installation:

- Clone the repo
- Copy `.env.example` to `.env`
- Configure `.env`
- Run `composer install --no-scripts`
- Run `php artisan key:generate`
- php `php artisan jwt:generate` and in `.env` assign `JWT_SECRET` value with new generated secret.
- Run `php artisan migrate`.
- Run `npm install`
- Run `npm run watch`
- View the site by your local dev url configured or using `php artisan serve` in a new terminal/command prompt.

For any problem in laravel setup, please get help from [Laravel](https://laravel.com) site. If that does not work, please create an issue, I will try my best to help.
