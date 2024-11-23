
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
        echo "No pude registrar el usuario"; // usar una variable para mostrar el error abajo
    }
}

?>


<link rel="stylesheet" href="style.css">
<body class="contenedor-body">
	<div class="contenedor-caja">
		<form action="validacion/registro.php" method="post">
		<form class="formulario-registro" autocomplete="off">
			<h2 class="titulo-formulario">Registro</h2>
			<div class="campo-entrada">
				<input type="text" name="username" required="required">
				<span>Nombre de usuario</span>
				<i></i>
			</div>
			<div class="campo-entrada">
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
</body>
</html>
