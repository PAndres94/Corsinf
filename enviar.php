<?php
$host = 'localhost'; // Host de la base de datos (en este caso, XAMPP)
$username = 'root';  // Usuario de la base de datos (por defecto en XAMPP es root)
$password = '';      // Contraseña (por defecto en XAMPP está vacía)
$dbname = 'contactos'; // Nombre de la base de datos que creamos anteriormente

// Crear la conexión
$conn = new mysqli($host, $username, $password, $dbname);

// Verificar la conexión
if ($conn->connect_error) {
    die("Conexión fallida: " . $conn->connect_error);
}

// Obtener los datos del formulario
$name = $_POST['name'] ?? 'Nombre';
$email = $_POST['email'] ?? 'Nombre';
$subject = $_POST['subject'] ?? 'Nombre';
$message = $_POST['message'] ?? 'Nombre';

// Preparar la consulta SQL para insertar los datos
$query = $conn->prepare("INSERT INTO contactos (name, email, subject, message) VALUES (?, ?, ?, ?)");
$query->bind_param("ssss", $name, $email, $subject, $message);

// Ejecutar la consulta
if ($query->execute()) {
    echo "Mensaje enviado correctamente.";
} else {
    echo "Error: " . $query->error;
}

// Cerrar la conexión
$query->close();
$conn->close();
?>
