<?php

namespace MVC;

class Route
{
    public static $rutasGET = [];
    public static $rutasPOST = [];

    public static function get($url, $fn)
    {
        self::$rutasGET[$url] = $fn;
    }

    public static function post($url, $fn)
    {
        self::$rutasPOST[$url] = $fn;
    }

    public static function comprobarRutas()
    {
        session_start();

        $auth = $_SESSION['login'] ?? null;

        $rutasProtegidas = ['/admin', '/propiedades/crear', '/propiedades/store', '/propiedades/actualizar', '/propiedades/update', '/propiedades/destroy', '/vendedores/crear', '/vendedores/guardar', '/vendedores/editar', '/vendedores/actualizar', '/vendedores/eliminar', '/blogs/crear', '/blogs/store', '/blogs/editar', '/blogs/update', '/blogs/destroy'];

        $urlActual = $_SERVER['REQUEST_URI'] === '' ? '/' : $_SERVER['REQUEST_URI'];
        $metodo = $_SERVER['REQUEST_METHOD'];

        if ($metodo == 'GET') {
            $fn = self::$rutasGET[$urlActual] ?? null;
        } else {
            $fn = self::$rutasPOST[$urlActual] ?? null;
        }

        if (in_array($urlActual, $rutasProtegidas) && !$auth) {
            header('location:');
        }

        if ($fn) {
            call_user_func($fn, new self);
        } else {
            echo 'Pagina no encontrada';
        }
    }

    public function view($view, $data = [])
    {
        foreach ($data as $key => $value) {
            $$key = $value;
        }

        ob_start();
        include __DIR__ . '/views/' . $view . '.php';
        $contenido = ob_get_clean();
        include __DIR__ . '/views/layout.php';
    }
}
