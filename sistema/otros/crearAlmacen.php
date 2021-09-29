<?php include_once('../php/conexion.php');
$alert='';
session_start();

if (!empty($_SESSION['active'])) {
$Otros->status();

if (isset($_POST['crearAlmacen'])) {
  $Otros->crearAlmacen();
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
        <div class="collapsible-header"><a href="../otros/proveedores.php" class="black-text"><i class="material-icons">assignment_ind</i>Proveedores</a></div>
      </li>
      <li>
        <div class="collapsible-header grey lighten-2"><a href="../otros/almacenes.php" class="black-text"><i class="material-icons">widgets</i>Almacenes</a></div>
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
        <a href="almacenes.php" class="breadcrumb">Almacenes</a>
        <a href="#!" class="breadcrumb">Crear Almacen</a>
      </div>
    </div>
  </nav>
  </div>
 <div>
   <br>

   <div class="col s12 m12">
     <h2 class="header">Crear Almacen</h2>
     <div class="card horizontal">
       <div class="card-image valign-wrapper blue">
         <i class="material-icons large white-text">add_circle</i>
       </div>
       <div class="card-stacked">
         <div class="card-content">
            <table>
              <form class="" method="post">
                <tr>
                  <th>
                    Nombre del Almacen:
                  </th>
                  <td>
                    <div class="input-field">
                      <input id="nombreAlmacen" type="text" name="nombreAlmacen" class="validate">
                      <label for="nombreAlmacen">Nombre del Almacen</label>
                    </div>
                  </td>
                </tr>
                <tr>
                  <th>
                    Descripcion:
                  </th>
                  <td>
                    <div class="input-field">
                      <input id="descripcionAlmacen" type="text" name="descripcionAlmacen" class="validate">
                      <label for="descripcionAlmacen">Descripcion</label>
                    </div>
                  </td>
                </tr>
                <tr>
                  <th>
                    <div class="">
                      <input type="submit" name="crearAlmacen" value="Crear Almacen" class="btn green">
                    </div>
                  </th>
                </tr>
              </form>
            </table>
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
