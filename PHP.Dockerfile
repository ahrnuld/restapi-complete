FROM php:fpm

RUN docker-php-ext-install pdo pdo_mysql

RUN apt-get update -y && apt-get install -y zlib1g-dev libpng-dev libfreetype6-dev

RUN docker-php-ext-configure gd --enable-gd --with-freetype

RUN docker-php-ext-install gd