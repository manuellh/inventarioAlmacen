<?php include_once "../php/conexion.php";

$alert='';
session_start();

if (!empty($_SESSION['active'])) {


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
				<a href="#!" class="breadcrumb">Eliminar Articulo</a>
      </div>
    </div>
  </nav>
  </div>

	<div>
		<div class="col s12 m12">
	    <h2 class="header">¿Está seguro de eliminar este producto del almacen?</h2>
	    <div class="card horizontal">
	      <div class="card-image valign-wrapper red">
	        <i class="material-icons large white-text">delete</i>
	      </div>
	      <div class="card-stacked">
	        <div class="card-content">
						<?php
						if (isset($_GET['id'])) {
								$DBAlmacen->eliminar();
							} ?>

	        </div>
	      </div>
	    </div>
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
