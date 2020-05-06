FROM php:7.3-fpm-alpine3.9
WORKDIR /var/www/html

RUN docker-php-ext-install opcache
RUN mkdir /var/www/html/cache
RUN chmod 777 /var/www/html/cache -Rfv
