<?php
session_start(); // Asegúrate de iniciar sesión

// Obtener el ID del producto desde la solicitud POST
$data = json_decode(file_get_contents("php://input"));
$productId = (int)$data->id; // Asegúrate de convertir a entero

if (!is_numeric($productId)) {
    echo json_encode(["success" => false, "message" => "ID inválido"]);
    exit;
}

// Verificar si ya existe un carrito en la sesión
if (!isset($_SESSION['carrito'])) {
    $_SESSION['carrito'] = [];
}

// Si el producto ya está en el carrito, incrementamos la cantidad
if (isset($_SESSION['carrito'][$productId])) {
    $_SESSION['carrito'][$productId]++;
} else {
    // Si no está, lo agregamos con cantidad 1
    $_SESSION['carrito'][$productId] = 1;
}

// Responder con el total de ítems en el carrito
$totalItems = array_sum($_SESSION['carrito']); // Cuenta el total de ítems en el carrito
echo json_encode([
    'success' => true,
    'totalItems' => $totalItems
]);
?>
