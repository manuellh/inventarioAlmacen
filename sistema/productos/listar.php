<?php include_once "../php/conexion.php";

$alert='';
session_start();

if (!empty($_SESSION['active'])) {
$DBAlmacen->status_producto();

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
        <div class="collapsible-header grey lighten-2"><a href="../productos/listar.php" class="black-text"><i class="material-icons">content_paste</i>Articulos</a></div>
      </li>
      <li>
        <div class="collapsible-header"><a href="../compras/compras.php" class="black-text"><i class="material-icons">arrow_forward</i>Meter al almacen</a></div>
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
        <a href="#!" class="breadcrumb">Articulos</a>
      </div>
    </div>
  </nav>
  </div>
	<div>
		<h1><i class="large material-icons left">content_paste</i>Articulos</h1>
    <div class="card">
      <div class="col s2">
        <div class="card center">
          <div class="card-content light-blue darken-1">
              <a href="./formulario.php" class="white-text"><i class="medium material-icons">add</i></a>
              <p class="white-text">Nuevo Articulo</p>
            </div>
        </div>
      </div>
      <div class="col s2">
        <div class="card center">
          <div class="card-content purple darken-4">
              <a href="./crear.php" class="white-text"><i class="fas fa-barcode fa-4x"></i></a>
              <p class="white-text">Crear Codigo</p>
            </div>
        </div>
      </div>
      <div class="col s2">
        <div class="card center">
          <div class="card-content green">
              <a href="../compras/compras.php" class="white-text"><i class="material-icons medium">arrow_forward</i></a>
              <p class="white-text">Agregar</p>
            </div>
        </div>
      </div>

      <div class="col s2">
        <div class="card center">
          <div class="card-content amber">
              <a href="../ventas/ventas.php" class="white-text"><i class="material-icons medium">arrow_back</i></a>
              <p class="white-text">Sacar</p>
            </div>
        </div>
      </div>
    </div>

		<br>
    <div class="col s6 offset-s6">
      <nav class=" col s11 grey lighten-3">
        <div class="nav-wrapper">
          <div>
              <div class="input-field">
                <i class="material-icons prefix black-text">search</i>
                <input id="search" type="text">
                <label for="search">Buscar producto</label>
              </div>
          </div>
        </div>
      </nav>
    </div>
		<table class="table table-bordered" id="myTable">
			<thead class="grey darken-4 white-text">
				<tr>
          <th class="center"><i class="fas fa-barcode fa-2x"></i></th>
					<th>Producto</th>
					<th>Descripción</th>
					<th>Precio de compra</th>
					<th>Precio de venta</th>
					<th>Existencia</th>
          <th>Almacen</th>
					<th></th>
				</tr>
			</thead>
			<tbody id="tabla_productos">
				<?php $DBAlmacen->productos();?>
			</tbody>
		</table>
    <div class="col-md-12 center text-center">
	    <span class="left" id="total_reg"></span>
            <ul class="pagination pager" id="myPager"></ul>
    </div>
	</div>


</div>
<!----------------------------------------------------------------------------->


    </div>

<!--scripts-->
<script src="https://kit.fontawesome.com/7009a8907c.js" crossorigin="anonymous"></script>
<script type="text/javascript" src="https://code.jquery.com/jquery-2.2.1.min.js"></script>
<script type="text/javascript" src="https://cdn.rawgit.com/pinzon1992/materialize_table_pagination/f9a8478f/js/pagination.js"></script>
<script src="../materialize/js/materialize.min.js"></script>
<script src="../js/scripts.js" charset="utf-8"></script>
  </body>
</html>
<?php
}else {
    header('location:../../index.php');
}
 ?>
