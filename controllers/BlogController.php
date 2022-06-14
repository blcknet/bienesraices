<?php

namespace Controllers;

use MVC\Route;
use Model\Blog;
use Intervention\Image\ImageManagerStatic as Image;

class BlogController
{
    public static function create(Route $router)
    {
        $blog = new Blog;
        $errores = Blog::getErrores();
        $router->view('blogs/crear', ['blog' => $blog, 'errores' => $errores]);
    }

    public static function store(Route $router)
    {
        $blog = new Blog($_POST);

        $nombreImagen = md5(uniqid(rand(), true)) . '.jpg';

        if ($_FILES['imagen']['tmp_name']) {
            $image = Image::make($_FILES['imagen']['tmp_name'])->fit(640, 800);
            $blog->setImagen($nombreImagen);
        }

        $errores = $blog->validar();

        if (empty($errores)) {
            $image->save(CARPETA_IMAGEN . $nombreImagen);
            $resultado = $blog->guardar();

            if ($resultado) {
                header('location:/admin?resultado=6');
            }
        }

        $router->view('blogs/crear', ['blog' => $blog, 'errores' => $errores]);
    }

    public static function edit(Route $router)
    {
        $id = $_GET['id'];
        $id = filter_var($id, FILTER_VALIDATE_INT);

        if (!$id) {
            header('location: /admin');
        }

        $blog = Blog::find($id);

        $errores = Blog::getErrores();

        $router->view('blogs/actualizar', ['blog' => $blog, 'errores' => $errores]);
    }

    public static function update(Route $router)
    {
        $id = $_GET['id'];
        $id = filter_var($id, FILTER_VALIDATE_INT);

        if (!$id) {
            header('location: /admin');
        }

        $blog = Blog::find($id);

        $blog->sincronizar($_POST);

        $errores = $blog->validar();

        $nombreImagen = md5(uniqid(rand(), true)) . '.jpg';

        if (empty($errores)) {

            if ($_FILES['imagen']['tmp_name']) {
                $image = Image::make($_FILES['imagen']['tmp_name'])->fit(640, 800);
                $blog->setImagen($nombreImagen);
                $image->save(CARPETA_IMAGEN . $nombreImagen);
            }

            $resultado = $blog->guardar();

            if ($resultado) {
                header('location: /admin?resultado=7');
            }
        }

        $router->view('blogs/actualizar', ['blog' => $blog, 'errores' => $errores]);
    }

    public static function destroy()
    {
        $id = $_POST['id'];

        $id = filter_var($id, FILTER_VALIDATE_INT);

        if (!$id) {
            header('location: /admin');
        }

        $blog = Blog::find($id);

        $resultado = $blog->eliminar();

        if ($resultado) {
            $blog->borrarImagen();
            header('location: /admin?resultado=8');
        }
    }
}
