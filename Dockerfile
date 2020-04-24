FROM php:7.3-fpm-alpine3.9
RUN docker-php-ext-install opcache
