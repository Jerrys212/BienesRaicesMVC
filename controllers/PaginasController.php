<?php

namespace Controllers;

use Model\Propiedad;
use MVC\Router;
use PHPMailer\PHPMailer\PHPMailer;


class PaginasController
{
    public static function index(Router $router)
    {
        $propiedades = Propiedad::get(3);
        $inicio = true;
        $router->render('paginas/index', [
            'propiedades' => $propiedades,
            'inicio' => $inicio
        ]);
    }

    public static function nosotros(Router $router)
    {
        $router->render('paginas/nosotros');
    }

    public static function propiedades(Router $router)
    {
        $propiedades = Propiedad::all();

        $router->render('paginas/propiedades', [
            'propiedades' => $propiedades
        ]);
    }
    public static function propiedad(Router $router)
    {
        $id = validarRedireccionar('/propiedades');

        $propiedad = Propiedad::find($id);

        $router->render('paginas/propiedad', [
            'propiedad' => $propiedad
        ]);
    }
    public static function blog(Router $router)
    {
        $router->render('paginas/blog');
    }
    public static function entrada(Router $router)
    {
        $router->render('paginas/entrada');
    }
    public static function contacto(Router $router)
    {

        $mensaje = null;

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {

            $respuestas = $_POST['contacto'];

            $mail = new PHPMailer();

            $mail->isSMTP();
            $mail->Host = 'smtp.mailtrap.io';
            $mail->SMTPAuth = true;
            $mail->Username = 'b0dc5c344311cd';
            $mail->Password = '5857b1204e3b1a';
            $mail->SMTPSecure = 'tls';
            $mail->Port = 2525;

            //configurar contenido del email

            $mail->setFrom('admin@bienesraices.com');
            $mail->addAddress('admin@bienesraices.com', 'Bienes Raices');
            $mail->Subject = 'Tienes un nuevo mensaje';

            //HTML

            $mail->isHTML(true);
            $mail->CharSet = 'UTF-8';

            //Contenido

            $contenido = '<html>';
            $contenido .= '<p> Tienes un nuevo mensaje </p> ';
            $contenido .= '<p> Nombre: ' . $respuestas['nombre'] . '</p> ';


            if ($respuestas['contacto'] === 'telefono') {
                $contenido .= '<p>Eligio ser contactado por Email</p>';
                $contenido .= '<p> Telefono: ' . $respuestas['telefono'] . '</p> ';
                $contenido .= '<p> Fecha: ' . $respuestas['fecha'] . '</p> ';
                $contenido .= '<p> Hora: ' . $respuestas['hora'] . '</p> ';
            } else {
                $contenido .= '<p>Eligio ser contactado por Email</p>';
                $contenido .= '<p> Correo: ' . $respuestas['email'] . '</p> ';
            }

            $contenido .= '<p> Vende o Compra: ' . $respuestas['tipo'] . '</p> ';
            $contenido .= '<p> precio o presupuesto: ' . $respuestas['precio'] . '</p> ';
            $contenido .= '<p> Contactado por: ' . $respuestas['contacto'] . '</p> ';
            $contenido .= '</html>';


            $mail->Body = $contenido;
            $mail->AltBody = 'Texto sin HTML';

            if ($mail->send()) {
                $mensaje = "mensaje enviado Correctamente";
            } else {
                $mensaje = "El mensaje no se pudo enviar";
            }
        }

        $router->render('paginas/contacto', [
            'mensaje' => $mensaje
        ]);
    }
}
