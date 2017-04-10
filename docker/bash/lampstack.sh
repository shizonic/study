
## LAMP-Stack aufbauen

docker run --name mysql-data -d -i -t -v /var/lib/mysql base/arch:latest /bin/bash
	
docker run --volumes-from=mysql-data --name mysql-server -e MYSQL_DATABASE=test -e MYSQL_ROOT_PASSWORD=1234test -d mysql:5.5
	
docker run -it --link mysql-server:mysql --rm mysql:5.5 sh -c 'exec mysql -h"$MYSQL_PORT_3306_TCP_ADDR" -p"$MYSQL_PORT_3306_TCP_PORT" -uroot -p"$MYSQL_ENV_MYSQL_ROOT_PASSWORD"'
	
docker run -d -p 80:80 --link mysql-server:mysql -v /web/www/dev.dockertest:/var/www/html tutum/apache-php
	