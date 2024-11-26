<?php
session_start();
require_once "class/Conexion.php";

if (isset($_POST['email']) && isset($_POST['password'])) {
    $email = $_POST['email'];
    $password = $_POST['password'];

    try {
        $conexion = (new Conexion())->getConexion();

        // Consulta preparada loca wacho mal loco
        $query = "SELECT * FROM usuario WHERE email = :email";
        $PDOStatement = $conexion->prepare($query);
        $PDOStatement->bindParam(':email', $email, PDO::PARAM_STR);
        $PDOStatement->execute();

        // Obtener usuario jeje test
        $usuario = $PDOStatement->fetch(PDO::FETCH_ASSOC);

        if ($usuario) {
            // Verificar la contraseña
            if (password_verify($password, $usuario["password"])) {
                $_SESSION['usuario'] = $usuario; // Guardar el usuario en la sesión
                header("Location: index.php?seccion=listado"); // Redirigir a listado
                exit();
            } else {
                echo "<script>alert('Contraseña incorrecta.');</script>";
            }
        } else {
            echo "<script>alert('Usuario no encontrado.');</script>";
        }
    } catch (Exception $e) {
        echo "Error: " . $e->getMessage();
    }
} else {
    echo "Por favor, completa todos los campos.";
}
?>



<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Iniciar sesión</title>
	<link rel="stylesheet" href="../../TP2_Allario_Bernardez_Ruiz/src/styles.css">
</head>

<body class="login-body-conntainer">
<div class="container-fluid login-logo">
    <a class="navbar-brand" href="../../TP2_Allario_Bernardez_Ruiz/index.php">
      <img class="logonav" src="../../TP2_Allario_Bernardez_Ruiz/imagenes/logo/logo.png" alt="">
    </a>
</div>


<div class="contenedor-caja-login">
    <form class="form-login" autocomplete="off" method="POST" action="login.php">
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
