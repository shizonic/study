# Propel Mondial

## Datenbank Reverse-Engineeren

Composer.json erstellen:

	{
	    "require": {
	        "propel/propel": "~2.0@dev"
	    },
	    "autoload": {
	        "psr-4": {
	            "": "src"
	        }
	    }
	}

Composer packages (inkl. Propel) installieren:

	composer install

Schema.xml erzeugen:

	php vendor/bin/propel reverse "mysql:host=127.0.0.1;dbname=Mondial;user=root;password=root"

Models erstellen:

	php vendor/bin/propel model:build

Config convertieren:

	php vendor/bin/propel config:convert

Composer autoloader aktualisieren:

	composer dump-autoload
	

## PHP starten

php -S localhost:8001

