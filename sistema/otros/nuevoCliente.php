<?php
	include_once('../php/conexion.php');

	$alert='';
	session_start();

	if (!empty($_SESSION['active'])) {

	if (isset($_POST['agregarCliente'])) {
	  $Otros->agregarCliente();
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
        <ul id="nav-mobile" class="right hide-on-med-and-down">
          <li><a class="center"><img class="responsive-img circle" src="https://i.pinimg.com/originals/dc/33/84/dc338437cd275d2693d85714ad51b70d.jpg" height="30" width="30"></a></li>
          <li><a href="#"><?php echo "Hola ".$_SESSION['usuario']; ?></a></li>
          <li><a href="../../logout.php" class="white-text"><i class="material-icons">power_settings_new</i></a></li>
        </ul>
      </nav>

<!----------------------------------------------------------------------------->

<!----------------------------------------------------------------------------->
<!--                             PANEL IZQUIERDO                             -->
<div class="col s2 grey lighten-2">
  <div class="grey lighten-2">
		<ul class="collapsible">
      <li>
        <div class="collapsible-header"><a href="../index.php" class="black-text"><i class="material-icons">home</i>Principal</div>
      </li>
      <li>
        <div class="collapsible-header"><a href="../productos/listar.php" class="black-text"><i class="material-icons">content_paste</i>Articulos</a></div>
      </li>
      <li>
        <div class="collapsible-header"><a href="../compras/compras.php" class="black-text"><i class="material-icons">arrow_forward</i>Meter al almacen</a></div>
      </li>
      <li>
        <div class="collapsible-header"><a href="../ventas/ventas.php" class="black-text"><i class="material-icons">arrow_back</i>Sacar del almacen</a></div>
      </li>
      <li>
        <div class="collapsible-header grey lighten-2"><a href="../otros/clientes.php" class="black-text"><i class="material-icons">face</i>Clientes</a></div>
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
				<a href="clientes.php" class="breadcrumb">Clientes</a>
				<a href="#!" class="breadcrumb">Agregar Cliente</a>
			</div>
		</div>
	</nav>
	</div>

	<h1><i class="large material-icons left">group_add</i>Cliente Nuevo</h1>
	<form method="post" enctype="multipart/form-data">
		<div class="card light-blue lighten-5 col s12">
			<div class="card-content">
				<div class=" col s6">
					<label for="nombreCliente">Nombre:</label>
					<input id="nombreCliente" name="nombreCliente" type="text"  placeholder="Nombre del Cliente" class="validate" >
				</div>
				<div class=" col s6">
					<label for="razonCliente">Razón:</label>
					<input id="razonCliente" name="razonCliente" type="text" placeholder="Razon Social del cliente">
				</div>
				<div class="col s6">
					<label for="telefonoCliente">Telefono:</label>
					<input id="telefonoCliente" name="telefonoCliente" type="text"  placeholder="Telefono de Contacto" class="validate" >
				</div>
        <div class="col s6">
					<label for="direccionliente">Direccion:</label>
					<input id="direccionliente" name="direccionliente" type="text"  placeholder="Direccion" class="validate" >
				</div>
			</div>
		</div>

		<br><br><input id="agregarCliente" name="agregarCliente" class="btn green"  type="submit" value="Guardar">
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
