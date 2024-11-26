<?php
function mostrar_error($error, $mensaje = '') {
  if ($error) {
?>
<div class="custom-container">
  <div class="custom-content">
    <img src="../TP2_Allario_Bernardez_Ruiz/imagenes/img/server.gif" width="200" alt="" class="img-notfound">
    <div class="custom-text">
      <h3>Elementos no encontrados</h3>
      <p>Esta sección está en un plano desconocido, intenta nuevamente más tarde.</p>
      <?php if ($mensaje): ?>
        <p class="text-danger"><?php echo htmlspecialchars($mensaje); ?></p>
      <?php endif; ?>
    </div>
  </div>
</div>
<?php
  }
}
?>