<?php
function mostrar_error($error) {

  if($error){
?>
<div class="custom-container">
<div class="custom-content">
    <img src="../TP2_Allario_Bernardez_Ruiz/imagenes/img/notfound.png" width="200" alt="" class="img-notfound">
    <div class="custom-text">
        <h3>Elementos no encontrados</h3>
        <p>Esta sección está en un plano desconocido, intenta nuevamente más tarde.</p>

    </div>
</div>
</div>
<?php
  }

}
?>