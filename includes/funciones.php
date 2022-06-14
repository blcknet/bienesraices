<?php

define('TEMPLATES_URL', __DIR__ . '/templates');
define('FUNCIONES_URL', __DIR__ . 'funciones.php');
define('CARPETA_IMAGEN', __DIR__ . '/../imagenes/');

function incluirTemplate(string $nombre, bool $inicio = false, bool $texto = false)
{
    include TEMPLATES_URL . "/$nombre.php";
}

function isAuth()
{
    session_start();

    if (!$_SESSION['login']) {
        header('location: /');
    }
}

function debuguear($var)
{
    echo "<pre>";
    var_dump($var);
    echo "</pre>";

    exit;
}

function s($html)
{
    $sanitizado = htmlspecialchars($html);

    return $sanitizado;
}
