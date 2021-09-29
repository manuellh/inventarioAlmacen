<?php include_once('login.php'); ?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Almacen INGE-TEL</title>
  </head>
  <link rel="stylesheet" href="sistema/materialize/css/materialize.min.css">
  <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
  <link rel="stylesheet" href="sistema/css/style.css">
  <script src="sistema/materialize/jquery.min.js"></script>
  <body>
    <nav class="indigo darken-4">
      <div class="nav-wrapper">
        <img src="" alt="">
        <a href="#!" class="brand-logo">Logo</a>
        <a href="#" data-target="mobile-demo" class="sidenav-trigger"><i class="material-icons">menu</i></a>
        <ul class="right">
          <li><a href="#">Inicio</a></li>
          <li><a href="#">Articulos</a></li>
          <li><a class="dropdown-trigger" href="#!" data-target="dropdown1">Iniciar Sesión<i class="material-icons right">arrow_drop_down</i></a></li>
        </ul>
      </div>
    </nav>

    <ul class="sidenav" id="mobile-demo">
      <li><a href="sass.html">Sass</a></li>
      <li><a href="badges.html">Components</a></li>
      <li><a href="collapsible.html">Javascript</a></li>
      <li><a href="mobile.html">Mobile</a></li>
    </ul>

<!-- Dropdown Structure -->
<ul id="dropdown1" class="dropdown-content grey lighten-3">
  <li><a class="modal-trigger black-text" href="#modal1"><i class="material-icons left">account_circle</i>Iniciar Sesión</a></li>
</ul>

<!-- Modal Structure -->
<div id="modal1" class="modal">
  <span><h4 class="black-text center">Iniciar Sesión</h4></span>
  <div class="row">
    <div class="col s10 offset-s1">
      <form method="post">
        <div class="input-field">
          <i class="material-icons prefix">mail</i>
          <label for="correo">Correo</label>
          <input id="correo" type="text" name="username" class="validate">
        </div>
        <div class="input-field">
          <i class="material-icons prefix">vpn_key</i>
          <label for="password">Contraseña</label>
          <input id="password" type="password" name="password" class="validate">
        </div>
        <div class="card-action">
          <input type="submit" name="Entrar" value="Entrar" class="btn green" style="width: 100%;">
        </div>
      </form>
    </div>
  </div>
</div>

<div class="row">
  <!----------------------------------------------------------------->
  <!--                         PANEL IZQUIERDO                     -->
  <div class="row">
    <nav class="grey lighten-4">
      <ul>
        <div class="col s2">
            <li><a class="blue-text"><i class="material-icons left">settings_input_component</i> Fibra</a></li>
        </div>
        <div class="col s2">
            <li class="center"><a class="blue-text"><i class="fas fa-network-wired fa-lg"></i> Cableado</a></li>
        </div>
        <div class="col s2">
            <li><a class="blue-text"><i class="fas fa-bolt fa-lg"></i> Energia</a></li>
        </div>
        <div class="col s2">
            <li><a class="blue-text"><i class="fas fa-stream fa-lg"></i> Tuberia</a></li>
        </div>
        <div class="col s2">
            <li><a class="blue-text"><i class="fas fa-video fa-lg"></i> Seguridad</a></li>
        </div>
        <div class="col s2">
            <li><a class="blue-text"><i class="fas fa-stop fa-lg"></i> Otros</a></li>
        </div>
      </ul>
    </nav>

  </div>
  <div class="col s12">
    <div class="parallax-container">
        <div class="carousel carousel-slider center">
          <div class="carousel-item" href="#one!">
            <div class="card">
              <div class="card-image">
                <img src="https://i.pinimg.com/originals/83/ff/f1/83fff1edeca40a38be08b39dd30c7f1c.png" class="responsive-img">
                <span class="card-title"><strong>Fibra Óptica</strong></span>
              </div>

            </div>


            <div class="carousel-fixed-item center">
              <a class="btn waves-effect white grey-text darken-text-2">button</a>
            </div>
          </div>
          <div class="carousel-item"  href="#two!">
            <img src="https://lorempixel.com/800/400/food/2">
            <div class="carousel-fixed-item center">
              <a class="btn waves-effect white grey-text darken-text-2">button</a>
            </div>
          </div>
          <div class="carousel-item"  href="#three!">
            <img src="https://i.pinimg.com/originals/83/ff/f1/83fff1edeca40a38be08b39dd30c7f1c.png" class="responsive-img">
            <div class="carousel-fixed-item center">
              <a class="btn waves-effect white grey-text darken-text-2">button</a>
            </div>
          </div>
        </div>
    </div>


    <div class="collection">
      <a href="#!" class="collection-item">Alvin</a>
      <a href="#!" class="collection-item active">Alvin</a>
      <a href="#!" class="collection-item">Alvin</a>
      <a href="#!" class="collection-item">Alvin</a>
    </div>

    <div class="parallax-container">
        <div class="parallax"><img src="https://i.pinimg.com/originals/12/8d/df/128ddf3a0d2473a43a02edbc83b95f85.jpg"></div>
    </div>

  </div>


  <!----------------------------------------------------------------->
</div>


<!--scripts-->
<script src="sistema/materialize/js/materialize.min.js"></script>
<script src="sistema/js/scripts.js" charset="utf-8"></script>
<script src="https://kit.fontawesome.com/7009a8907c.js" crossorigin="anonymous"></script>
  </body>
</html>
