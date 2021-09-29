<?php include_once('../php/conexion.php');
$alert='';
session_start();

if (!empty($_SESSION['active'])) {
$Otros->status();

if (isset($_POST['altaProveedor'])) {
  $Otros->registrarProveedor();
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
        <div class="collapsible-header"><a href="../otros/clientes.php" class="black-text"><i class="material-icons">face</i>Clientes</a></div>
      </li>
      <li>
        <div class="collapsible-header grey lighten-2"><a href="../otros/proveedores.php" class="black-text"><i class="material-icons">assignment_ind</i>Proveedores</a></div>
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
        <a href="proveedores.php" class="breadcrumb">Proveedores</a>
        <a href="#!" class="breadcrumb">Alta de Proveedores</a>
      </div>
    </div>
  </nav>
  </div>
	<div>
    <div class="card">
      <div class="card-comtainer">
        <div class="col s12">
          <h1><i class="large material-icons left">assignment_ind</i>Alta Proveedores</h1>
        </div>

      </div>
    </div>
		<br>
	</div>
  <div class="">
    <form method="post">
      <table>
        <tr>
          <th class="blue lighten-5">Nombre del Proveedor:</th>
          <td>
            <div class="input-field">
              <i class="material-icons prefix">account_circle</i>
              <input id="nombreProveedor" name="nombreProveedor" type="text" class="validate">
              <label for="nombreProveedor">Cliente</label>
            </div>
          </td>
        </tr>

        <tr>
          <th class="blue lighten-5">Razón Social:</th>
          <td>
            <div class="input-field">
              <i class="material-icons prefix">people</i>
              <input id="razonProveedor" name="razonProveedor" type="text" class="validate">
              <label for="razonProveedor">Razón Social</label>
            </div>
          </td>
        </tr>

        <tr>
          <th class="blue lighten-5">RFC:</th>
          <td>
            <div class="input-field">
              <i class="material-icons prefix">business</i>
              <input id="rfcProveedor" name="rfcProveedor" type="text" class="validate">
              <label for="rfcProveedor">RFC</label>
            </div>
          </td>
        </tr>

        <tr>
          <th class="blue lighten-5">Direccion:</th>
          <td>
            <div class="input-field">
              <i class="material-icons prefix">location_on</i>
              <input id="direccionProveedor" name="direccionProveedor" type="text" class="validate">
              <label for="direccionProveedor">Direccion</label>
            </div>
          </td>
        </tr>

        <tr>
          <th class="blue lighten-5">Contacto:</th>
          <td>
            <div class="input-field">
              <i class="material-icons prefix">phone</i>
              <input id="contactoProveedor" name="contactoProveedor" type="text" class="validate">
              <label for="contactoProveedor">Contacto</label>
            </div>
          </td>
        </tr>

        <tr>
          <th class="blue lighten-5">Moneda que maneja:</th>
          <td>
            <div class="input-field">
              <div class="col s6">
                <i class="material-icons prefix">attach_money</i>
                <input id="moneda_CV" name="moneda_CV" type="text" class="validate">
                <label for="moneda_CV">Moneda que maneja</label>
              </div>
              <div class="col s6">
                <input id="id_moneda_CV" name="id_moneda_CV" type="text" class="validate">
                <label for="id_moneda_CV">Moneda</label>
              </div>
            </div>
          </td>
        </tr>

        <tr>
          <th class="blue lighten-5">Logo:</th>
          <td>
            <div class="input-field">
              <i class="material-icons prefix">insert_photo</i>
              <input id="imgProveedor" name="imgProveedor" type="text" class="validate">
              <label for="imgProveedor">URL de la imagen</label>
            </div>
          </td>
        </tr>
        <tr>
          <th></th>
          <td>
            <div class="">
              <input type="submit" name="altaProveedor" value="Registrar Proveedor" class="btn green">
              <a href="proveedores.php" class="btn red">Cancelar Registro</a>
            </div>
          </td>
        </tr>
      </table>
    </form>
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
<script src="../js/ajax.js" charset="utf-8"></script>
<script src="../js/jquery-ui.min.js" charset="utf-8"></script>
  </body>
</html>
<?php
}else {
    header('location:../../index.php');
}
 ?>
