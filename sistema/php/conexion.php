<?php
$contraseña = "";
$usuario = "root";
$nombre_base_de_datos = "almacen";
try{
	$base_de_datos = new PDO('mysql:host=localhost;dbname=' . $nombre_base_de_datos, $usuario, $contraseña);
	 $base_de_datos->query("set names utf8;");
    $base_de_datos->setAttribute(PDO::ATTR_EMULATE_PREPARES, FALSE);
    $base_de_datos->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $base_de_datos->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_OBJ);

}catch(Exception $e){
	echo "Ocurrió algo con la base de datos: " . $e->getMessage();
}

include_once('class.DBAlmacen.php');
$DBAlmacen 	= new DBAlmacen($base_de_datos);

include_once('class.Compras.php');
$Compras 		= new Compras($base_de_datos);

include_once('class.Otros.php');
$Otros			= new Otros($base_de_datos);

include_once('class.Ventas.php');
$Ventas			= new Ventas($base_de_datos);

?>
