#!/bin/bash

docker run \
	--detach \
	--name php71-apache \
	--publish 80:80 \
	--volume /Users/thomas/WebServer/www:/var/www/html \
	php:7.1-apache

