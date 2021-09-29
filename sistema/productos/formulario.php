<?php
	include_once('../php/conexion.php');

	$alert='';
	session_start();

	if (!empty($_SESSION['active'])) {

	if (isset($_POST['agregar'])) {
	  $DBAlmacen->agregar_producto();
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
				<a href="listar.php" class="breadcrumb">Articulos</a>
				<a href="#!" class="breadcrumb">Agregar</a>
			</div>
		</div>
	</nav>
	</div>

	<h1><i class="large material-icons left">add_circle_outline</i>Nuevo producto</h1>
	<form method="post" enctype="multipart/form-data">
		<div class="card light-blue lighten-5 col s12">
			<div class="card-content">
				<div class=" col s6">
					<label for="Proveedor_autocomplete">Nombre del Proveedor:</label>
					<input id="Proveedor_autocomplete" name="Proveedor" type="text">
				</div>
				<div class=" col s6">
					<label for="idProveedor">Proveedor:</label>
					<input id="idProveedor" name="idProveedor" type="text"  placeholder="Provedor que surte" class="validate" >
				</div>
				<div class="">
					<label for="almacen">Almacen:</label>
					<input id="almacen" name="almacen" type="text"  placeholder="Almacen en donde esta" class="validate" >
				</div>
			</div>
		</div>

		<div class="card light-blue lighten-5 col s12">
			<div class="">
				<div class="col s6">
					<label for="moneda_CV">Moneda de Compra y venta:</label>
					<input id="moneda_CV" name="moneda_CV" type="text"  placeholder="Escribe la moneda en que se compra" class="validate" >
				</div>
				<div class="col s6">
					<label for="id_moneda_CV">Codigo de Moneda:</label>
					<input id="id_moneda_CV" name="id_moneda_CV" type="text"  placeholder="Moneda" class="validate" >
				</div>
			</div>
			<div class="">
						<label for="precioVenta">Precio de venta:</label>
						<input id="precioVenta" name="precioVenta" type="text" placeholder="Precio de venta" class="validate">
			</div>
			<div class="">
				<label for="precioCompra">Precio de compra:</label>
				<input id="precioCompra" name="precioCompra" type="text" placeholder="Precio de compra" class="validate">
			</div>
		</div>

		<div class="card light-blue lighten-5 col s12">
			<div class="card-content">
				<div class="">

					<label for="nombre">Codigo del producto:</label>
					<input id="nombre" name="nombre" type="text"  placeholder="Escribe el nombre del producto" class="validate" >
				</div>

				<div class="">
					<label for="descripcion">Descripción:</label>
					<textarea id="descripcion" name="descripcion" cols="30" rows="5" class="validate"></textarea>
				</div>

				<div class="">
					<label for="codigo">Código de barras del producto:</label>
					<input id="codigo" name="codigo" type="text"  placeholder="Escribe el código" class="validate" >
				</div>
			</div>
		</div>

		<br><br><input id="agregar" name="agregar" class="btn green"  type="submit" value="Guardar">
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
    header('location:../index.php');
}
 ?>
