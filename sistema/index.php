<?php
include_once('php/conexion.php');

$alert='';
session_start();
if (!empty($_SESSION['active'])) {

  if (isset($_POST['actualizarDolar'])) {
    $DBAlmacen->actualizarDolar();
  }


 ?>


<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Almacen INGE-TEL</title>
  </head>
  <link rel="stylesheet" href="materialize/css/materialize.min.css">
  <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
  <link rel="stylesheet" href="css/style.css">
  <script src="materialize/jquery.min.js"></script>
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
          <li><a href="../logout.php" class="white-text"><i class="material-icons">power_settings_new</i></a></li>
        </ul>
      </nav>
<!----------------------------------------------------------------------------->

<!----------------------------------------------------------------------------->
<!--                             PANEL IZQUIERDO                             -->
<div class="col s2 grey lighten-2">
  <div class="grey lighten-2">
    <ul class="collapsible">
      <li>
        <div class="collapsible-header grey lighten-2"><i class="material-icons">home</i>Principal</div>
      </li>
      <li>
        <div class="collapsible-header"><a href="productos/listar.php" class="black-text"><i class="material-icons">content_paste</i>Articulos</a></div>
      </li>
      <li>
        <div class="collapsible-header"><a href="compras/compras.php" class="black-text"><i class="material-icons">arrow_forward</i>Meter al almacen</a></div>
      </li>
      <li>
        <div class="collapsible-header"><a href="ventas/ventas.php" class="black-text"><i class="material-icons">arrow_back</i>Sacar del almacen</a></div>
      </li>
      <li>
        <div class="collapsible-header"><a href="otros/clientes.php" class="black-text"><i class="material-icons">face</i>Clientes</a></div>
      </li>
      <li>
        <div class="collapsible-header"><a href="otros/proveedores.php" class="black-text"><i class="material-icons">assignment_ind</i>Proveedores</a></div>
      </li>
      <li>
        <div class="collapsible-header"><a href="otros/almacenes.php" class="black-text"><i class="material-icons">widgets</i>Almacenes</a></div>
      </li>
    </ul>
  </div>

  <?php include_once('static/widget.php'); ?>
</div>
<!----------------------------------------------------------------------------->

<!----------------------------------------------------------------------------->
<!--                             PANEL DERECHO                               -->
<div class="col s10 white">
  <div class="">
    <blockquote>
      <h3>Bienvenido...</h3>
    </blockquote>
  </div>

  <div class="">
    <div class="col s12 m6">
      <div class="card">
        <div class="card-action">
          <a href="#" class="blue-text">PRECIO DEL DOLAR<i class="material-icons right">navigate_next</i></a>
        </div>
        <div class="card-content blue">
          <div class="row">
            <div class="col s6">
              <div class="valign-wrapper">
                <table class="white">
                  <thead>
                    <tr>
                      <th>USD</th>
                      <th>MXN</th>
                    </tr>

                  </thead>
                  <tbody>
                    <tr>
                        <?php  $DBAlmacen->moneda();  ?>
                    </tr>
                  </tbody>
                </table>
              </div>
            </div>
            <div class="col s6">
              <form method="post">
                <div class="">
                  <input type="text" id="nuevo_valor" name="nuevo_valor" class="white" placeholder="Actualizar Dolar del Sistema">
                  <input type="submit" id="actualizarDolar" name="actualizarDolar" value="Actualizar" class="btn amber black-text">
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>

    <div class="col s12 m6">
      <div class="card">
        <div class="card-content green">
          <div class="row">
            <div class="col s5">
              <div class="valign-wrapper">
                <h5 class="white-text"><i class="large material-icons">content_paste</i></h5>
              </div>
            </div>

            <div class="col s7">
              <h3 class="right-align white-text">Articulos del Almacen</h3>
            </div>
          </div>
        </div>
        <div class="card-action">
          <a href="productos/listar.php" class="green-text">Ver Detalles<i class="material-icons right">navigate_next</i></a>
        </div>
      </div>
    </div>

    <div class="col s12 m6">
      <div class="card">
        <div class="card-content amber">
          <div class="row">
            <div class="col s5">
              <div class="valign-wrapper">
                <h5 class="white-text"><i class="large material-icons">arrow_forward</i></h5>
              </div>
            </div>

            <div class="col s7">
              <h3 class="right-align white-text">Agregar al Almacen</h3>
            </div>
          </div>
        </div>
        <div class="card-action">
          <a href="compras/compras.php" class="aber-text">Ver Detalles<i class="material-icons right">navigate_next</i></a>
        </div>
      </div>
    </div>

    <div class="col s12 m6">
      <div class="card">
        <div class="card-content red darken-1">
          <div class="row">
            <div class="col s5">
              <div class="valign-wrapper">
                <h5 class="white-text"><i class="large material-icons">arrow_back</i></h5>
              </div>
            </div>

            <div class="col s7">
              <h3 class="right-align white-text">Sacar del Almacen</h3>
            </div>
          </div>
        </div>
        <div class="card-action">
          <a href="ventas/ventas.php" class="red-text">Ver Detalles<i class="material-icons right">navigate_next</i></a>
        </div>
      </div>
    </div>

  </div>
</div>
<!----------------------------------------------------------------------------->


    </div>

<!--scripts-->
<script src="materialize/js/materialize.min.js"></script>
<script src="js/scripts.js" charset="utf-8"></script>
  </body>
</html>
<?php
}else {
    header('location:../index.php');
}
 ?>
