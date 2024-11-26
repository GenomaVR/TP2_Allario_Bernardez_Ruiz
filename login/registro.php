
<?php
// echo "<pre>";
// print_r($_POST);
// echo "</pre>";
include_once "class/Conexion.php";
if( isset($_POST["username"]) && isset($_POST["email"]) && isset($_POST["password"]) && isset($_POST["password2"])){
    try {
        $conexion = (new Conexion()) -> getConexion() ;
        $username = htmlspecialchars($_POST["username"]);
        $email = $_POST["email"];
        $password = $_POST["password"];
        $password2 = $_POST["password2"];
        if($password == $password2){
            $query = "INSERT INTO usuario (nombre, email, password) VALUES (:username, :email, :password)"; // :username, :email, :pass son marcadores o placeholders
            $PDOStatement = $conexion -> prepare($query);
            $PDOStatement -> execute([
                "username" => $username,
                "email" => $email,
                "password" => password_hash($pass, PASSWORD_BCRYPT)
            ]);
            header("Location: index.php?seccion=login");
        }
    } catch (Exception $e) {
        echo "No pude registrar el usuario"; // jeje aca usar una variable para mostrar el error abajo
    }
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
<section class="register-container">
<div class="contenedor-caja">
		<form  autocomplete="off" class="formulario-registro" action="validacion/registro.php" method="post">
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
