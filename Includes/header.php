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
  <title>Tienda Vapor </title>
  <link rel="icon" href="./logoIcon.ico" type="image/x-icon">

  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous" />
  <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" rel="stylesheet" />
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&display=swap" rel="stylesheet">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
  <script src="./script.js"></script>
  <link rel="stylesheet" href="../TP2_Allario_Bernardez_Ruiz/src/styles.css">
</head>
<body>

<nav class="navbar navbar-expand-lg sticky-top py-0">
  <div class="container-fluid d-flex justify-content-between align-items-center ">
    <a class="navbar-brand logonav-container" href="../../TP2_Allario_Bernardez_Ruiz/index.php">
      <img class="logonav" src="../../TP2_Allario_Bernardez_Ruiz/imagenes/logo/logo.png" alt="logo">
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
          <a class="nav-link" href="../../TP2_Allario_Bernardez_Ruiz/commerce.php">Tienda</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="./../TP2_Allario_Bernardez_Ruiz/about.php">Nosotros</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="../../TP2_Allario_Bernardez_Ruiz/contacto.php">Contacto</a>
        </li>
      </ul>
      <form class="d-flex search-bar justify-content-center mx-sm-0 mx-lg-auto" role="search">
        <input class="form-control search-input" type="search" placeholder="Search" aria-label="Search" />
        <button class="btn search-btn" type="submit">
          <i class="bi bi-search"></i>
        </button>
      </form>
      <!-- Carrito -->
      <a href="carrito.php" class="navbar-cart m-2">
        <i class="bi bi-cart4 mx-1"></i>
        <span>Carrito</span>
        <span class="badge mx-1 badge-num">
          <?php echo isset($_SESSION['carrito']) ? count($_SESSION['carrito']) : 0; ?>
        </span>
      </a>
      <?php if (isset($_SESSION['usuario'])): ?>
        <span class="navbar-cart m-2">
          <i class="bi bi-person"></i> ¡Bienvenido, <?php echo $_SESSION['usuario']['nombre']; ?>!
        </span>
        <a href="../../TP2_Allario_Bernardez_Ruiz/Includes/logout.php" class="navbar-cart">
          <span>
          <i class="bi bi-box-arrow-right"></i> Cerrar Sesión
          </span>
        </a>
      <?php else: ?>
        <a href="../../TP2_Allario_Bernardez_Ruiz/login/login.php" class="navbar-cart">
          <span>
          <i class="bi bi-person"></i>
          </span>
        </a>
      <?php endif; ?>
    </div>
  </div>
</nav>
