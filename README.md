# FinDo

[![build](https://github.com/jestin-g/finDo/workflows/build/badge.svg)](https://github.com/jestin-g/finDo/actions)
[![codecov](https://codecov.io/gh/jestin-g/finDo/branch/main/graph/badge.svg)](https://codecov.io/gh/jestin-g/finDo)
[![Maintainability](https://api.codeclimate.com/v1/badges/ba609e035367c38734f0/maintainability)](https://codeclimate.com/github/finDo-dev-team/finDo/maintainability)
[![Test Coverage](https://api.codeclimate.com/v1/badges/ba609e035367c38734f0/test_coverage)](https://codeclimate.com/github/finDo-dev-team/finDo/test_coverage)
## Setup
Make sure you have [Composer](https://getcomposer.org/) installed on your machine and check server requirement [here](https://laravel.com/docs/7.x/installation#installation).

Clone repository

    git clone https://github.com/jestin-g/finDo

Go to the created folder

    cd findo

Install composer dependencies

    composer install

Copy env file example and setup your database connection

    cp .env.example .env

Generate a key

    php artisan key:generate

Install node dependencies

    npm install
    
Compile assets

    npm run dev
    
Migrate database

    php artisan migrate

Seed database

    php artisan db:seed
    
Launch local development server

    php artisan serve
