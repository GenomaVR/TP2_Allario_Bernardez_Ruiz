<?php
$servername = "localhost";
$username = "root";  // Cambia esto si tu usuario de MySQL es diferente
$password = "";      // Cambia esto si tu contraseña de MySQL es diferente
$dbname = "juegos"; // Nombre de la base de datos correcta

// Crear conexión
$conn = new mysqli($servername, $username, $password, $dbname);

// Verificar conexión
if ($conn->connect_error) {
    die("Conexión fallida: " . $conn->connect_error);
}
?>