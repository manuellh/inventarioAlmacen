<?php
include_once('../php/conexion.php');

if(isset($_GET["id"])){
  $Compras->eliminarCompra();
}

?>
