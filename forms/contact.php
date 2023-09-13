<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

// require 'XAMPP/php/PHPMailer/src/Exception.php'; // Rutas de los archivos PHP, revisar que sean correctas
// require 'XAMPP/php/PHPMailer/src/PHPMailer.php';
// require 'XAMPP/php/PHPMailer/src/SMTP.php';

$nombre = $_POST["nombre"];
$correo = $_POST["correo"];
$asunto = $_POST["asunto"];
$contenido = $_POST["contenido"];

// Crear una nueva instancia de PHPMailer
$mail = new PHPMailer(true);

try {
    // Configurar el servidor SMTP de Gmail
    $mail->SMTPDebug = 0; // Desactivar el modo de depuración (cambiar a 2 para ver detalles, 0 para el modo usuario)
    $mail->isSMTP();
    $mail->Host = 'smtp.gmail.com';
    $mail->SMTPAuth = true;
    $mail->Username = 'auronferro@gmail.com'; // Reemplaza con tu dirección de correo Gmail
    $mail->Password = 'gbzi immb ggrw fiqb'; // Reemplaza con tu contraseña Gmail (Puede requerir contraseña especial para apps)
                                             // Revisar la documentacion
    $mail->SMTPSecure = 'tls'; // Puede ser 'ssl' o 'tls'
    $mail->Port = 587; // Puerto SMTP para TLS, 587 es el valor por defecto e ideal

    // Configurar remitente y destinatario
    $mail->setFrom($correo, $nombre);
    $mail->addAddress('auronferro@gmail.com'); // Reemplaza con la dirección de correo destino

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