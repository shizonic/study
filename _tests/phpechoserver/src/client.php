#!/usr/local/bin/php -q
<?php
error_reporting(E_ALL);

echo "Willkommen auf dem PHP-Testclient.\n";

require_once ('config/main.php');

/* Einen TCP/IP-Socket erzeugen. */
$socket = socket_create(AF_INET, SOCK_STREAM, SOL_TCP);
if ($socket === false) {
    die ("socket_create() fehlgeschlagen: Grund: " . socket_strerror(socket_last_error()) . "\n");
}

echo "Versuche, zu '$address' auf Port '$port' zu verbinden ...";
$result = socket_connect($socket, $address, $port);
if ($result === false) {
    die ("socket_connect() fehlgeschlagen.\nGrund: ($result) " . socket_strerror(socket_last_error($socket)) . "\n");
}

echo socket_read($socket, 2048);

echo "Anfrage senden ...";
$wrote = socket_write($socket, "Hallo Server\n");
echo "OK.\n";

echo "Serverantwort lesen:\n";
echo socket_read($socket, 2048);

echo "Server herunterfahren ...";
$wrote = socket_write($socket, "shutdown\n");
echo "OK.\n";

echo "Socket schliessen ...";
socket_close($socket);
echo "OK.\n\n";
