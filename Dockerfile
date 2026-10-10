FROM php:8.3-apache

RUN docker-php-ext-install pdo_pgsql

COPY app/ /var/www/html/

EXPOSE 80
