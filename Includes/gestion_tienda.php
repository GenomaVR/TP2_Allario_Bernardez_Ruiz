<?php
session_start();
require_once "../Includes/dbcon.php";

if (!isset($_SESSION['usuario']) || $_SESSION['usuario']['rol'] !== 'admin') {
    header("Location: ../login/login.php");
    exit();
}

$conexion = (new Conexion())->getConexion();
$mensaje = '';
$titulo_editar = null;

// Verificar si se está editando un título
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['editar'])) {
    $id = $_POST['id'];
    $query = "SELECT * FROM titulos WHERE id = ?";
    $PDOStatement = $conexion->prepare($query);
    $PDOStatement->bind_param("i", $id);
    $PDOStatement->execute();
    $result = $PDOStatement->get_result();
    $titulo_editar = $result->fetch_assoc();
}

// Procesar la eliminación de títulos
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['borrar'])) {
    $id = $_POST['id'];
    $query = "DELETE FROM titulos WHERE id = ?";
    $PDOStatement = $conexion->prepare($query);
    $PDOStatement->bind_param("i", $id);
    if ($PDOStatement->execute()) {
        $mensaje = "Título borrado correctamente.";
    } else {
        $mensaje = "Error al borrar el título.";
    }
}

// Procesar la actualización o adición de títulos
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['guardar'])) {
    $id = $_POST['id'] ?? null;
    $titulo = htmlspecialchars($_POST['titulo']);
    $descripcion = htmlspecialchars($_POST['descripcion']);
    $lanzamiento = $_POST['lanzamiento'];
    $genero = htmlspecialchars($_POST['genero']);
    $precio = $_POST['precio'];
    $publisher = htmlspecialchars($_POST['publisher']);
    $imagen = htmlspecialchars($_POST['imagen']);

    if ($id) {
        $query = "UPDATE titulos SET titulo = ?, descripcion = ?, lanzamiento = ?, genero = ?, precio = ?, publisher = ?, imagen = ? WHERE id = ?";
        $PDOStatement = $conexion->prepare($query);
        $PDOStatement->bind_param("ssssdssi", $titulo, $descripcion, $lanzamiento, $genero, $precio, $publisher, $imagen, $id);
    } else {
        // Obtener el último ID de la base de datos
        $sql = "SELECT MAX(id) AS max_id FROM titulos";
        $result = $conexion->query($sql);
        $last_id = ($result->num_rows > 0) ? $result->fetch_assoc()['max_id'] : 0;

        // Asignar ID autoincremental al nuevo título
        $last_id++;

        $query = "INSERT INTO titulos (id, titulo, descripcion, lanzamiento, genero, precio, publisher, imagen) VALUES (?, ?, ?, ?, ?, ?, ?, ?)";
        $PDOStatement = $conexion->prepare($query);
        $PDOStatement->bind_param("issssdss", $last_id, $titulo, $descripcion, $lanzamiento, $genero, $precio, $publisher, $imagen);
    }

    if ($PDOStatement->execute()) {
        $mensaje = "Título actualizado correctamente.";
    } else {
        $mensaje = "Error al actualizar el título.";
    }
}

$query = "SELECT * FROM titulos";
$result = $conexion->query($query);
$titulos = $result->fetch_all(MYSQLI_ASSOC);
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Gestión de Tienda</title>
    <link rel="icon" href="../logoIcon.ico" type="image/x-icon">
    <link rel="stylesheet" href="../src/styles.css">
    <!-- Incluye Bootstrap CSS -->
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background-color: #343a40;
        }
        .form-group label {
            color: white;
        }
        .form-group input, 
        .form-group textarea {
            color: white;
            background-color: #495057;
        }
    </style>
