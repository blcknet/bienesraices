<?php

namespace Controllers;

use MVC\Route;
use Model\Blog;
use Model\Vendedor;
use Model\Propiedad;
use Intervention\Image\ImageManagerStatic as Image;


class PropiedadController
{
    public static function index(Route $router)
    {
        $resultado = $_GET['resultado'] ?? null;
        $propiedades = Propiedad::all();
        $vendedores = Vendedor::all();
        $blogs = Blog::all();

        $router->view('propiedades/admin', ['propiedades' => $propiedades, 'vendedores' => $vendedores, 'resultado' => $resultado, 'blogs' => $blogs]);
    }

    public static function create(Route $router)
    {
        $propiedad = new Propiedad;
        $errores = Propiedad::getErrores();
        $vendedores = Vendedor::all();

        $router->view('propiedades/crear', ['errores' => $errores, 'propiedad' => $propiedad, 'vendedores' => $vendedores]);
    }

    public static function store(Route $router)
    {
        $propiedad = new Propiedad($_POST);

        $nombreImagen = md5(uniqid(rand(), true)) . '.jpg';

        if ($_FILES['imagen']['tmp_name']) {
            $image = Image::make($_FILES['imagen']['tmp_name'])->fit(800, 600);
            $propiedad->setImagen($nombreImagen);
        }

        $errores = $propiedad->validar();

        if (empty($errores)) {

            if (!is_dir(CARPETA_IMAGEN)) {
                mkdir(CARPETA_IMAGEN);
            }

            $image->save(CARPETA_IMAGEN . $nombreImagen);

            $resultado = $propiedad->guardar();

            if ($resultado) {
                header('Location: /admin?resultado=1');
            }
        }

        $router->view('propiedades/crear', ['errores' => $errores, 'propiedad' => $propiedad]);
    }

    public static function edit(Route $router)
    {
        $id = filter_var($_GET['id'], FILTER_VALIDATE_INT);

        if (!$id) {
            header('Location: /admin');
        }

        $propiedad = Propiedad::find($id);

        $vendedores = Vendedor::all();

        $errores = Propiedad::getErrores();

        $router->view('propiedades/actualizar', ['propiedad' => $propiedad, 'errores' => $errores, 'vendedores' => $vendedores]);
    }

    public static function update(Route $router)
    {
        $id = $_GET['id'] ?? null;

        $id = filter_var($id, FILTER_VALIDATE_INT);

        if ($id) {
            $propiedad = Propiedad::find($id);
        } else {
            header('location: /admin');
        }

        $propiedad->sincronizar($_POST);

        $errores = $propiedad->validar();

        $nombreImagen = md5(uniqid(rand(), true)) . '.jpg';

        if ($_FILES['imagen']['tmp_name']) {
            $image = Image::make($_FILES['imagen']['tmp_name'])->fit(800, 600);
            $propiedad->setImagen($nombreImagen);
            $image->save(CARPETA_IMAGEN . $nombreImagen);
        }

        if (empty($errores)) {

            $resultado = $propiedad->guardar();

            if ($resultado) {
                header('Location: /admin?resultado=2');
            }
        }
        $router->view('propiedades/actualizar', ['propiedad' => $propiedad, 'errores' => $errores]);
    }

    public static function destroy()
    {
        $id = $_POST['id'];
        $id = filter_var($id, FILTER_VALIDATE_INT);

        if ($id) {
            $tipo = $_POST['tipo'];

            if ($tipo == 'propiedad') {
                $propiedad = Propiedad::find($id);
                $resultado = $propiedad->eliminar();

                if ($resultado) {
                    $propiedad->borrarImagen();
                    header('location: /admin?resultado=3');
                }
            } else if ($tipo == 'vendedor') {
                $vendedor = Vendedor::find($id);

                $resultado = $vendedor->eliminar();

                if ($resultado) {
                    header('location: /admin?resultado=4');
                }
            } else {
                header('location: /admin');
            }
        } else {
            header('location: /admin');
        }
    }
}
