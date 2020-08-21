# Me Want That - PHP/Laravel Backend with oAuth and Swagger Docs

This repo contains the backendlogic MVC application for the ME WANT THAT shopping list REST API. Built with Laravel on top of PHP, mySQL, Open API and oAuth2. It started 2020 as an example for a Masterthesis about Mobile Cross Platform Development (Tag v2.0). 

## Prerequisites

You're going to need
* PHP 7.4+
* Composer

installed and available on your commandline. I recommend JetBrains PHPStorm with as preferred Development IDE. Because Laravel uses parts of Symfony, the commandline utilizes artisan commands.

## Some useful commmands

```bash
php artisan list
```

```bash
php artisan tinker
```

```bash
php artisan make:command ShoppingListCommand
```

```bash
php artisian make:model ShoppingList -m
```

```bash
php artisan --version
```

```bash
php artisan migrate
```

```bash
php artisan migrate:rollback
```

```bash
php artisan migrate:make create_users_table
```

```bash
php artisan serve
```

```bash
php artisan vendor:publish --provider "L5Swagger\L5SwaggerServiceProvider"
```

```bash
php artisan passport:install
```

```bash
php artisan vendor:publish --tag=passport-components
```

```bash
php artisan passport:keys
```

```bash
composer require laravel/passport
```

```bash
composer require "darkaonline/l5-swagger:7.*"
```

```bash
php artisan l5-swagger: generate
```


Checkout [Laravel Docs](https://laravel.com/docs/7.x/) for further knowledge

## License
[MIT](https://choosealicense.com/licenses/mit/)

## Author
[Michael Wagner](https://mikesdevcorner.com)