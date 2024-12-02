<?php
session_start();
require_once "../Includes/dbcon.php";

include '../Includes/header.php';

if (!isset($_SESSION['usuario'])) {
    header("Location: ../login/login.php");
    exit();
}

$usuario = $_SESSION['usuario'];
$mensaje = '';

// Verificar si ya existen los campos 'apellido' y 'localidad' en la base de datos del usuario
$conexion = (new Conexion())->getConexion();
$query = "SELECT apellido, localidad FROM usuarios WHERE correo = ?";
$PDOStatement = $conexion->prepare($query);
$PDOStatement->bind_param("s", $usuario['correo']);
$PDOStatement->execute();
$result = $PDOStatement->get_result();
if ($row = $result->fetch_assoc()) {
    $usuario['apellido'] = $row['apellido'];
    $usuario['localidad'] = $row['localidad'];
    $_SESSION['usuario'] = $usuario;
}

$actualizacionExitosa = false;

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nombre = htmlspecialchars($_POST['nombre']);
    $correo = $_POST['correo'];
    $apellido = htmlspecialchars($_POST['apellido']);
    $localidad = htmlspecialchars($_POST['localidad']);
    $new_password = $_POST['new_password'];
    $new_password_hashed = password_hash($new_password, PASSWORD_BCRYPT);

    if (!empty($new_password)) {
        $query = "UPDATE usuarios SET nombre = ?, correo = ?, apellido = ?, localidad = ?, contraseña = ? WHERE correo = ?";
        $PDOStatement = $conexion->prepare($query);
        $PDOStatement->bind_param("ssssss", $nombre, $correo, $apellido, $localidad, $new_password_hashed, $usuario['correo']);
    } else {
        $query = "UPDATE usuarios SET nombre = ?, correo = ?, apellido = ?, localidad = ? WHERE correo = ?";
        $PDOStatement->prepare($query);
        $PDOStatement->bind_param("sssss", $nombre, $correo, $apellido, $localidad, $usuario['correo']);
    }
    
    if ($PDOStatement->execute()) {
        $usuario['nombre'] = $nombre;
        $usuario['correo'] = $correo;
        $usuario['apellido'] = $apellido;
        $usuario['localidad'] = $localidad;
        $_SESSION['usuario'] = $usuario;
        $mensaje = "Datos actualizados correctamente";
        $actualizacionExitosa = true;
    } else {
        $mensaje = "Error al actualizar los datos";
    }
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Perfil de Usuario</title>
    
    <link rel="stylesheet" href="../src/styles.css">
    <!-- Incluye Bootstrap CSS -->
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="perfil-container">
<div class="perfil-contenedor-caja">
    <form class="formulario-perfil" action="perfil.php" method="post">
        <h2 class="titulo-perfil">Perfil de Usuario</h2>
        <?php if ($mensaje): ?>
            <p><?php echo $mensaje; ?></p>
        <?php endif; ?>
        <div class="campo-entrada-perfil">
            <span>Nombre</span>
            <input class="form-control" type="text" name="nombre" id="nombre" value="<?php echo isset($usuario['nombre']) ? $usuario['nombre'] : ''; ?>" required>
        </div>
        <div class="campo-entrada-perfil">
            <span>Correo Electrónico</span>
            <input class="form-control" type="email" name="correo" id="correo" value="<?php echo isset($usuario['correo']) ? $usuario['correo'] : ''; ?>" required>
        </div>
        <div class="campo-entrada-perfil">
            <span>Apellido</span>
            <input class="form-control" type="text" name="apellido" id="apellido" value="<?php echo isset($usuario['apellido']) ? $usuario['apellido'] : ''; ?>" required>
        </div>
        <div class="campo-entrada-perfil">
            <span>Localidad</span>
            <input class="form-control" type="text" name="localidad" id="localidad" value="<?php echo isset($usuario['localidad']) ? $usuario['localidad'] : ''; ?>" required>
        </div>
        <div class="campo-entrada-perfil">
            <span>Nueva Contraseña (dejar en blanco si no desea cambiarla)</span>
            <input class="form-control" type="password" name="new_password" id="new_password">
        </div>
        <button type="submit" class="btn-enviar-perfil">Actualizar Datos</button>
        <a href="../index.php" class="btn-volver-inicio">Volver al Inicio</a>
        <?php if ($usuario['rol'] === 'admin'): ?>
            <a href="usuarios.php" class="btn-gestion-usuarios">Gestión de Usuarios</a>
            <a href="gestion_tienda.php" class="btn-gestion-tienda">Gestión de Tienda</a>
        <?php endif; ?>
    </form>
</div>

<!-- Modal de Confirmación -->
<div class="modal fade" id="confirmationModal" tabindex="-1" aria-labelledby="confirmationModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content" id="confirmationModalContent">
      <div class="modal-header">
        <h5 class="modal-title" id="confirmationModalLabel">Datos Actualizados</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        ¡Datos cambiados exitosamente!
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-primary" id="closeModalButton" data-bs-dismiss="modal">Cerrar</button>
      </div>
    </div>
  </div>
</div>

<!-- Incluye jQuery y Bootstrap JS -->
<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

<!-- JavaScript para mostrar el modal si la actualización fue exitosa -->
<script>
    $(document).ready(function() {
        <?php if ($actualizacionExitosa): ?>
        $('#confirmationModal').modal('show');
        <?php endif; ?>
    });
</script>

<?php
include '../Includes/footer.php';
?>
</body>
</html>
