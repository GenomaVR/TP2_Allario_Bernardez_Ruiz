<?php 
include './header.php';
?>

<body>
  <div class="container my-5">
    <div class="row row-cols-1 row-cols-md-4 g-4">
      <?php
      // Definir cuántos productos mostrar por página
      $productosPorPagina = 8;
      
      // Obtener el número de página desde la URL, si no se proporciona, se usa la página 1
      $paginaActual = isset($_GET['page']) ? (int)$_GET['page'] : 1;
      
      // Calcular el índice de inicio para los productos en la página actual
      $inicio = ($paginaActual - 1) * $productosPorPagina;
      
      // Obtener todos los archivos de la carpeta 'items'
      $imagenes = array_diff(scandir('../items'), array('..', '.')); // Elimina '.' y '..' de la lista
      
      // Verificar si hay imágenes disponibles
      if (count($imagenes) > 0) {
          // Filtrar solo las imágenes (puedes modificar esta parte si necesitas otro tipo de validación)
          $imagenes = array_filter($imagenes, function($archivo) {
              return in_array(pathinfo($archivo, PATHINFO_EXTENSION), ['jpg', 'jpeg', 'png', 'gif']);
          });
          $imagenes = array_values($imagenes); // Reindexar el arreglo

          // Verificar si hay suficientes productos para mostrar
          $totalProductos = count($imagenes);
          if ($totalProductos > 0) {
              // Generar los productos a mostrar
              for ($i = $inicio; $i < $inicio + $productosPorPagina && $i < $totalProductos; $i++) {
                  $imagen = $imagenes[$i];
                  $imagePath = '../items/' . $imagen;
                  
                  echo '
                  <div class="col">
                    <div class="card h-100">
                      <img src="' . $imagePath . '" class="card-img-top" alt="Producto ' . ($i + 1) . '">
                      <div class="card-body text-center">
                        <h5 class="card-title">Producto ' . ($i + 1) . '</h5>
                        <p class="card-text">Precio: $' . (100 * ($i + 1)) . '</p>
                        <a href="#" class="btn btn-primary">Comprar</a>
                      </div>
                    </div>
                  </div>
                  ';
              }
          } else {
              echo '<div class="col-12"><p>No hay productos disponibles.</p></div>';
          }
      } else {
          echo '<div class="col-12"><p>No hay productos disponibles.</p></div>';
      }
      ?>
    </div>

    <!-- Botones de paginación -->
    <div class="d-flex justify-content-between my-4">
      <!-- Botón de "Página Anterior" -->
      <?php if ($paginaActual > 1) : ?>
        <a href="?page=<?php echo $paginaActual - 1; ?>" class="btn btn-secondary">Página <?php echo $paginaActual - 1; ?></a>
      <?php endif; ?>
      
      <!-- Botón de "Página Siguiente" -->
      <?php if ($paginaActual < ceil($totalProductos / $productosPorPagina)) : ?>
        <a href="?page=<?php echo $paginaActual + 1; ?>" class="btn btn-secondary">Página <?php echo $paginaActual + 1; ?></a>
      <?php endif; ?>
    </div>
  </div>
</body>

<?php
include './footer.php';
?>
