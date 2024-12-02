<?php
include './includes/header.php';
include '../TP2_Allario_Bernardez_Ruiz/Includes/config.php';

$errors = [];
$name = '';
$surname = '';
$email = '';
$message = '';
$successMessage = '';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = htmlspecialchars($_POST['name']) ?? '';
    $surname = htmlspecialchars($_POST['surname']) ?? '';
    $email = $_POST['email'] ?? '';
    $message = $_POST['message'] ?? '';

    // Validaciones
    if (empty($name)) {
        $errors[] = "El nombre es obligatorio.";
    } elseif (!preg_match("/^[a-zA-ZÀ-ÿ\s]+$/", $name)) {
        $errors[] = "El nombre solo puede contener letras y espacios.";
    }

    if (empty($surname)) {
        $errors[] = "El apellido es obligatorio.";
    } elseif (!preg_match("/^[a-zA-ZÀ-ÿ\s]+$/", $surname)) {
        $errors[] = "El apellido solo puede contener letras y espacios.";
    }

    if (empty($email)) {
        $errors[] = "El correo electrónico es obligatorio.";
    } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $errors[] = "El correo electrónico no tiene un formato válido.";
    }

    if (empty($message)) {
        $errors[] = "El mensaje no puede estar vacío.";
    } elseif (strlen($message) < 10) {
        $errors[] = "El mensaje debe tener al menos 10 caracteres.";
    }

    // Mostrar errores o procesar datos
    if (empty($errors)) {
        $successMessage = "Formulario enviado correctamente! Te contactaremos a la brevedad.";
    }
}
?>
<body class="contact-page">

<?php if (!empty($errors)): ?>
        <div class="alert alert-danger message-bar error">
            <?php echo implode('<br>', array_map('htmlspecialchars', $errors)); ?>
        </div>
    <?php elseif (!empty($successMessage)): ?>
        <div class="alert alert-success message-bar success">
            <?php echo htmlspecialchars($successMessage); ?>
        </div>
    <?php endif; ?>


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



  <?php include './Includes/footer.php'; ?>

</body>
</html>
