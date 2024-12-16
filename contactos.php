<?php
// Mostrar errores de PHP (solo para desarrollo)
ini_set('display_errors', 1);
error_reporting(E_ALL);

// Configuración de la base de datos
$host = "localhost";
$user = "root";
$password = "";
$dbname = "contactos";

// Crear conexión a la base de datos
$conn = new mysqli($host, $user, $password, $dbname);

// Verificar si la conexión fue exitosa
if ($conn->connect_error) {
    die("Conexión fallida: " . $conn->connect_error);
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Recibir los datos enviados desde el formulario
    $nombre = isset($_POST['name']) ? $_POST['name'] : '';
    $email = isset($_POST['email']) ? $_POST['email'] : '';
    $asunto = isset($_POST['subject']) ? $_POST['subject'] : '';
    $mensaje = isset($_POST['message']) ? $_POST['message'] : '';

    // Validar los datos recibidos
    if (empty($nombre) || empty($email) || empty($mensaje)) {
        die("Por favor, completa todos los campos requeridos.");
    }

    // Validar que el correo electrónico tenga un formato válido
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        die("El correo electrónico no es válido.");
    }

    // Preparar una consulta SQL para insertar los datos de manera segura
    $sql = "INSERT INTO mensajes (nombre, email, asunto, mensaje) VALUES (?, ?, ?, ?)";
    $stmt = $conn->prepare($sql); // Prepara la consulta
    $stmt->bind_param("ssss", $nombre, $email, $asunto, $mensaje); // Vincular los parámetros

    // Ejecutar la consulta
    if ($stmt->execute()) {
        echo "Mensaje enviado correctamente.";
    } else {
        echo "Error al enviar el mensaje: " . $stmt->error;
    }

    // Cerrar la conexión
    $stmt->close();
    $conn->close();
}
?>
