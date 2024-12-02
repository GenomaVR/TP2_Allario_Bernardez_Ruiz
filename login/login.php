<?php
session_start();
require_once "../Includes/dbcon.php";

$showModal = false;
$errorMessage = '';

if (isset($_POST['email']) && isset($_POST['password'])) {
    $email = $_POST['email'];
    $password = $_POST['password'];
    $conexion = (new Conexion())->getConexion();

    $query = "SELECT * FROM usuarios WHERE correo = ?";
    $PDOStatement = $conexion->prepare($query);
    $PDOStatement->bind_param("s", $email);
    $PDOStatement->execute();
    $result = $PDOStatement->get_result();
    $usuario = $result->fetch_assoc();

    if ($usuario) {
        if (password_verify($password, $usuario["contraseña"])) {
            $_SESSION['usuario'] = $usuario;
            $showModal = true;
            echo "<script>let userName = '" . $usuario['nombre'] . "';</script>";
            echo "<script>
                window.addEventListener('load', function(){
                    $('#welcomeModal').modal('show');
                    setTimeout(function(){
                        window.location.href = '../index.php?seccion=listado';
                    }, 3000); // Redirigir después de 3 segundos
                });
            </script>";
        } else {
            $errorMessage = 'Contraseña incorrecta';
            echo "<script>
                window.addEventListener('load', function(){
                    $('#errorModal').modal('show');
                });
            </script>";
        }
    } else {
        $errorMessage = 'Usuario no registrado o Datos de ingreso incorrectos';
        echo "<script>
            window.addEventListener('load', function(){
                $('#errorModal').modal('show');
            });
        </script>";
    }
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Iniciar sesión</title>
    <link rel="stylesheet" href="../src/styles.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</head>
<body class="login-body-container">
<div class="container-fluid login-logo">
    <a class="navbar-brand" href="../index.php">
        <img class="logonav" src="../imagenes/logo/logo.png" alt="">
    </a>
</div>

<div class="contenedor-caja-login">
    <form class="form-login" autocomplete="off" action="login.php" method="post">
        <h2 class="titulo-login">Inicio de sesión</h2>
        <div class="campo-entrada-login">
            <input class="input-login" type="text" name="email" required="required">
            <span>Correo electrónico</span>
            <i></i>
        </div>
        <div class="campo-entrada-login">
            <input class="input-login" type="password" name="password" required="required">
            <span>Contraseña</span>
            <i></i>
        </div>
        <div class="links">
            <a href="#">Olvidé mi contraseña</a>
            <a href="registro.php">Registrarse</a>
        </div>
        <input class="input-login" type="submit" value="Ingresar">
    </form>
</div>

<!-- Modal de Bienvenida -->
<div class="modal fade" id="welcomeModal" tabindex="-1" aria-labelledby="welcomeModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content" id="welcomeModalContent">
      <div class="modal-header">
        <h5 class="modal-title" id="welcomeModalLabel">Bienvenido</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        ¡Bienvenido, <span id="userName"></span>!
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-primary" id="closeModalButton" data-bs-dismiss="modal">Cerrar</button>
      </div>
    </div>
  </div>
</div>

<!-- Modal de Error -->
<div class="modal fade" id="errorModal" tabindex="-1" aria-labelledby="errorModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content" id="errorModalContent">
      <div class="modal-header">
        <h5 class="modal-title" id="errorModalLabel">Error</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <?php echo $errorMessage; ?>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-primary" id="closeErrorModalButton" data-bs-dismiss="modal">Cerrar</button>
      </div>
    </div>
  </div>
</div>

<script>
  if (typeof userName !== 'undefined') {
    document.getElementById('userName').innerText = userName;
  }

  document.getElementById('closeModalButton').addEventListener('click', function() {
    window.location.href = '../index.php?seccion=listado';
  });

  document.getElementById('closeErrorModalButton').addEventListener('click', function() {
    window.location.href = 'login.php';
  });
</script>

</body>
</html>
