<?php

namespace Controllers;

use MVC\Route;
use Model\Blog;
use Model\Propiedad;
use PHPMailer\PHPMailer\PHPMailer;

class HomeController
{
    public static function index(Route $router)
    {
        $propiedades = Propiedad::limit(3);
        $blogs = Blog::limit(2);
        $router->view('paginas/index', ['propiedades' => $propiedades, 'blogs' => $blogs]);
    }

    public static function nosotros(Route $router)
    {
        $router->view('paginas/nosotros');
    }

    public static function anuncios(Route $router)
    {
        $propiedades = Propiedad::all();
        $router->view('paginas/anuncios', ['propiedades' => $propiedades]);
    }

    public static function anuncio(Route $router)
    {
        $id = $_GET['id'];
        $id = filter_var($id, FILTER_VALIDATE_INT);

        if (!$id) {
            header('location:');
        }

        $propiedad = Propiedad::find($id);
        $router->view('paginas/anuncio', ['propiedad' => $propiedad]);
    }

    public static function blog(Route $router)
    {
        $blogs = Blog::all();
        $router->view('paginas/blog', ['blogs' => $blogs]);
    }

    public static function entrada(Route $router)
    {
        $id = $_GET['id'];
        $id = filter_var($id, FILTER_VALIDATE_INT);

        if (!$id) {
            header('location:');
        }

        $blog = Blog::find($id);

        $router->view('paginas/entrada', ['blog' => $blog]);
    }

    public static function contacto(Route $router)
    {
        $mensaje = null;

        if ($_SERVER['REQUEST_METHOD'] == 'POST') {

            $mail = new PHPMailer();

            $mail->isSMTP();
            $mail->Host = 'smtp.mailtrap.io';
            $mail->SMTPAuth = true;
            $mail->Username = '114885542fee9d';
            $mail->Password = '3f6192a41522c2';
            $mail->SMTPSecure = 'tls';
            $mail->Port = 2525;

            $mail->setFrom('admin@bienesraices.com');
            $mail->addAddress('admin@bienesraices.com', 'Bienes raices');
            $mail->Subject = 'Tienes un nuevo mensaje';

            $mail->isHTML(true);
            $mail->CharSet = 'UTF-8';

            $respuestas = $_POST;

            $contenido = "<html>";
            $contenido .= "<p>Tienes un nuevo mensaje</p>";
            $contenido .= "<p>Nombre:" . $respuestas['nombre'] . "</p>";
            if ($respuestas['contacto'] == 'telefono') {
                $contenido .= "<p>Eligio ser contactado por Telefono</p>";
                $contenido .= "<p>Telefono: " . $respuestas['telefono'] . "</p>";
                $contenido .= "<p>Fecha: " . $respuestas['fecha'] . "</p>";
                $contenido .= "<p>Hora: " . $respuestas['hora'] . "</p>";
            } else {
                $contenido .= "<p>Eligio ser contactado por email</p>";
                $contenido .= "<p>Email: " . $respuestas['email'] . "</p>";
            }
            $contenido .= "<p>Mensaje: " . $respuestas['mensaje'] . "</p>";
            $contenido .= "<p>Compra o vende:" . $respuestas['tipo'] . "</p>";
            $contenido .= "<p>Precio o presupuesto: $" . $respuestas['presupuesto'] . "</p>";
            $contenido .= "</html>";

            $mail->Body = $contenido;
            $mail->AltBody = 'Esto es texto alterntivo';

            $resultado = $mail->send();

            if ($resultado) {
                $mensaje = 'Mensaje enviado correctamente, Gracias por comunicarse con nosotros!';
            } else {
                $mensaje = 'Error al enviar el mensaje, intentalo de nuevo mas tarde';
            }
        }

        $router->view('paginas/contacto', ['mensaje' => $mensaje]);
    }
}
