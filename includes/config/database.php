<?php

function conectarDB(): mysqli
{
    $db = new mysqli($_ENV['DB_HOST'], $_ENV['DB_USER'], $_SERVER['DB_PASS'], $_ENV['DB_NAME']);

    if (!$db) {
        echo 'Error, no s epudo conectar';
        exit;
    }

    return $db;
}
