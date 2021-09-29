<?php
class DBAlmacen
{
  private $DBConexion;

  function __construct($Conexion)
  {
    $this->DBConexion=$Conexion;
  }

  public function status_producto(){
    if(isset($_GET["status"])){
      if($_GET["status"] === "1"){
        ?>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">
        <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>
        <div>
          <a id="delete" onclick="M.toast({html: 'El producto que intenta eliminar contiene existencias dentro del almacen',classes: 'red darken-1 rounded'})"></a>
          <script type="text/javascript">
            document.getElementById('delete').click();
          </script>
        </div>
        <?php
      }else if($_GET["status"] === "2"){
        ?>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">
        <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>
        <div>
            <a id="delete" onclick="M.toast({html: 'Se ha eliminado el producto del almacen',classes: 'green rounded'})"></a>
            <script type="text/javascript">
              document.getElementById('delete').click();
            </script>
          </div>
        <?php
      }else if($_GET["status"] === "3"){
        ?>
          <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">
          <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>
          <div>
            <a id="delete" onclick="M.toast({html: 'Articulos quitados de la lista',classes: 'blue darken-1 rounded'})"></a>
            <script type="text/javascript">
              document.getElementById('delete').click();
            </script>
          </div>
        <?php
      }else if($_GET["status"] === "4"){
        ?>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">
        <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>
        <div>
          <a id="delete" onclick="M.toast({html: 'El producto no existe dentro del almacen',classes: 'red darken-1 rounded'})"></a>
          <script type="text/javascript">
            document.getElementById('delete').click();
          </script>
        </div>
        <?php
      }else if($_GET["status"] === "5"){
        ?>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">
        <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>
        <div>
          <a id="delete" onclick="M.toast({html: 'Compra eliminada correctamente',classes: 'green darken-1 rounded'})"></a>
          <script type="text/javascript">
            document.getElementById('delete').click();
          </script>
        </div>
        <?php
      }
      else if($_GET["status"] === "6"){
        ?>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">
        <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>
        <div>
          <a id="delete" onclick="M.toast({html: 'Error: Puede que el almacen o Proveedor no exixtan en el sistema',classes: 'red darken-1 rounded'})"></a>
          <script type="text/javascript">
            document.getElementById('delete').click();
          </script>
        </div>
        <?php
      }else{
        ?>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">
        <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>
        <div>
          <a id="delete" onclick="M.toast({html: 'Ocurrio algun error al procesar la peticion',classes: 'red darken-1 rounded'})"></a>
          <script type="text/javascript">
            document.getElementById('delete').click();
          </script>
        </div>
        <?php
      }
    }
  }

  public function productos(){
    $sentencia = $this->DBConexion->prepare("SELECT * FROM productos;");
    $sentencia->execute();
    $productos = $sentencia->fetchAll(PDO::FETCH_OBJ);
    foreach($productos as $producto){?>
      <tr>
        <td><?php echo $producto->codigo ?></td>
        <td><?php echo $producto->nombre ?></td>
        <td><?php echo $producto->descripcion ?></td>
        <td><?php echo $producto->precioCompra ?></td>
        <td><?php echo $producto->precioVenta ?></td>
        <td><?php echo $producto->existencia ?></td>
        <td>Almacen <?php echo $producto->almacen ?></td>
        <td>
          <a class="btn amber" href="<?php echo "../productos/editar.php?id=" . $producto->id?>"><i class="material-icons">edit</i></a>
          <a class="btn red darken-1" href="<?php echo "../productos/eliminar.php?id=" . $producto->id?>"><i class="material-icons">delete</i></a>
        </td>

      </tr>
      <?php
    }
  }

