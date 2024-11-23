<?php
require_once "class/Conexion.php";
if( isset($_POST['email']) && isset($_POST['password']) ){
    $email = $_POST['email'];
    $password = $_POST['password'];
    $conexion = ( new Conexion() )->getConexion();
    $query = "SELECT * FROM usuario WHERE email = '$email'";
    $PDOStatement = $conexion->prepare($query);
    $PDOStatement->setFetchMode(PDO::FETCH_ASSOC);
    $PDOStatement->execute();
    $usuario = $PDOStatement->fetch();
    if($usuario){
        if( password_verify($password, $usuario["password"] ) ){
            $_SESSION['usuario'] = $usuario;
            header("Location: index.php?seccion=listado");
        }
    }
    echo "Usuario no encontrado";
}

?>



<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Iniciar sesión</title>
	<link rel="stylesheet" href=".././src/styles.css">
</head>

<body class="login-body-conntainer">
<div class="container-fluid login-logo">
    <a class="navbar-brand" href="../../TP2_Allario_Bernardez_Ruiz/index.php">
      <img class="logonav" src="../../TP2_Allario_Bernardez_Ruiz/logo/logo.png" alt="">
    </a>
</div>



	<div class="contenedor-caja-login">
		<form class="form-login" autocomplete="off">
			<h2 class="titulo-login">Inicio de sesión</h2>
			<div class="campo-entrada-login">
				<input class="input-login" type="text" required="required">
				<span>Nombre de usuario</span>
				<i></i>
			</div>
			<div class="campo-entrada-login">
				<input class="input-login type="password" required="required">
				<span>Contraseña</span>
				<i></i>
			</div>
			<div class="links">
				<a href="#">Olvide mi contraseña</a>
				<a href="registro.php">Registrarse</a>
			</div>
			<input class="input-login" type="submit" value="Ingresar">
		</form>
	</div>
</body>
</html>