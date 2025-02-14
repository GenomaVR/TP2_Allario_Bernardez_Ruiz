v<?php
include_once '404-section.php';

$servername = servername;
$username = username;
$password = password;
$dbname = dbname; // Nombre de la base de datos correcta OJITO LOCOSAD

// Crear conexión
mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);
try {
    $conn = new mysqli($servername, $username, $password, $dbname);

} catch (mysqli_sql_exception $e) {
    // Mostrar error
    mostrar_error(error: true, mensaje: $e->getMessage());
    exit;
}
?>
