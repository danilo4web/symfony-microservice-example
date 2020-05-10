FROM php:7.4.4-fpm
WORKDIR /var/www/html

RUN apt-get update && apt-get upgrade -y \
    && pecl install mongodb && docker-php-ext-enable mongodb \
    && docker-php-ext-install opcache
