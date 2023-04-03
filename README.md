# Tecgos Template

## Table of contents

-   [Usage](#usage)
    -   [Setup your .env config file](#setup-your-env-config-file)
    -   [Install Laravel dependencies](#install-laravel-dependencies)
    -   [Import the database](#import-the-database)
    -   [Compile the front-end](#compile-the-front-end)
    -   [Launch the Laravel backend](#launch-the-Laravel-backend)
    -   [Telegram Channel Alert](#telegram-channel-alert)

## Usage

This project was built with [Laravel Jetstream](https://jetstream.laravel.com/) and [Livewire + Blade](https://jetstream.laravel.com/2.x/introduction.html#livewire-blade) as Stack.

### Setup your .env config file

Make sure to add the database configuration in your .env file such as database name, username, password and port.

### Install Laravel dependencies

In the root of your Laravel application, run the `php composer.phar install` (or `composer install`) command to install all of the framework's dependencies.

### Import the database

In order to migrate the tables and setup the bare minimum structure for this app
to display some data you shoud open your terminal, locate and enter this project
directory and run the following command

- Ignore migrations
- `create database name tecgos-cms-admin-template and import tecgos-cms-admin-template.sql file`

### Compile the front-end

In order to compile all the CSS and JS assets for the front-end of this site you need to install NPM dependencies. To do that, open the terminal, type npm install and press the `Enter` key.

Then run `npm run dev` in the terminal to run a development server to re-compile static assets when making changes to the template.

When you have done with changes, run `npm run build` for compiling and minify for production.

### Launch the Laravel backend

In order to make this Laravel installation work properly on your local machine you
can run the following command in your terminal window.

`php artisan serve`

You should receive a message similar to this
`Starting Laravel development server: http://127.0.0.1:8000` simply copy the URL
in your browser and you'll be ready to test out your new mosaic laravel app.

### Telegram Channel Alert

-   [Config URL](https://medium.com/modulr/send-telegram-notifications-with-laravel-9-342cc87b406)
