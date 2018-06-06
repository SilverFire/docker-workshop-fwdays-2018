FROM php:7.2-fpm

RUN pecl install xdebug-2.6.0 \
    && docker-php-ext-enable xdebug

RUN docker-php-ext-install pdo pdo_mysql

