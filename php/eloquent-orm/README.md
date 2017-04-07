# Eloquent ORM

## Projekt einrichten

Projekt-Verzeichnis erstellen:

    mkdir eloquent-orm
    cd eloquent-orm

Abhängigkeiten mit Composer installieren:

    composer require illuminate/database
    
Webverzeichnis erstellen:

    mkdir web
    cd web
    
Index-Datei erstellen:

    touch index.php    
    nano index.php
    
Inhalt hinzufügen und speichern:
    
    <?php
    
    ini_set('display_errors', true);
    
    // setup the autoloading
    require_once __DIR__ . '/../vendor/autoload.php';
    
    echo "Hello World";

Webserver starten und URL im Browser öffnen:

    php -S localhost:8001

