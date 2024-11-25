<?php
if (session_status() == PHP_SESSION_NONE) { // Verifica si no se ha iniciado la sesión
  session_start();
}

$carrito = isset($_SESSION['carrito']) ? $_SESSION['carrito'] : [];
$total_items = count($carrito);
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>El Cinfeilo </title>
  <link rel="icon" href="./logoIcon.ico" type="image/x-icon">

  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous" />
  <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" rel="stylesheet" />
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&display=swap" rel="stylesheet">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
  <link rel="stylesheet" href="src/styles.css">
  <script src="./script.js"></script>
  <link rel="stylesheet" href="../src/styles.css">

</head>

<body>

<nav class="navbar navbar-expand-lg">
  <div class="container-fluid d-flex justify-content-between align-items-center">
    <a class="navbar-brand logonav-container" href="#">
      <img class="logonav" src="../../TP2_Allario_Bernardez_Ruiz/logo/logo.png" alt="">
    </a>
    <button class="navbar-toggler custom-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent"
      aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav d-flex align-items-start">
        <li class="nav-item">
          <a class="nav-link" aria-current="page" href="../../TP2_Allario_Bernardez_Ruiz/index.php">
            <i class="bi bi-house me-2"></i> Home
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="../../TP2_Allario_Bernardez_Ruiz/Includes/commerce.php">Tienda</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#">Nosotros</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="../../TP2_Allario_Bernardez_Ruiz/Includes/contacto.php">Contacto</a>
        </li>
      </ul>
      <form class="d-flex search-bar justify-content-center" role="search">
        <input class="form-control search-input" type="search" placeholder="Search" aria-label="Search" />
        <button class="btn search-btn" type="submit">
          <i class="bi bi-search"></i>
        </button>
      </form>
      <!-- Carrito -->
      <a href="carrito.php" class="navbar-cart m-2">
        <i class="bi bi-cart4 mx-1"></i>
        <span>Carrito</span>
        <span class="badge bg-success mx-1">
          <?php echo isset($_SESSION['carrito']) ? count($_SESSION['carrito']) : 0; ?>
        </span>
      </a>
      <a href="../login/login.php" class="navbar-cart">
        <span>Login</span>
        <i class="bi bi-person  mx-1"></i>
      </a>
    </div>
  </div>
</nav>
