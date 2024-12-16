<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Sanitizar y validar datos
    $nombre = htmlspecialchars(trim($_POST['name']));
    $email = filter_var(trim($_POST['email']), FILTER_VALIDATE_EMAIL);
    $asunto = htmlspecialchars(trim($_POST['subject']));
    $mensaje = htmlspecialchars(trim($_POST['message']));

    // Verificar que todos los campos sean válidos
    if (!$nombre || !$email || !$asunto || !$mensaje) {
        echo "Por favor, completa todos los campos correctamente.";
        exit;
    }

    // Dirección de correo de destino
    $to = "tamayoandres211294@gmail.com"; // Cambiar por tu dirección de correo
    $subject = "Nuevo mensaje de contacto: $asunto";

    // Preparar cuerpo del mensaje
    $body = "Nombre: $nombre\nCorreo: $email\nAsunto: $asunto\nMensaje:\n$mensaje";

    // Encabezados del correo
    $headers = "From: no-reply@example.com\r\n"; // Dirección fija para evitar inyecciones
    $headers .= "Reply-To: $email\r\n";

    // Intentar enviar el correo
    if (mail($to, $subject, $body, $headers)) {
        echo "Mensaje enviado con éxito. Gracias por contactarnos.";
    } else {
        echo "Error al enviar el mensaje. Por favor, intenta nuevamente más tarde.";
    }
} else {
    echo "Método de solicitud no válido.";
}
?>