</head>
<body>
<?php
include '../Includes/header.php';
?>
<div class="container mt-5">
    <h2 class="text-center text-white">Gestión de Tienda</h2>
    <?php if ($mensaje): ?>
        <div class="alert alert-info" role="alert">
            <?php echo $mensaje; ?>
        </div>
    <?php endif; ?>
    <table class="table table-striped table-hover mt-4">
        <thead class="thead-dark">
            <tr>
                <th>ID</th>
                <th>Título</th>
                <th>Descripción</th>
                <th>Lanzamiento</th>
                <th>Género</th>
                <th>Precio</th>
                <th>Publisher</th>
                <th>Imagen</th>
                <th>Acción</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($titulos as $titulo): ?>
                <tr>
                    <td><?php echo htmlspecialchars($titulo['id']); ?></td>
                    <td><?php echo htmlspecialchars($titulo['titulo']); ?></td>
                    <td><?php echo htmlspecialchars($titulo['descripcion']); ?></td>
                    <td><?php echo htmlspecialchars($titulo['lanzamiento']); ?></td>
                    <td><?php echo htmlspecialchars($titulo['genero']); ?></td>
                    <td><?php echo htmlspecialchars($titulo['precio']); ?></td>
                    <td><?php echo htmlspecialchars($titulo['publisher']); ?></td>
                    <td><img src="<?php echo htmlspecialchars($titulo['imagen']); ?>" alt="<?php echo htmlspecialchars($titulo['titulo']); ?>" width="50"></td>
                    <td>
                        <form action="gestion_tienda.php" method="post" class="form-inline">
                            <input type="hidden" name="id" value="<?php echo $titulo['id']; ?>">
                            <button type="submit" name="editar" class="btn btn-warning">Editar</button>
                        </form>
                        <form action="gestion_tienda.php" method="post" class="form-inline">
                            <input type="hidden" name="id" value="<?php echo $titulo['id']; ?>">
                            <button type="submit" name="borrar" class="btn btn-danger ml-2">Borrar</button>
                        </form>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
    <h3 class="text-center mt-5 text-white">Agregar o Editar Título</h3>
    <form action="gestion_tienda.php" method="post" class="mt-3">
        <div class="form-group">
            <label for="id">ID (solo para editar):</label>
            <input type="text" name="id" id="id" class="form-control" value="<?php echo $titulo_editar['id'] ?? ''; ?>">
        </div>
        <div class="form-group">
            <label for="titulo">Título:</label>
            <input type="text" name="titulo" id="titulo" class="form-control" value="<?php echo $titulo_editar['titulo'] ?? ''; ?>" required>
        </div>
        <div class="form-group">
            <label for="descripcion">Descripción:</label>
            <textarea name="descripcion" id="descripcion" class="form-control" required><?php echo $titulo_editar['descripcion'] ?? ''; ?></textarea>
        </div>
        <div class="form-group">
            <label for="lanzamiento">Lanzamiento:</label>
            <input type="date" name="lanzamiento" id="lanzamiento" class="form-control" value="<?php echo $titulo_editar['lanzamiento'] ?? ''; ?>" required>
        </div>
        <div class="form-group">
            <label for="genero">Género:</label>
            <input type="text" name="genero" id="genero" class="form-control" value="<?php echo $titulo_editar['genero'] ?? ''; ?>" required>
        </div>
        <div class="form-group">
            <label for="precio">Precio:</label>
            <input type="number" name="precio" id="precio" class="form-control" step="0.01" value="<?php echo $titulo_editar['precio'] ?? ''; ?>" required>
        </div>
        <div class="form-group">
            <label for="publisher">Publisher:</label>
            <input type="text" name="publisher" id="publisher" class="form-control" value="<?php echo $titulo_editar['publisher'] ?? ''; ?>" required>
        </div>
        <div class="form-group">
            <label for="imagen">URL de la Imagen:</label>
            <input type="text" name="imagen" id="imagen" class="form-control" value="<?php echo $titulo_editar['imagen'] ?? ''; ?>" required>
        </div>
        <button type="submit" name="guardar" class="btn btn-primary mt-3">Guardar</button>
    </form>
    <a href="../index.php" class="btn btn-secondary mt-3">Volver al Inicio</a>
</div>

<?php
include '../Includes/footer.php';
?>



<!-- Incluye jQuery y Bootstrap JS -->
<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>

