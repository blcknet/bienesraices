<?php

namespace Controllers;

use MVC\Route;
use Model\Admin;

class LoginController
{
    public static function login(Route $router)
    {
        $errores = Admin::getErrores();

        if ($_SERVER['REQUEST_METHOD'] == 'POST') {

            $usuario = new Admin($_POST);

            $errores = $usuario->validar();

            if (empty($errores)) {

                $auth = Admin::where('email', $usuario->email);

                if ($auth) {

                    $resultado = $auth->validarContrasena($usuario->password);

                    if ($resultado) {
                        session_start();
                        $_SESSION['login'] = true;
                        $_SESSION['nombre'] = $auth->email;
                        header('location:/admin');
                    } else {
                        $errores[] = 'La contraseña es incorrecta';
                    }
                } else {
                    $errores[] = 'El usuario no existe';
                }
            }
        }

        $router->view('auth/login', ['errores' => $errores]);
    }

    public static function logout()
    {
        session_start();

        $_SESSION = [];


        header('Location: /');
    }
}
