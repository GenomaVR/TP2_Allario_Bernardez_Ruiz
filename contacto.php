<?php
include './includes/header.php';
?>




<body class="contact-page">
  <div class="contact-form-container">

    <form action="" method="POST" class="contact-form">
    <h2>Escribinos!</h2>
      <div class="form-group">
        <label for="name">Nombre</label>
        <input type="text" class="form-control" id="name" name="name" required placeholder="Escribe tu nombre">
      </div>
      <div class="form-group">
        <label for="surname">Apellido</label>
        <input type="text" class="form-control" id="surname" name="surname" required placeholder="Escribe tu apellido">
      </div>
      <div class="form-group">
        <label for="email">Correo electrónico</label>
        <input type="email" class="form-control" id="email" name="email" required placeholder="Escribe tu correo electrónico">
      </div>
      <div class="form-group">
        <label for="message">Mensaje</label>
        <textarea class="form-control" id="message" name="message" rows="4" required placeholder="Escribe tu mensaje"></textarea>
      </div>
      <button type="submit" class="btn">Enviar</button>
    </form>
  </div>
</body>


<footer class="footer-notfound">
<div class="footer-links">
    <div class="link-column">
      <p class="links-title">VAPOR Argentina</p>
      <ul class="nav rowear" style="list-style-type: none; padding: 0;">
        <li class="nav-item">
          <a href="#" class="nav-link">Home</a>
        </li>
        <li class="nav-item">
          <a href="#" class="nav-link">Tienda</a>
        </li>
        <li class="nav-item">
          <a href="#" class="nav-link">Nosotros</a>
        </li>
        <li class="nav-item">
          <a href="#" class="nav-link">Contacto</a>
        </li>
      </ul>
    </div>
</footer>

</body>
</hmtl>