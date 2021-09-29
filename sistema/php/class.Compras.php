<?php

class Compras{
  private $DBConexion;

  function __construct($Conexion){
    $this->DBConexion=$Conexion;
  }



  //FUNCION PARA MOSTRAR PROVEEDOR
  public function mostrarProvedor(){
    $sentencia = $this->DBConexion->prepare("SELECT * FROM proveedor;");
    $sentencia->execute();
    $proveedor = $sentencia->fetchAll(PDO::FETCH_OBJ);
    foreach($proveedor as $proveedor){ ?>
      <div class="col s3">
        <div class="card-image">
          <img src="<?php echo $proveedor->img ?>">
        </div>
        <div class="card-content">
          <span class="card-title"><?php echo $proveedor->nombre ?></span>
          <p><?php echo $proveedor->razon ?></p>
        </div>
        <div class="card-action">
          <a href="<?php echo "comprar.php?id=" . $proveedor->idProveedor?>">Comprar Producto</a>
        </div>
      </div>
      <?php
    }
  }

  public function status(){
      if(isset($_GET["status"])){
        if($_GET["status"] === "1"){
          ?>
          <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">
          <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>
          <div>
            <a id="delete" onclick="M.toast({html: 'Compra realizada correctamente',classes: 'green darken-1 rounded'})"></a>
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
              <a id="delete" onclick="M.toast({html: 'Se cancelo la entrada de Productos',classes: 'orange rounded'})"></a>
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

  public function terminarCompra(){
    $proveedor    = $_POST['idProveedor'];
    $moneda       = $_POST['moneda'];
    $costoMoneda  = $_POST['tipoCambio'];
    $almacen      = $_POST['idAlmacen'];
    $total        = $_POST["total"];
    $fecha = date("Y-m-d H:i:s");


    $query = ("INSERT INTO compras(fecha, moneda, costoMoneda, total) VALUES (:fecha, :moneda, :costoMoneda, :total);");
    $consulta = $this->DBConexion->prepare($query);
    $consulta->bindParam(':fecha',$fecha);
    $consulta->bindParam(':moneda',$moneda);
    $consulta->bindParam(':costoMoneda',$costoMoneda);
    $consulta->bindParam(':total',$total);
    $consulta->execute();



    $query = ("SELECT id FROM compras ORDER BY id DESC LIMIT 1;");

    $sentencia = $this->DBConexion->prepare($query);
    $sentencia->execute();
    $resultado = $sentencia->fetch(PDO::FETCH_OBJ);

    $idVenta = $resultado === false ? 1 : $resultado->id;

    $query = ("INSERT INTO productos_comprados(id_producto, codigo, producto, cantidad, id_compra) VALUES (?, ?, ?, ?,?);");
    $sentencia = $this->DBConexion->prepare($query);
    $query = ("UPDATE productos SET existencia = existencia + ? WHERE codigo = ? AND almacen = ?;");
    $sentenciaExistencia = $this->DBConexion->prepare($query);
    foreach ($_SESSION["compras"] as $producto) {
      $total += $producto->total;
      $sentencia->execute([$producto->id, $producto->codigo, $producto->nombre, $producto->cantidad, $idVenta]);
      $sentenciaExistencia->execute([$producto->cantidad, $producto->codigo, $producto->almacen]);
    }

    unset($_SESSION["compras"]);
    $_SESSION["compras"] = [];
    header("Location: ../compras/compras.php?status=1");
  }

public function comprasRealizadas(){
  $sentencia = $this->DBConexion->prepare("SELECT
                                  compras.id,
                		              compras.fecha,
                		              compras.moneda,
                		              compras.costoMoneda,
                                  compras.total,
                                  GROUP_CONCAT(
                                    productos.codigo, '..',
                  		              productos.nombre, '..',
                                    productos_comprados.cantidad, '..',
                                    productos.almacen SEPARATOR '__'
                                  ) AS productos
                		              FROM compras INNER JOIN productos_comprados ON productos_comprados.id_compra = compras.id
                                  INNER JOIN productos ON productos.id = productos_comprados.id_Producto GROUP BY compras.id ORDER BY compras.id;");
    $sentencia->execute();
    $compras = $sentencia->fetchAll(PDO::FETCH_OBJ);

    foreach($compras as $compra){?>
      <tr>
        <td><?php echo $compra->id; ?></td>
        <td><?php echo $compra->fecha; ?></td>
        <td><?php echo $compra->moneda; ?></td>
        <td><?php echo $compra->costoMoneda; ?></td>
        <td>
          <table>
            <thead class="grey lighten-3">
              <th>Codigo</th>
              <th>Producto</th>
              <th>Cantidad</th>
              <th>Almacen</th>
            </thead>
            <tbody>
              <?php
                foreach (explode("__", $compra->productos) as $productosConcatenados){
                $producto = explode("..", $productosConcatenados)
              ?>
                <tr>
                  <td><?php echo $producto[0] ?></td>
                  <td><?php echo $producto[1] ?></td>
                  <td><?php echo $producto[2] ?></td>
                  <td><?php echo $producto[3] ?></td>
                </tr>
                <?php } ?>

            </tbody>
          </table>
        </td>
        <td>$<?php echo $compra->total .' '; echo $compra->moneda;?></td>
        <td><a href="<?php echo "../compras/eliminarCompra.php?id=".$compra->id?>" class="btn red"><i class="material-icons">delete</i></a></td>
      </tr>
      <?php
    }

}

public function eliminarCompra(){
  $id = $_GET["id"];
  $query = "DELETE compras,productos_comprados from compras join productos_comprados on compras.id=productos_comprados.id_compra WHERE compras.id=:id";
  $consulta = $this->DBConexion->prepare($query);
  $consulta->bindParam(':id',$id);
  $consulta->execute();

  if ($consulta) {
    header("Location: ../compras/comprasRealizadas.php?status=5");
  }else{
    echo "algo a salido mal";
  }
}



}
  ?>