  public function agregar_producto(){
    $codigo       = $_POST['codigo'];
    $nombre       = $_POST['nombre'];
    $descripcion  = $_POST['descripcion'];
    $moneda       = $_POST['id_moneda_CV'];
    $precioVenta  = $_POST['precioVenta'];
    $precioCompra = $_POST['precioCompra'];
    $proveedor   = $_POST['idProveedor'];
    $almacen      = $_POST['almacen'];

    if (!empty($codigo) &&
        !empty($nombre) &&
        !empty($descripcion) &&
        !empty($moneda) &&
        !empty($precioVenta) &&
        !empty($precioCompra) &&
        !empty($almacen) &&
        !empty($proveedor)){

          $query = "SELECT * FROM productos where codigo = :codigo AND nombre = :nombre and almacen = :almacen";
          $consulta = $this->DBConexion->prepare($query);
          $consulta->bindParam(':codigo',$codigo);
          $consulta->bindParam(':nombre',$nombre);
          $consulta->bindParam(':almacen',$almacen);
          $consulta->execute();
          $producto = $consulta->fetch(PDO::FETCH_OBJ);
          if ($producto) {
                  ?>
                  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">
                  <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>
                  <div>
                    <a id="delete" onclick="M.toast({html: 'El producto <?php echo $nombre; ?> ya exixten dentro del almacen <?php  echo $almacen;?>',classes: 'orange darken-1 rounded'})"></a>
                    <script type="text/javascript">
                      document.getElementById('delete').click();
                    </script>
                  </div>
                  <?php
          }else {
            $query = "INSERT INTO productos (codigo, nombre, descripcion, moneda, precioVenta, precioCompra, proveedor, almacen) VALUES (:codigo, :nombre, :descripcion, :moneda, :precioVenta, :precioCompra, :proveedor, :almacen)";
            $consulta = $this->DBConexion->prepare($query);
            $consulta->bindParam(':codigo',$codigo);
            $consulta->bindParam(':nombre',$nombre);
            $consulta->bindParam(':descripcion',$descripcion);
            $consulta->bindParam(':moneda',$moneda);
            $consulta->bindParam(':precioVenta',$precioVenta);
            $consulta->bindParam(':precioCompra',$precioCompra);
            $consulta->bindParam(':proveedor',$proveedor);
            $consulta->bindParam(':almacen',$almacen);
            $consulta->execute();
            if (!$consulta) {
              header("Location: ../productos/listar.php?estatus=6");
            }else {
              header("Location: ../productos/listar.php");
            }
          }


        }else{
      		echo "Los campos estan vacios";
      	}

  }

  public function editar_producto(){
    $id = $_GET["id"];
    $query = "SELECT * FROM productos WHERE id=:id";
    $consulta = $this->DBConexion->prepare($query);
    $consulta->bindParam(':id',$id);
    $consulta->execute();
    $producto = $consulta->fetch(PDO::FETCH_OBJ);

    if ($producto) { ?>
      <div class="col-xs-12">
        <h1><i class="large material-icons">edit</i>Editar Articulo</h1>
        <form method="post" enctype="multipart/form-data">

          <input type="hidden" name="id" value="<?php echo $producto->id; ?>">

          <label for="codigo">Código de barras:</label>
          <input value="<?php echo $producto->codigo; ?>" name="codigo" required type="text" id="codigo" placeholder="Escribe el código" class="validate">

          <label for="clave">Clave</label>
          <input value="<?php echo $producto->nombre; ?>" id="clave" name="clave" type="text" required  placeholder="Clave del producto" class="validate">

          <label for="descripcion">Descripción:</label>
          <textarea required id="descripcion" name="descripcion" cols="30" rows="5" class="validate"><?php echo $producto->descripcion; ?></textarea>

          <label for="moneda">Moneda</label>
          <input id="moneda" name="moneda" type="text" required value="<?php echo $producto->moneda; ?>" placeholder="Moneda de compra y venta" class="validate">

          <label for="precioVenta">Precio de venta:</label>
          <input value="<?php echo $producto->precioVenta; ?>" class="form-control" name="precioVenta" required type="text" id="precioVenta" placeholder="Precio de venta">

          <label for="precioCompra">Precio de compra:</label>
          <input value="<?php echo $producto->precioCompra; ?>" class="form-control" name="precioCompra" required type="text" id="precioCompra" placeholder="Precio de compra">

          <label for="proveedor">Provedor</label>
          <input id="proveedor" name="proveedor" type="text" required value="<?php echo $producto->proveedor; ?>" placeholder="Clave del producto" class="validate">

          <br><br><input id="actualizar" name="actualizar" class="btn green" type="submit" value="Guardar">
          <a class="btn red darken-3" href="./listar.php">Cancelar</a>
        </form>
      </div>
      <?php

    }else{
      echo "¡No existe algún producto con ese ID!";
    }
  }

