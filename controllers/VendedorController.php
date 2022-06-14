<?php

namespace Controllers;

use MVC\Route;
use Model\Vendedor;
use Intervention\Image\ImageManagerStatic as Image;

class VendedorController
{
    public static function create(Route $router)
    {
        $errores = Vendedor::getErrores();
        $vendedor = new Vendedor;
        $router->view('vendedores/crear', ['vendedor' => $vendedor, 'errores' => $errores]);
    }

    public static function store(Route $router)
    {
        $vendedor = new Vendedor($_POST);

        $nombreImagen = md5(uniqid(rand(), true)) . '.jpg';

        if ($_FILES['imagen']['tmp_name']) {
            $image = Image::make($_FILES['imagen']['tmp_name'])->fit(640, 800);
            $vendedor->setImagen($nombreImagen);
        }

        $errores = $vendedor->validar();

        if (empty($errores)) {

            if ($_FILES['imagen']['tmp_name']) {
                $image->save(CARPETA_IMAGEN . $nombreImagen);
            }

            $resultado = $vendedor->guardar();

            if ($resultado) {
                header('Location: /admin?resultado=5');
            }
        }

        $router->view('vendedores/crear', ['vendedor' => $vendedor, 'errores' => $errores]);
    }

    public static function edit(Route $router)
    {
        $id = $_GET['id'];
        $id = filter_var($id, FILTER_VALIDATE_INT);

        if (!$id) {
            header('location:/admin');
        }

        $vendedor = Vendedor::find($id);

        $errores = Vendedor::getErrores();

        $router->view('vendedores/editar', ['vendedor' => $vendedor, 'errores' => $errores]);
    }

    public static function update(Route $router)
    {
        $id = $_GET['id'];
        $id = filter_var($id, FILTER_VALIDATE_INT);

        if (!$id) {
            header('location:/admin');
        }

        $vendedor = Vendedor::find($id);

        $vendedor->sincronizar($_POST);

        $nombreImagen = md5(uniqid(rand(), true)) . '.jpg';

        if ($_FILES['imagen']['tmp_name']) {
            $image = Image::make($_FILES['imagen']['tmp_name'])->fit(640, 800);
            $vendedor->setImagen($nombreImagen);
        }

        $errores = $vendedor->validar();

        if (empty($errores)) {
            if ($_FILES['imagen']['tmp_name']) {
                $vendedor->borrarImagen();
                $image->save(CARPETA_IMAGEN . $nombreImagen);
            }

            $resultado = $vendedor->guardar();

            if ($resultado) {
                header('Location: /admin?resultado=5');
            }
        }

        $router->view('vendedores/editar', ['vendedor' => $vendedor, 'errores' => $errores]);
    }

    public static function destroy()
    {
        $id = $_POST['id'];
        $id = filter_var($id, FILTER_VALIDATE_INT);

        if (!$id) {
            header('location: /admin');
        }

        $vendedor = Vendedor::find($id);

        $vendedor->borrarImagen();

        $vendedor->eliminar();

        header('location:/admin?resultado=4');
    }
}
