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
  <script src="../js/jquery-1.3.2.min.js"></script>
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
        <a href="./listar.php" class="breadcrumb">Articulos</a>
        <a href="#!" class="breadcrumb">Crear Codigo de Barras</a>
      </div>
    </div>
  </nav>
  </div>

  <div class="row">
    <div class="col s4">
      <div>
        <div class="">
          <p><i class="fas fa-barcode fa-2x grey lighten-3"></i> :Codigo de Barras<input type="text" id="barcodeValue" class="rounded"></p>
        </div>

        <div>
            <div>Tipo:</div>
            <div class="col s6">
              <label>
                <input type="radio" name="btype" id="code11" value="code11" class="with-gap">
                <span>code 11</span>
              </label> <br>
              <label>
                <input type="radio" name="btype" id="code39" value="code39" class="with-gap">
                <span>Code 39</span>
              </label><br>
              <label>
                <input type="radio" name="btype" id="code93" value="code93" class="with-gap">
                <span>Code 93</span>
              </label><br>
              <label>
                <input type="radio" name="btype" id="code128" value="code128" class="with-gap">
                <span>Code 128</span>
              </label><br>
              <label>
                <input type="radio" name="btype" id="codabar" value="codabar" checked class="with-gap">
                <span>Codebar</span>
              </label><br>
            </div>
            <div class="col s6">
              <div class="title">Formato:</div>
              <label>
                <input type="radio" id="canvas" name="renderer" value="canvas" checked class="with-gap">
                <span>Canvas (No sopostado en IE)</span>
              </label>
            </div>
            <div class="col s12">
              <input type="button" onclick="generateBarcode();" value="Generate the barcode" class="btn blue">
            </div>
        </div>
      </div>
    </div>
    <div class="col s8">
      <div class="row">
        <div class="col s12 m6">
          <div class="card blue-grey darken-1">
            <div class="card-content white-text">
              <span class="card-title">Codigo</span>
              <div class="text-center">
                <canvas id="canvasTarget"></canvas>
              </div>
            </div>
            <div class="card-action">
              <a id="descargar" class="btn"><i class="material-icons left">cloud_download</i>Guardar Imagen</a>
            </div>
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
<script src="../materialize/js/materialize.min.js"></script>
<script src="../js/scripts.js" charset="utf-8"></script>
<script src="../js/jquery-barcode.js"></script>
<script src="../js/codigo.js" charset="utf-8"></script>

  </body>
</html>
<?php
}else {
    header('location:../../index.php');
}
 ?>
