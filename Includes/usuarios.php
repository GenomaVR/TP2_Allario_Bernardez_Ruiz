<?php
session_start();
require_once "../Includes/dbcon.php";

include '../Includes/header.php';

if (!isset($_SESSION['usuario']) || $_SESSION['usuario']['rol'] !== 'admin') {
    header("Location: ../login/login.php");
    exit();
}

$conexion = (new Conexion())->getConexion();
$mensaje = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $usuario_id = $_POST['usuario_id'];
    $nuevo_rol = $_POST['rol'];

    $query = "UPDATE usuarios SET rol = ? WHERE id = ?";
    $PDOStatement = $conexion->prepare($query);
    $PDOStatement->bind_param("si", $nuevo_rol, $usuario_id);

    if ($PDOStatement->execute()) {
        $mensaje = "Rol actualizado correctamente.";
    } else {
        $mensaje = "Error al actualizar el rol.";
    }
}

$query = "SELECT id, nombre, correo, rol FROM usuarios";
$result = $conexion->query($query);
$usuarios = $result->fetch_all(MYSQLI_ASSOC);
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Gestión de Usuarios</title>
    <link rel="stylesheet" href="../src/styles.css">
    <!-- Incluye Bootstrap CSS -->
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>

<div class="contenido-gestion container mt-5">
    <h2 class="text-center">Gestión de Usuarios</h2>
    <?php if ($mensaje): ?>
        <div class="alert alert-info" role="alert">
            <?php echo $mensaje; ?>
        </div>
    <?php endif; ?>
    <table class="table table-striped table-hover mt-4">
        <thead class="thead-dark">
            <tr>
                <th>Nombre</th>
                <th>Correo</th>
                <th>Rol</th>
                <th>Acción</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($usuarios as $usuario): ?>
                <tr>
                    <td><?php echo htmlspecialchars($usuario['nombre']); ?></td>
                    <td><?php echo htmlspecialchars($usuario['correo']); ?></td>
                    <td><?php echo htmlspecialchars($usuario['rol']); ?></td>
                    <td>
                        <form action="usuarios.php" method="post" class="form-inline">
                            <input type="hidden" name="usuario_id" value="<?php echo $usuario['id']; ?>">
                            <select name="rol" class="form-control mr-2">
                                <option value="usuario" <?php echo $usuario['rol'] === 'usuario' ? 'selected' : ''; ?>>Usuario</option>
                                <option value="admin" <?php echo $usuario['rol'] === 'admin' ? 'selected' : ''; ?>>Admin</option>
                            </select>
                            <button type="submit" class="btn btn-primary">Actualizar</button>
                        </form>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
    <a href="../index.php" class="btn btn-secondary btn-volver">Volver al Inicio</a>
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

