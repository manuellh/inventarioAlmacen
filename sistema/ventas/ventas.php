<?php include_once('../php/conexion.php');
$alert='';
session_start();

if (!empty($_SESSION['active'])) {
  if(!isset($_SESSION["compras"])) $_SESSION["compras"] = [];
  $granTotal = 0;
  $Ventas->status();
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
        <div class="collapsible-header"><a href="../productos/listar.php" class="black-text"><i class="material-icons">content_paste</i>Articulos</a></div>
      </li>
      <li>
        <div class="collapsible-header"><a href="../compras/compras.php" class="black-text"><i class="material-icons">arrow_forward</i>Meter al almacen</a></div>
      </li>
      <li>
        <div class="collapsible-header grey lighten-2"><a href="../ventas/ventas.php" class="black-text"><i class="material-icons">arrow_back</i>Sacar del almacen</a></div>
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
        <a href="#!" class="breadcrumb">Ventas</a>
      </div>
    </div>
  </nav>
  </div>

  <div class="row">
    <div class="col s12 m6">
      <div class="card">
        <div class="card-content purple">
          <div class="row">
            <div class="col s5">
              <div class="valign-wrapper">
                <h5 class="white-text"><i class="large material-icons">arrow_back</i></h5>
              </div>
            </div>

            <div class="col s7">
              <h3 class="right-align white-text">Sacar Articulos del Almacen</h3>
            </div>
          </div>
        </div>
        <div class="card-action">
          <a href="vender.php" class="purple-text">Sacar Articulos del Almacen<i class="material-icons right">navigate_next</i></a>
        </div>
      </div>
    </div>

    <div class="col s12 m6">
      <div class="card">
        <div class="card-content red darken-1">
          <div class="row">
            <div class="col s5">
              <div class="valign-wrapper">
                <h5 class="white-text"><i class="large material-icons">chrome_reader_mode</i></h5>
              </div>
            </div>

            <div class="col s7">
              <h3 class="right-align white-text">Articulos Vendidos Recientemente</h3>
            </div>
          </div>
        </div>
        <div class="card-action">
          <a href="ventasRealizadas.php" class="aber-text">Ver Detalles<i class="material-icons right">navigate_next</i></a>
        </div>
      </div>
    </div>

  </div>

</div>
<!----------------------------------------------------------------------------->


    </div>

<!--scripts-->
<script src="https://kit.fontawesome.com/7009a8907c.js" crossorigin="anonymous"></script>
<script src="../materialize/js/materialize.min.js"></script>
<script src="../js/scripts.js" charset="utf-8"></script>
  </body>
</html>
<?php
}else {
    header('location:../../index.php');
}
 ?>
