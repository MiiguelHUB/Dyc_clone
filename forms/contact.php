
<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $recipient_email = "miguel.ortiz.q55@gmail.com"; // Cambia esto al correo de destino deseado
    $subject = $_POST["subject"];
    $name = $_POST["name"];
    $email = $_POST["email"];
    $message = $_POST["message"];

    $headers = "From: $name <$email>" . "\r\n";
    $headers .= "Reply-To: $email" . "\r\n";
    $headers .= "Content-Type: text/plain; charset=UTF-8" . "\r\n";

    mail($recipient_email, $subject, $message, $headers);
}
?>

<!-- En este punto, puedes mostrar un mensaje de confirmación al usuario en la página -->
<div class="sent-message">Your message has been sent. Thank you!</div>
