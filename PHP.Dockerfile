FROM php:fpm

RUN docker-php-ext-install pdo pdo_mysql

RUN apt-get update && apt-get install -y git unzip libzip-dev

COPY --from=composer:latest /usr/bin/composer /usr/bin/composer