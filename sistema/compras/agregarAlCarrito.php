<?php
if (!isset($_POST["codigo"])) {
    return;
}

$codigo = $_POST["codigo"];
$cantidad = $_POST['cantidad'];
include_once('../php/conexion.php');
$sentencia = $base_de_datos->prepare("SELECT * FROM productos WHERE codigo = ? LIMIT 1;");
$sentencia->execute([$codigo]);
$producto = $sentencia->fetch(PDO::FETCH_OBJ);
# Si no existe, salimos y lo indicamos
if (!$producto) {
    header("Location: ./comprar.php?status=4");
    exit;
}
session_start();
# Buscar producto dentro del cartito
$indice = false;
for ($i = 0; $i < count($_SESSION["compras"]); $i++) {
    if ($_SESSION["compras"][$i]->codigo === $codigo) {
        $indice = $i;
        break;
    }
}
# Si no existe, lo agregamos como nuevo
if ($indice === false) {
    $producto->cantidad = $cantidad;
    $producto->total = $producto->precioCompra * $cantidad;
    array_push($_SESSION["compras"], $producto);
} else {
    # Si ya existe, se agrega la cantidad
    $cantidadLista= $_SESSION["compras"][$indice]->cantidad+$cantidad;
    $_SESSION["compras"][$indice]->cantidad=$cantidadLista;
    $_SESSION["compras"][$indice]->total = $_SESSION["compras"][$indice]->cantidad * $_SESSION["compras"][$indice]->precioCompra;
}

header("Location: ./comprar.php". $proveedor->idProveedor);