  public function actualizar_producto(){
    $id           = $_POST['id'];
    $codigo       = $_POST['codigo'];
    $nombre       = $_POST['clave'];
    $descripcion  = $_POST['descripcion'];
    $moneda       = $_POST['moneda'];
    $precioVenta  = $_POST['precioVenta'];
    $precioCompra = $_POST['precioCompra'];
    $proveedor    = $_POST['proveedor'];

    if (!empty($id) &&
        !empty($codigo) &&
        !empty($nombre) &&
        !empty($descripcion) &&
        !empty($moneda) &&
        !empty($precioVenta) &&
        !empty($precioCompra) &&
        !empty($proveedor)){

          $query = "UPDATE productos SET codigo=:codigo,
                                         nombre=:nombre,
                                         descripcion=:descripcion,
                                         moneda=:moneda,
                                         precioVenta=:precioVenta,
                                         precioCompra=:precioCompra,
                                         proveedor=:proveedor WHERE id=:id";
          $consulta = $this->DBConexion->prepare($query);
          $consulta->bindParam(':id',$id);
          $consulta->bindParam(':codigo',$codigo);
          $consulta->bindParam(':nombre',$nombre);
          $consulta->bindParam(':descripcion',$descripcion);
          $consulta->bindParam(':moneda',$moneda);
          $consulta->bindParam(':precioVenta',$precioVenta);
          $consulta->bindParam(':precioCompra',$precioCompra);
          $consulta->bindParam(':proveedor',$proveedor);
          $consulta->execute();

          if ($consulta) { ?>
            <script type="text/javascript">
              window.location="../productos/listar.php";
            </script>
            <?php
          }
        }else{
      		echo "Los campos estan vacios";
      	}

  }

  public function eliminar(){
    $id = $_GET['id'];
    $query = "SELECT * FROM productos WHERE id=:id";
    $consulta = $this->DBConexion->prepare($query);
    $consulta->bindParam(':id',$id);
    $consulta->execute();
    $producto = $consulta->fetch(PDO::FETCH_OBJ);

    if ($producto) {
      ?>
      <table>
        <tr>
          <th>Id:</th>
          <td><?php echo $producto->id; ?></td>
        </tr>
        <tr>
          <th>Codigo Producto:</th>
          <td><?php echo $producto->codigo; ?></td>
        </tr>
        <tr>
          <th>Producto</th>
          <td><?php echo $producto->nombre; ?></td>
        </tr>
        <tr>
          <th>Exixtencias:</th>
          <td><?php echo $producto->existencia; ?></td>
        </tr>
      </table>
      <div class="card-action">
        <a class="btn red" href="<?php echo "../productos/eliminar_producto.php?id=" . $producto->id?>">Eliminar</a>
        <a class="btn green" href="../productos/listar.php">Cancelar</a>
      </div>
      <?php
    }else{
      echo "algo a salido mal";
    }
  }

  public function eliminar_producto(){
    $id = $_GET['id'];
    $query = "SELECT * FROM productos WHERE id=:id";
    $consulta = $this->DBConexion->prepare($query);
    $consulta->bindParam(':id',$id);
    $consulta->execute();
    $producto = $consulta->fetch(PDO::FETCH_OBJ);

      if ($producto) {
        if ($producto->existencia > 0) {
            header("Location: ../productos/listar.php?status=1");
        }else {
          $query = "DELETE FROM productos WHERE id=:id";
          $consulta = $this->DBConexion->prepare($query);
          $consulta->bindParam(':id',$id);
          $consulta->execute();

          header("Location: ../productos/listar.php?status=2");
        }
      }
  }

  public function moneda(){
    $sentencia = $this->DBConexion->prepare("SELECT * FROM moneda_cambio");
    $sentencia->execute();
    $moneda = $sentencia->fetchAll(PDO::FETCH_OBJ);
    foreach($moneda as $moneda){?>
      <td>$<?php echo $moneda->costo ?></td>


      <?php
    }
  }

  public function actualizarDolar(){
    $nuevo_valor       = $_POST['nuevo_valor'];
    if (!empty($nuevo_valor)) {
      $query = "UPDATE moneda_cambio SET costo=:nuevo_valor WHERE id=2";
      $consulta = $this->DBConexion->prepare($query);
      $consulta->execute(array(':nuevo_valor' => $nuevo_valor));
    }else {
      echo "algo a salido mal";
    }
  }

  public function clientes(){
    $sentencia = $this->DBConexion->prepare("SELECT * FROM clientes;");
    $sentencia->execute();
    $clientes = $sentencia->fetchAll(PDO::FETCH_OBJ);
    foreach($clientes as $cliente){?>
      <tr>
        <td><?php echo $cliente->id ?></td>
        <td><?php echo $cliente->nombre ?></td>
        <td><?php echo $cliente->razon ?></td>
        <td><?php echo $cliente->telefono ?></td>
        <td><?php echo $cliente->direccion ?></td>
        <td>
          <a class="btn amber" href="<?php echo "../otros/editarCliente.php?id=" . $cliente->id?>"><i class="material-icons">edit</i></a>
          <a class="btn red darken-1" href="<?php echo "../otros/eliminarCliente.php?id=" . $cliente->id?>"><i class="material-icons">delete</i></a>
        </td>

      </tr>
      <?php
    }
  }
}
