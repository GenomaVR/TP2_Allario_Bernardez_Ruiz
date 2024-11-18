<?php
// Aquí puedes agregar lógica PHP
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
  <link rel="stylesheet" href="./src/styles.css">


</head>

<body>

  <nav class="navbar navbar-expand-lg">
    <div class="container-fluid">
      <a class="navbar-brand" href="#">
        <img class="logonav" src="../../TP2_Allario_Bernardez_Ruiz/logo/logo.png" alt="">
      </a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent"
        aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav me-auto mb-2 mb-lg-0">
          <li class="nav-item d-flex align-items-center">
            <a class="nav-link" aria-current="page" href="#">
              <i class="bi bi-house me-2"></i> Home
            </a>
          </li>

          <li class="nav-item">
            <a class="nav-link" href="#">Tienda</a>
          </li>

          <li class="nav-item">
            <a class="nav-link" href="#">Nosotros</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#">Contacto</a>
          </li>

        </ul>
        <form class="d-flex search-bar" role="search">
          <input class="form-control search-input me-2" type="search" placeholder="Search" aria-label="Search" />
          <button class="btn search-btn" type="submit">
            <i class="bi bi-search"></i>
          </button>
        </form>
        </form>
      </div>
    </div>
  </nav>