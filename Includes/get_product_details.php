<?php
header('Content-Type: application/json');

$servername = "localhost";
$username = "root";  // Cambia esto si tu usuario de MySQL es diferente
$password = "";      // Cambia esto si tu contraseña de MySQL es diferente
$dbname = "juegos"; // Nombre de la base de datos correcta

// Crear conexión
$conn = new mysqli($servername, $username, $password, $dbname);

// Verificar conexión
if ($conn->connect_error) {
    die(json_encode(["error" => "Conexión fallida: " . $conn->connect_error]));
}

if (isset($_GET['id'])) {
    $id = intval($_GET['id']);

    // Consulta de juego desde la base de datos por ID
    $sql = "SELECT id, titulo, descripcion, lanzamiento, genero, precio, publisher, imagen FROM titulos WHERE id = $id";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        echo json_encode($row);
    } else {
        echo json_encode(["error" => "Producto no encontrado"]);
    }
} else {
    echo json_encode(["error" => "ID no proporcionado"]);
}

$conn->close();
?>