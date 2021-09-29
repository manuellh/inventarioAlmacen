<?php include_once('../php/conexion.php');

$alert='';
session_start();

if (!empty($_SESSION['active'])) {
  if(!isset($_SESSION["compras"])) $_SESSION["compras"] = [];
  $granTotal = 0;
  $Compras->status();

  if (isset($_POST['terminarCompra'])) {
    $Compras->terminarCompra();
  }

?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Almacen INGE-TEL</title>
  </head>
  <link rel="stylesheet" href="../materialize/css/materialize.min.css">
  <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
  <link rel="stylesheet" href="../css/style.css">
  <link rel="stylesheet" href="../css/jquery-ui.min.css">
  <script src="../materialize/jquery.min.js"></script>
  <body class="grey lighten-2">
    <div class="row">
<!----------------------------------------------------------------------------->
<!--                                NAVBAR                                   -->
      <nav class="col s2 green darken-4 white-text">
        <a href="#" class="brand-logo">Almacen</a>
      </nav>
      <nav class="col s10 green darken-3 white text">

      </nav>
<!----------------------------------------------------------------------------->

<!----------------------------------------------------------------------------->
<!--                             PANEL IZQUIERDO                             -->
<div class="col s2 grey lighten-2">
  <div class="grey lighten-2">
    <ul class="collapsible">
      <li>
        <div class="collapsible-header"><a href="../index.php" class="black-text"><i class="material-icons">home</i>Principal</a></div>
      </li>
      <li>
        <div class="collapsible-header"><a href="../productos/listar.php" class="black-text"><i class="material-icons">content_paste</i>Articulos</a></div>
      </li>
      <li>
        <div class="collapsible-header grey lighten-2"><a href="../compras/compras.php" class="black-text"><i class="material-icons">arrow_forward</i>Meter al almacen</a></div>
      </li>
      <li>
        <div class="collapsible-header"><a href="../ventas/ventas.php" class="black-text"><i class="material-icons">arrow_back</i>Sacar del almacen</a></div>
      </li>
      <li>
        <div class="collapsible-header"><a href="../otros/clientes.php" class="black-text"><i class="material-icons">face</i>Clientes</a></div>
      </li>
      <li>
        <div class="collapsible-header"><a href="../otros/proveedores.php" class="black-text"><i class="material-icons">assignment_ind</i>Proveedores</a></div>
      </li>
      <li>
        <div class="collapsible-header"><a href="../otros/almacenes.php" class="black-text"><i class="material-icons">widgets</i>Almacenes</a></div>
      </li>
    </ul>
  </div>

  <?php include_once('../static/widget.php'); ?>
</div>
<!----------------------------------------------------------------------------->

<!----------------------------------------------------------------------------->
<!--                             PANEL DERECHO                               -->
<div class="col s10 white">
  <div class="">
		<nav class="black">
    <div class="nav-wrapper">
      <div class="col s12">
        <a href="../index.php" class="breadcrumb">Principal</a>
        <a href="compras.php" class="breadcrumb">Compras</a>
				<a href="#!" class="breadcrumb">Comprar</a>
      </div>
    </div>
  </nav>
  </div>



   <div class="card light-blue lighten-5 col s12">
     <div class="card-content">
       <span class="card-title">Codigo del producto</span>
       <form method="post" id="agregarAlCarrito" action="agregarAlCarrito.php">

           <label for="cantidad">Cantidad:</label>
           <input autocomplete="off" autofocus class="white" name="cantidad" required type="text" id="cantidad" placeholder="cantidad">

         <label for="codigo">Código de barras:</label>
         <input autocomplete="off" autofocus class="white" name="codigo" required type="text" id="codigo" placeholder="Escribe el código">

         <input type="submit" name="" value="Agregar a la lista de Compras" class="btn green">
       </form>
     </div>
   </div>



   <br><br>
   <table class="table table-bordered">
     <thead>
       <tr>
         <th>ID</th>
         <th>Código</th>
         <th>Producto</th>
         <th>Descripción</th>
         <th>Precio de compra</th>
         <th>Cantidad</th>
         <th>Total</th>
         <th>Quitar</th>
       </tr>
     </thead>
     <tbody>
       <?php foreach($_SESSION["compras"] as $indice => $producto){
           $granTotal += $producto->total;
         ?>
       <tr>
         <td><?php echo $producto->id ?></td>
         <td><?php echo $producto->codigo ?></td>
         <td><?php echo $producto->nombre ?></td>
         <td><?php echo $producto->descripcion ?></td>
         <td><?php echo $producto->precioCompra ?></td>
         <td><?php echo $producto->cantidad ?></td>
         <td><?php echo $producto->total ?></td>
         <td><a class="btn btn-danger" href="<?php echo "quitarDelCarrito.php?indice=" . $indice?>"><i class="fa fa-trash"></i></a></td>
       </tr>
       <?php } ?>
     </tbody>
   </table>

   <h3>Total: <?php echo $granTotal; ?></h3>



   <form method="POST">
     <div class="card light-blue lighten-5 col s12">
       <div class="card-content">
         <span class="card-title">Proveedor</span>
         <div class="row">
           <div class="col s6">
             <label for="idProveedor"># de Proveedor</label>
             <input id="idProveedor" name="idProveedor" type="text" class="white" required>
           </div>
           <div class="col s6">
             <label for="Proveedor_autocomplete">Proveedor</label>
             <input id="Proveedor_autocomplete" name="Proveedor" type="text" class="white" required>
           </div>
         </div>
       </div>
     </div>

     <div class="card light-blue lighten-5 col s6">
       <div class="card-content">
         <span class="card-title">Moneda de compra</span>
         <div class="row">
           <div class="col s6">
             <label for="moneda">Moneda</label>
             <input id="moneda" name="moneda" type="text" class="white" required>
           </div>
           <div class="col s6">
             <label for="tipoCambio">Tipo de cambio</label>
             <input id="tipoCambio" name="tipoCambio" type="text" class="white" required>
           </div>
         </div>
       </div>
     </div>

     <div class="card light-blue lighten-5 col s6">
       <div class="card-content">
         <span class="card-title">Almacen</span>
         <div class="row">
           <div class="col s12">
             <label for="idAlmacen"># Almacen</label>
             <input id="idAlmacen" name="idAlmacen" type="text" class="white" required>
           </div>
         </div>
       </div>
     </div>

     <input name="total" type="hidden" value="<?php echo $granTotal;?>">
     <button type="submit" name="terminarCompra" id="terminarCompra" class="btn green">Terminar Compra</button>
     <a href="./cancelarCompra.php" class="btn red">Cancelar Compra</a>
   </form>


</div>
<!----------------------------------------------------------------------------->


    </div>

<!--scripts-->
<script src="https://kit.fontawesome.com/7009a8907c.js" crossorigin="anonymous"></script>
<script src="../materialize/js/materialize.min.js"></script>
<script src="../js/scripts.js" charset="utf-8"></script>
<script src="../js/ajax.js" charset="utf-8"></script>
<script src="../js/jquery-ui.min.js" charset="utf-8"></script>


  </body>
</html>
<?php
}else {
    header('location:../../index.php');
}
 ?>
