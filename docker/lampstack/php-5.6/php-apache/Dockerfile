FROM php:5.6-apache

MAINTAINER me@tebe.ch

RUN docker-php-ext-install pdo pdo_mysql
RUN a2enmod rewrite headers

COPY php.ini /usr/local/etc/php/conf.d
