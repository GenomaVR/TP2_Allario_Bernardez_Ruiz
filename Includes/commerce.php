<?php
include './header.php';
?>


<?php
include '404-section.php';

include 'config.php'; // Incluir el archivo de configuración

// Consulta de juegos desde la base de datos
$sql = "SELECT id, titulo, descripcion, lanzamiento, genero, precio, publisher, imagen FROM titulos";
$result = $conn->query($sql);

if (!$result) {
    mostrar_error(true);
    die("Error en la consulta: " . $conn->error);
}
?>
<body>


<body>
  <div class="container my-5 principal">
    <!-- Contenedor principal de las filas -->
    <?php
    // Definir cuántos juegos mostrar por página
    $productosPorPagina = 8; // Cambiar para ajustar la cantidad por página
    $productosPorFila = 4;   // Cantidad de tarjetas por fila

    // Obtener el número de página desde la URL, si no se proporciona, se usa la página 1
    $paginaActual = isset($_GET['page']) ? (int)$_GET['page'] : 1;

    // Calcular el índice de inicio para los productos en la página actual
    $inicio = ($paginaActual - 1) * $productosPorPagina;

    // Consulta de juegos desde la base de datos
    $sql = "SELECT id, titulo, descripcion, lanzamiento, genero, precio, publisher, imagen FROM titulos LIMIT $inicio, $productosPorPagina";
    $result = $conn->query($sql);

    if (!$result) {
      die("Error en la consulta: " . $conn->error);
    }

    if ($result->num_rows > 0) {
      $contador = 0;
      while ($row = $result->fetch_assoc()) {
        // Verificar si la imagen está vacía o nula
        $imagen = !empty($row["imagen"]) ? $row["imagen"] : 'ruta/a/imagen/predeterminada.jpg'; // Imagen predeterminada


        // Inicia una nueva fila cada 4 tarjetas
        if ($contador % $productosPorFila == 0) {
          echo '<div class="row g-4">'; // Nueva fila con espacio entre tarjetas
        }

        echo '<div class="col-md-3">
        <div class=" commercer-card h-100 neon-card">
            <img src="..' . $imagen . '" class="card-img-top p-3" alt="' . $row["titulo"] . '">
            <div class="card-body d-flex flex-column align-items-center text-center">
                <h5 class="card-title text-white">' . $row["titulo"] . '</h5>
                <p class="card-text text-white">';

        if ($row["genero"] == "Free to Play") {
          echo '<span class="text-success">Descargar gratis</span>';
        } elseif ($row["precio"] === null || $row["precio"] === '') {
          echo '<span class="text-danger">Fuera de stock</span>';
        } elseif ($row["precio"] == 0) {
          echo '<span class="text-success">Gratis</span>';
        } else {
          echo "Precio: $" . $row["precio"];
        }

        echo '</p>
        <div class="d-flex justify-content-center w-100">';

        // Verifica si el producto es gratuito o tiene precio
        if ($row["genero"] == "Free to Play" || $row["precio"] == 0) {
          echo '<button class="btn btn-success d-flex align-items-center justify-content-center"
          onclick="mostrarDetalleProducto(\'' . $row["id"] . '\', \'' . addslashes($row["titulo"]) . '\', \'' . addslashes($row["descripcion"]) . '\', \'' . addslashes($imagen) . '\', ' . ($row["precio"] ? $row["precio"] : 0) . ', \'' . addslashes($row["lanzamiento"]) . '\', \'' . addslashes($row["publisher"]) . '\', \'' . addslashes($row["genero"]) . '\')">
          <i class="bi bi-cart-plus me-2"></i> Descargar gratis
          </button>';
        } else {
          echo '<button class="btn btn-primary d-flex align-items-center justify-content-center"
          onclick="mostrarDetalleProducto(\'' . $row["id"] . '\', \'' . addslashes($row["titulo"]) . '\', \'' . addslashes($row["descripcion"]) . '\', \'' . addslashes($imagen) . '\', ' . ($row["precio"] ? $row["precio"] : 0) . ', \'' . addslashes($row["lanzamiento"]) . '\', \'' . addslashes($row["publisher"]) . '\', \'' . addslashes($row["genero"]) . '\')">
          <i class="bi bi-eye me-2"></i> Ver más
          </button>';




        }




        echo '</div>
        </div>
        </div>
        </div>';

        $contador++;

        // Cierra la fila después de cada 4 tarjetas
        if ($contador % $productosPorFila == 0) {
          echo '</div>';
        }
      }

      // Cierra la fila si no se completó
      if ($contador % $productosPorFila != 0) {
        echo '</div>';
      }
    } else {
      echo '<div class="col-12"><p>No hay juegos disponibles.</p></div>';
    }

    // Calcular el número total de productos para la paginación
    $sqlTotal = "SELECT COUNT(*) as total FROM titulos";
    $resultTotal = $conn->query($sqlTotal);
    $totalProductos = $resultTotal->fetch_assoc()['total'];

    // Calcular el número total de páginas
    $totalPaginas = ceil($totalProductos / $productosPorPagina);
    ?>



    <!-- Botones de paginación -->
    <div class="d-flex justify-content-center my-4">
      <?php
      // Mostrar los botones de paginación de las páginas
      for ($i = 1; $i <= $totalPaginas; $i++) :
        // Cambiar la clase activa para la página actual
        $activeClass = ($i == $paginaActual) ? 'active' : '';
      ?>
        <a href="?page=<?php echo $i; ?>" class="btn btn-secondary <?php echo $activeClass; ?>"><?php echo $i; ?></a>
      <?php endfor; ?>
    </div>
  </div>

  <!-- Modal -->
  <div class="modal fade" id="productoModal" tabindex="-1" aria-labelledby="productoModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="productoModalLabel">Detalle del Producto</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <div id="modalContent"></div>
        </div>
        <div class="modal-footer">
          <!-- Botón Cerrar -->
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>

          <!-- Botón dinámico -->
          <button type="button" class="btn btn-secondary" id="modalActionButton" data-bs-dismiss="modal">Acción</button>
        </div>
      </div>
    </div>
  </div>




  <script>
  function mostrarDetalleProducto(id, titulo, descripcion, imagen, precio, lanzamiento, publisher, genero) {
  if (!imagen || imagen === 'null' || imagen === 'undefined') {
    imagen = 'ruta/a/imagen/predeterminada.jpg'; // Imagen predeterminada si no hay imagen
  }

  const modalContent = `
    <img src="${imagen}" class="img-fluid mb-3" alt="${titulo}">
    <h4>${titulo}</h4>
    <p>${descripcion}</p>
    <p><strong>Precio:</strong> ${precio == 0 || precio === '' ? 'Gratis' : '$' + precio}</p>
    <p><strong>Lanzamiento:</strong> ${lanzamiento}</p>
    <p><strong>Publisher:</strong> ${publisher}</p>
  `;

  document.getElementById('modalContent').innerHTML = modalContent;

  const actionButton = document.getElementById('modalActionButton');

  // Acciones para productos gratis o de pago
  if (precio == 0 || genero === 'Free to Play') {
    actionButton.innerText = 'Descargar gratis';
    actionButton.onclick = function() {
      alert(`Iniciando descarga de ${titulo}...`);
    };
  } else {
    actionButton.innerText = 'Agregar al carrito';
    actionButton.onclick = function() {
      fetch('agregar_carrito.php', {
        method: 'POST',
        headers: {
          'Content-Type': 'application/json'
        },
        body: JSON.stringify({
          id: id // Usar el ID correctamente para agregar al carrito
        })
      })
      .then(response => response.json())
      .then(data => {
        if (data.success) {
          const cartBadge = document.querySelector('.badge.bg-success');
          if (cartBadge) {
            cartBadge.textContent = data.totalItems;
          }
          alert('Producto agregado al carrito');
        } else {
          alert('Error al agregar al carrito');
        }
      })
      .catch(error => {
        console.error('Error al agregar al carrito:', error);
        alert('Error al agregar al carrito');
      });
    };
  }

  // Mostrar el modal
  const productoModal = new bootstrap.Modal(document.getElementById('productoModal'));
  productoModal.show();
}



    function agregarAlCarrito(productId) {
  fetch('agregar_carrito.php', {
    method: 'POST',
    headers: {
      'Content-Type': 'application/json'
    },
    body: JSON.stringify({
      id: productId
    })
  })
  .then(response => response.json())
  .then(data => {
    if (data.success) {
      // Actualiza el contador del carrito
      const cartBadge = document.querySelector('.badge.bg-success');
      if (cartBadge) {
        cartBadge.textContent = data.totalItems; // Actualiza el total de ítems en el carrito
      }
      alert('Producto agregado al carrito');
    } else {
      alert('Error al agregar al carrito: ' + data.message);
    }
  })
  .catch(error => {
    console.error('Error al agregar producto al carrito:', error);
    alert('Error al agregar producto al carrito');
  });
}

  </script>

</body>

<?php
$conn->close();
include './footer.php';
?>