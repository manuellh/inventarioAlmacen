<?php
$BD="almacen";
$servidor="localhost";
$usuario="root";
$contrasena="";

$conexion=mysqli_connect($servidor,$usuario,$contrasena,$BD);

if ($conexion) {

}else {
  echo "error";
}

 ?>
