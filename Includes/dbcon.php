<?php
// Conexión a la base de datos
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "juegos"; // Nombre de la base de datos correcta


$conn = new mysqli($servername, $username, $password, $dbname);

// Verificar conexión
if ($conn->connect_error) {
    die("Conexión fallida: " . $conn->connect_error);
}

// Consulta de películas
$sql = "SELECT titulo, imagen FROM titulos";
$result = $conn->query($sql);

if (!$result) {
    // Mostrar mensaje de error si la consulta falla
    die("Error en la consulta: " . $conn->error);
}

// if ($result->num_rows > 0) {
//     // Salida de datos de cada fila
//     while($row = $result->fetch_assoc()) {
//         echo "<div class='pelicula'>";
//         echo "<h2>" . $row["titulo"] . "</h2>";
//         echo "<img src='." . $row["imagen"] . "' alt='" . $row["titulo"] . "'>";
//         echo "</div>";
//     }
// } else {
//     echo "0 resultados";
// }




class Conexion {
    private $servername = "localhost";
    private $username = "root";
    private $password = "";
    private $dbname = "juegos";
    private $conn;

    public function __construct() {
        $this->conn = new mysqli($this->servername, $this->username, $this->password, $this->dbname);

        // Verificar conexión
        if ($this->conn->connect_error) {
            die("Conexión fallida: " . $this->conn->connect_error);
        }
    }

    public function getConexion() {
        return $this->conn;
    }
}




$conn->close();
?>
