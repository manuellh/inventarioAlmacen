<?php

include_once "../php/conexion.php";
if (isset($_GET['id'])) {
    $DBAlmacen->eliminar_producto();
  }
  ?>
