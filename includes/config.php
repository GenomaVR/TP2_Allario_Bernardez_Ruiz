<?php
$servername = "localhost";
$username = "root";  
$password = "";      
$dbname = "juegos"; // Nombre de la base de datos correcta OJITO LOCO

// Crear conexión
$conn = new mysqli($servername, $username, $password, $dbname);

// Verificar conexión
if ($conn->connect_error) {
    header("Location: ../TP2_Allario_Bernardez_Ruiz/404.php");
    exit;
}
?>