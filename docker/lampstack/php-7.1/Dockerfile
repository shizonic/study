FROM php:7.1.3-apache

MAINTAINER me@tebe.ch

RUN apt-get update \
	&& apt-get install -y unzip zip \
	&& docker-php-ext-install -j$(nproc) pdo_mysql mysqli
	
COPY php.ini /usr/local/etc/php/
