<!-- Incluir el encabezado -->
<?php include('../TP2_Allario_Bernardez_Ruiz/includes/header.php'); ?>

<?php


// Iniciar carrito si no existe
$carrito = isset($_SESSION['carrito']) ? $_SESSION['carrito'] : [];

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "juegos";

// Conectar a la base de datos
$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
    die("Conexión fallida: " . $conn->connect_error);
}

// Eliminar producto del carrito
if (isset($_GET['eliminar'])) {
    $idEliminar = $_GET['eliminar'];
    if (is_numeric($idEliminar)) { // Verificar que $idEliminar sea un número
        unset($carrito[$idEliminar]);
        $_SESSION['carrito'] = $carrito;
    } else {
        echo "ID inválido: $idEliminar";
    }
    header("Location: carrito.php");
    exit;
}

// Vaciar carrito si se recibe el parámetro vaciar
if (isset($_GET['vaciar']) && $_GET['vaciar'] == 'true') {
    $_SESSION['carrito'] = []; // Vaciar el carrito
    echo "<script>alert('Carrito vacío');</script>"; // Esto te ayudará a ver si se vacía correctamente
    header("Location: carrito.php"); // Redirigir para evitar reenvíos del formulario
    exit;
}



// Actualizar carrito (si se desea modificar cantidad)
if (isset($_POST['actualizar'])) {
    foreach ($_POST['cantidad'] as $id => $cantidad) {
        if (is_numeric($id) && $cantidad > 0) { // Verificar que $id y $cantidad sean números válidos
            $carrito[$id] = $cantidad;
        } else {
            unset($carrito[$id]); // Eliminar productos no válidos
        }
    }
    $_SESSION['carrito'] = $carrito;
    header("Location: carrito.php");
    exit;
}

$total = 0;
?>



<div class="container my-5">
    <div class="cart-container">
        <h1 class="cart-empty-text">TU CARRITO DE COMPRAS</h1>
    </div>

    <?php if (!empty($carrito)): ?>
        <form method="post" action="carrito.php">
    <table class="table table-bordered table-dark cart-table">
        <thead class="bg-dark">
            <tr class="text-center">
                <th>Producto</th>
                <th>Precio</th>
                <th>Cantidad</th>
                <th>Subtotal</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody class="">
            <?php foreach ($carrito as $id => $cantidad): ?>
                <?php
                // Verificar que $id sea un número
                if (!is_numeric($id)) {
                    echo "ID inválido: $id";
                    continue;
                }

                // Consulta a la base de datos
                $sql = "SELECT titulo, precio FROM titulos WHERE id = $id";
                $result = $conn->query($sql);

                if (!$result) {
                    echo "Error en la consulta: " . $conn->error;
                    exit;
                }

                $producto = $result->fetch_assoc();
                if ($producto) {
                    $subtotal = $producto['precio'] * $cantidad;
                    $total += $subtotal;
                } else {
                    echo "Producto no encontrado.";
                    continue;
                }
                ?>
                <tr>
                    <td><?php echo $producto['titulo']; ?></td>
                    <td class="text-center">$<?php echo $producto['precio']; ?></td>
                    <td class="text-center">
                        <input class="input-num bg-dark text-white text-center" type="number" name="cantidad[<?php echo $id; ?>]" value="<?php echo $cantidad; ?>" min="1" class="form-control" style="width: 60px;">
                    </td>
                    <td class="text-center">$<?php echo $subtotal; ?></td>
                    <td class="text-center">
                        <a href="carrito.php?eliminar=<?php echo $id; ?>" class="btn btn-danger btn-sm"><i class="bi bi-trash-fill"></i></a>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
    <button type="submit" name="actualizar" class="btn btn-outline-light">Actualizar carrito</button>
    <!-- Botón para vaciar el carrito -->
    <a href="carrito.php?vaciar=true" class="btn btn-outline-warning">Vaciar carrito</a>
</form>
<span class="total-span">Total: $<?php echo $total; ?></span>

    <?php else: ?>
        <div class="cart-empty-text">
            El carrito está vacío
        </div>
    <?php endif; ?>
</div>

<!-- Incluir el pie de página -->
<?php include './Includes/footer.php'; ?>
