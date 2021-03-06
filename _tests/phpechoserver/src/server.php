#!/usr/local/bin/php -q
<?php
error_reporting (E_ALL);
ini_set('display_errors', 1);

/* Das Skript wartet auf hereinkommende Verbindungsanforderungen. */
set_time_limit (0);

/* Die implizite Ausgabe wird eingeschaltet, so dass man sieht,
 * was gesendet wurde. */
ob_implicit_flush ();

echo "Starte PHP-Testserver.\n";

$address = 'server';
$port = '10000';

if (($sock = socket_create(AF_INET, SOCK_STREAM, SOL_TCP)) === false) {
    echo "socket_create() fehlgeschlagen: Grund: " . socket_strerror(socket_last_error()) . "\n";
}

if (socket_bind($sock, $address, $port) === false) {
    echo "socket_bind() fehlgeschlagen: Grund: " . socket_strerror(socket_last_error($sock)) . "\n";
}

if (socket_listen($sock, 5) === false) {
    echo "socket_listen() fehlgeschlagen: Grund: " . socket_strerror(socket_last_error($sock)) . "\n";
}

do {
    if (($msgsock = socket_accept($sock)) === false) {
        echo "socket_accept() fehlgeschlagen: Grund: " . socket_strerror(socket_last_error($sock)) . "\n";
        break;
    }
    /* Anweisungen senden. */
    $msg = "\nWillkommen auf dem PHP-Testserver.  \n" .
        "Um zu beenden, geben Sie 'quit' ein. Um den Server herunterzufahren, geben Sie 'shutdown' ein.\n";
    socket_write($msgsock, $msg, strlen($msg));

    do {
        if (false === ($buf = socket_read ($msgsock, 2048, PHP_NORMAL_READ))) {
            echo "socket_read() fehlgeschlagen: Grund: " . socket_strerror(socket_last_error($msgsock)) . "\n";
            break 2;
        }
        if (!$buf = trim ($buf)) {
            continue;
        }
        if ($buf == 'quit') {
            break;
        }
        if ($buf == 'shutdown') {
            socket_close ($msgsock);
            break 2;
        }
        $talkback = "PHP: Sie haben '$buf' eingegeben.\n";
        socket_write ($msgsock, $talkback, strlen ($talkback));
        echo "$buf\n";
    } while (true);
    socket_close ($msgsock);
} while (true);

socket_close ($sock);
