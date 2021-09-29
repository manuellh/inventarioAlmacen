<?php


$host = "localhost"; /* Host name */
$user = "id13590286_manuel"; /* User */
$password = "H^fH6MQFsxeR1)Ci"; /* Password */
$dbname = "id13590286_almacen"; /* Database name */

$con = mysqli_connect($host, $user, $password,$dbname);
// Check connection
if (!$con) {
 die("Connection failed: " . mysqli_connect_error());
}

if(isset($_POST['buscarProveedor'])){
 $buscarProveedor = $_POST['buscarProveedor'];

 $query = "SELECT * FROM proveedor WHERE nombre like'%".$buscarProveedor."%'";
 $result = mysqli_query($con,$query);

 while($row = mysqli_fetch_array($result) ){
     $response[] = array("value"=>$row['idProveedor'],"label"=>$row['nombre']);
 }

 echo json_encode($response);
}

if(isset($_POST['buscarMoneda'])){
 $buscarMoneda = $_POST['buscarMoneda'];

 $query = "SELECT * FROM moneda_cambio WHERE moneda like'%".$buscarMoneda."%'";
 $result = mysqli_query($con,$query);

 while($row = mysqli_fetch_array($result) ){
     $response[] = array("value"=>$row['costo'],"label"=>$row['moneda']);
 }

 echo json_encode($response);
}

if(isset($_POST['buscarCliente'])){
 $buscarCliente = $_POST['buscarCliente'];

 $query = "SELECT * FROM clientes WHERE nombre like'%".$buscarCliente."%'";
 $result = mysqli_query($con,$query);

 while($row = mysqli_fetch_array($result) ){
     $response[] = array("value"=>$row['id'],"label"=>$row['nombre']);
 }

 echo json_encode($response);
}

if(isset($_POST['busca_id_moneda'])){
 $busca_id_moneda = $_POST['busca_id_moneda'];

 $query = "SELECT * FROM moneda_cambio WHERE moneda like'%".$busca_id_moneda."%'";
 $result = mysqli_query($con,$query);

 while($row = mysqli_fetch_array($result) ){
     $response[] = array("value"=>$row['id'],"label"=>$row['moneda']);
 }

 echo json_encode($response);
}
exit;
?>
