<?php
session_start();
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "login_system";

// Crear la conexión
$conn = new mysqli($servername, $username, $password, $dbname);

// Verificar la conexión
if ($conn->connect_error) {
    die("Conexión fallida: " . $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST['username'];
    $password = $_POST['password'];

    // Buscar el usuario en la base de datos
    $sql = "SELECT * FROM users WHERE username='$username' AND password='$password'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        // Inicio de sesión exitoso
        $_SESSION['username'] = $username;
        header("Location: welcome.php");
    } else {
        echo "Nombre de usuario o contraseña incorrectos";
    }
}

$conn->close();
?>
