<?php 
include './header.php';
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


<?php
include './footer.php';
?>
