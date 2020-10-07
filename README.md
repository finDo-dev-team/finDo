# FinDo

[![build](https://github.com/jestin-g/finDo/workflows/build/badge.svg)](https://github.com/jestin-g/finDo/actions)
[![codecov](https://codecov.io/gh/jestin-g/finDo/branch/main/graph/badge.svg)](https://codecov.io/gh/jestin-g/finDo)
[![Codacy Badge](https://app.codacy.com/project/badge/Grade/ec052bb76a0047e78c2c0770e0ae9c91)](https://www.codacy.com/gh/jestin-g/finDo/dashboard?utm_source=github.com&amp;utm_medium=referral&amp;utm_content=jestin-g/finDo&amp;utm_campaign=Badge_Grade)

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
    
Launch local development server

    php artisan serve
