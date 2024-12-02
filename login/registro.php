<?php
session_start(); // Iniciar sesión
include_once "../Includes/dbcon.php";

if (isset($_POST["username"]) && isset($_POST["email"]) && isset($_POST["pass"]) && isset($_POST["pass2"])) {
    try {
        // Conexión a la base de datos
        $conexion = (new Conexion())->getConexion();
        $username = htmlspecialchars($_POST["username"]);
        $email = $_POST["email"];
        $password = $_POST["pass"];
        $password2 = $_POST["pass2"];

        if ($password == $password2) {
            // Verificar que el usuario no exista
            $checkUserQuery = "SELECT * FROM usuarios WHERE correo = ?";
            $PDOStatement = $conexion->prepare($checkUserQuery);
            $PDOStatement->bind_param("s", $email);
            $PDOStatement->execute();
            $PDOStatement->store_result();
            
            if ($PDOStatement->num_rows > 0) {
                echo "El usuario ya existe";
            } else {
                // Inserción del nuevo usuario
                $query = "INSERT INTO usuarios (nombre, correo, contraseña, rol) VALUES (?, ?, ?, ?)";
                $PDOStatement = $conexion->prepare($query);
                $hashedPassword = password_hash($password, PASSWORD_BCRYPT);
                $rol = 'usuario';
                $PDOStatement->bind_param("ssss", $username, $email, $hashedPassword, $rol);
                $PDOStatement->execute();
                
                // Loguear automáticamente al nuevo usuario
                $_SESSION['usuario'] = [
                    'nombre' => $username,
                    'correo' => $email,
                    'rol' => $rol
                ];

                // Redirigir al index
                header("Location: ../index.php");
                exit(); // Asegura que el script se detiene después de la redirección
            }
        } else {
            echo "Las contraseñas no coinciden";
        }
    } catch (Exception $e) {
        echo "No se pudo registrar el usuario: " . $e->getMessage(); // Muestra el error específico
    }
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Registro</title>
    <link rel="stylesheet" href="../src/styles.css">
</head>
<body class="login-body-container">
    <div class="container-fluid login-logo">
        <a class="navbar-brand" href="../index.php">
            <img class="logonav" src="../imagenes/logo/logo.png" alt="">
        </a>
    </div>
<section class="register-container">
<div class="contenedor-caja">
        <form autocomplete="off" class="formulario-registro" action="./registro.php" method="post">
            <h2 class="titulo-formulario">Registro</h2>
            <div class="campo-entrada">
                <input type="text" name="username" required="required">
                <span>Nombre de usuario</span>
                <i></i>
            </div>
            <div class="campo-entrada w-100">
                <input type="email" name="email" required="required">
                <span>Correo electrónico</span>
                <i></i>
            </div>
            <div class="campo-entrada">
                <input type="password" name="pass" required="required">
                <span>Contraseña</span>
                <i></i>
            </div>
            <div class="campo-entrada">
                <input type="password" name="pass2" required="required">
                <span>Confirmar contraseña</span>
                <i></i>
            </div>
            <div class="enlaces-formulario">
                <a href="login.php">¿Ya tienes una cuenta? Iniciar sesión</a>
            </div>
            <input type="submit" class="btn-enviar" value="Registrarse">
        </form>
    </div>
</section>
</body>
</html>
