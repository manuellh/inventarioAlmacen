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
if ($cantidad <= 0) {
  header("Location: ./vender.php?status=404");
}

# Si no existe, salimos y lo indicamos
if (!$producto) {
    header("Location: ./vender.php?status=1");
    exit;
}
# Si no hay existencia...
if ($producto->existencia < 1) {
    header("Location: ./vender.php?status=2");
    exit;
}



session_start();
$Existencia = $_SESSION["ventas"][$indice]->cantidad;
if ($Existencia + $cantidad > $producto->existencia) {
    header("Location: ./vender.php?status=4");
    exit;
}

# Buscar producto dentro del cartito
$indice = false;
for ($i = 0; $i < count($_SESSION["ventas"]); $i++) {
    if ($_SESSION["ventas"][$i]->codigo === $codigo) {
        $indice = $i;
        break;
    }
}
# Si no existe, lo agregamos como nuevo
if ($indice === false && $cantidad >= 1) {
    $producto->cantidad = $cantidad;
    $producto->total = $producto->precioVenta * $cantidad;
    array_push($_SESSION["ventas"], $producto);
}else if ($cantidad >= 1) {
  // code...
  #si exede la cantidad salimos y lo indicamos
    $cantidadExistente = $_SESSION["ventas"][$indice]->cantidad;
    if ($cantidadExistente + $cantidad > $producto->existencia) {
        header("Location: ./vender.php?status=2");
        exit;
    }
    #Si no hay problema lo agregamos a la lista
    $cantidadLista= $_SESSION["ventas"][$indice]->cantidad+$cantidad;
    $_SESSION["ventas"][$indice]->cantidad=$cantidadLista;
    $_SESSION["ventas"][$indice]->total = $_SESSION["ventas"][$indice]->cantidad * $_SESSION["ventas"][$indice]->precioVenta;
} else {
  echo "error";
}

header("Location: ./vender.php");
