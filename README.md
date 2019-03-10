# Laravel Simple API
Just a study project to test api creation with laravel

## Getting Started
These instructions will get you a copy of the project up and running on your local machine for development and testing purposes.

### Prerequisites

What things you need to install the software and how to install them

```
Docker
Docker Compose
```

### Installing
Run in the terminal

```
make up
```

This will up a PHP container and a Mysql container.

## Running the tests
Access the PHP container terminal:
```
make bash
```

Re-run the migrations:
```
php artisan migrate:refresh --seed
```

Generate Passport keys:
```
php artisan passport:install
```

Execute the tests:
```
./vendor/bin/phpunit
```

## Built With

* [Laravel 5.8](https://laravel.com/)
* [Laravel Passport](https://laravel.com/docs/5.8/passport)
* [Docker](https://www.docker.com/)
* [Docker Compose](https://www.docker.com/)
* [Mysql 5.7](https://dev.mysql.com/downloads/mysql/5.7.html)
* [PHP 7.2](https://secure.php.net/releases/7_2_0.php)

## License

This project is licensed under the MIT License - see the [LICENSE.md](LICENSE.md) file for details
