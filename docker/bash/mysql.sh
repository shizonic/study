#!/bin/bash

docker run \
	--detach \
	--name=mysql-server \
	--env="MYSQL_ROOT_PASSWORD=root" \
	--publish 6603:3306 \
	--volume=/Users/thomas/storage/docker/mysql57-datadir:/var/lib/mysql \
	mysql:5.7
