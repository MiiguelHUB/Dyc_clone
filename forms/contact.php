<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'forms/PHPMailer/src/Exception.php';
require 'forms/PHPMailer/src/PHPMailer.php';
require 'forms/PHPMailer/src/SMTP.php';

$nombre = $_POST["nombre"];
$correo = $_POST["correo"];
$asunto = $_POST["asunto"];
$contenido = $_POST["contenido"];

// Crear una nueva instancia de PHPMailer
$mail = new PHPMailer(true);

try {
    // Configurar el servidor SMTP de Gmail
    $mail->SMTPDebug = 2; // Desactivar el modo de depuración (cambiar a 2 para ver detalles, 0 para el modo usuario)
    $mail->isSMTP();
    $mail->Host = 'smtp.gmail.com';
    $mail->SMTPAuth = true;
    $mail->addAddress('miguel.ortiz@dycingenieria.cl'); // Cambiado a la nueva dirección                                             // Revisar la documentacion
    $mail->SMTPSecure = 'tls'; // Puede ser 'ssl' o 'tls'
    $mail->Port = 587; // Puerto SMTP para TLS, 587 es el valor por defecto e ideal

    // Configurar remitente y destinatario
    $mail->setFrom($correo, $nombre);
    $mail->addAddress('miguel.ortiz@dycingenieria.cl'); // Reemplaza con la dirección de correo destino

    // Contenido del correo
    $mail->isHTML(true);
    $mail->Subject = $asunto;
    $mail->Body = $contenido;

    // Enviar el correo
    $mail->send();
    echo "El formulario se ha enviado con éxito.";
} catch (Exception $e) {
    echo "Ha ocurrido un error al enviar el formulario: {$mail->ErrorInfo}";
}
?>