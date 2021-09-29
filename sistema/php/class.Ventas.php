<?php
class Ventas{
  private $DBConexion;

  function __construct($Conexion){
    $this->DBConexion=$Conexion;
  }

  public function status(){
    if(isset($_GET["status"])) {
      if($_GET["status"] === "1") {
        ?>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">
        <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>
        <div>
          <a id="delete" onclick="M.toast({html: 'El Producto no exixte dentro del Almacen',classes: 'red  darken-1 rounded'})"></a>
          <script type="text/javascript">
            document.getElementById('delete').click();
          </script>
        </div>
        <?php
      }else if ($_GET["status"] === "2") {
        ?>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">
        <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>
        <div>
          <a id="delete" onclick="M.toast({html: 'El Producto esta Agotado',classes: 'amber rounded'})"></a>
          <script type="text/javascript">
            document.getElementById('delete').click();
          </script>
        </div>
        <?php
      }else if ($_GET["status"] === "3") {
        ?>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">
        <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>
        <div>
          <a id="delete" onclick="M.toast({html: 'Producto quitado de la lista',classes: 'blue rounded'})"></a>
          <script type="text/javascript">
            document.getElementById('delete').click();
          </script>
        </div>
        <?php
      }else if ($_GET["status"] === "4") {
        ?>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">
        <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>
        <div>
          <a id="delete" onclick="M.toast({html: 'La cantidad que intenta vender excede a la exixtente en el almacen',classes: 'red rounded'})"></a>
          <script type="text/javascript">
            document.getElementById('delete').click();
          </script>
        </div>
        <?php
      }else if ($_GET["status"] === "5") {
        ?>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">
        <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>
        <div>
          <a id="delete" onclick="M.toast({html: 'Se cancelo la venta de articulos',classes: 'purple rounded'})"></a>
          <script type="text/javascript">
            document.getElementById('delete').click();
          </script>
        </div>
        <?php
      }else if ($_GET["status"] === "6") {
        ?>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">
        <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>
        <div>
          <a id="delete" onclick="M.toast({html: 'Se completo la venta de articulos',classes: 'green rounded'})"></a>
          <script type="text/javascript">
            document.getElementById('delete').click();
          </script>
        </div>
        <?php
      }else if ($_GET["status"] === "404") {
        ?>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">
        <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>
        <div>
          <a id="delete" onclick="M.toast({html: 'error',classes: 'red rounded'})"></a>
          <script type="text/javascript">
            document.getElementById('delete').click();
          </script>
        </div>
        <?php
      }
    }
  }

  public function agregarCliente(){
    $nombre   = $_POST['nombreCliente'];
    $razon    = $_POST['razonCliente'];
    $telefono = $_POST['telefonoCliente'];
    $direccion  = $_POST['direccionliente'];

    if (!empty($nombre) &&
        !empty($razon) &&
        !empty($telefono) &&
        !empty($direccion))
        {

          $query=('INSERT INTO clientes(nombre,razon,telefono,direccion)VALUES(:nombre,:razon,:telefono,:direccion);');
          $consulta = $this->DBConexion->prepare($query);
          $consulta->bindParam(':nombre',$nombre);
          $consulta->bindParam(':razon',$razon);
          $consulta->bindParam(':telefono',$telefono);
          $consulta->bindParam(':direccion',$direccion);
          $consulta->execute();

          if ($consulta) {
            header("Location: ../otros/clientes.php?status=1");
          }
    }else {
      ?>
      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">
      <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>
      <div>
        <a id="delete" onclick="M.toast({html: 'Los campos estan Vacios',classes: 'red darken-1 rounded'})"></a>
        <script type="text/javascript">
          document.getElementById('delete').click();
        </script>
      </div>
      <?php
    }
  }

  public function mostrarCliente(){
    $id=$_GET['id'];
    $query=('SELECT * FROM clientes WHERE id=:id');
    $consulta = $this->DBConexion->prepare($query);
    $consulta->bindParam(':id',$id);
    $consulta->execute();
    $cliente = $consulta->fetch(PDO::FETCH_OBJ);
    if ($cliente) {
      ?>
      <div class="">
        <div class="">
          <input type="hidden" name="idClienteEdit" value="<?php echo $cliente->id; ?>">
        </div>
        <div class="">
          <label for="nombreClienteEdit">Cliente</label>
          <input id="nombreClienteEdit" type="text" name="nombreClienteEdit" value="<?php echo $cliente->nombre; ?>" class="vlidate white">
        </div>
        <div class="">
          <label for="razonClienteEdit">Razon Social:</label>
          <textarea id="razonClienteEdit"  name="razonClienteEdit" rows="8" cols="80" class="vlidate white"><?php echo $cliente->razon; ?></textarea>
        </div>
        <div class="">
          <label for="telefonoClienteEdit">Contacto:</label>
          <input id="telefonoClienteEdit" type="text" name="telefonoClienteEdit" value="<?php echo $cliente->telefono; ?>" class="vlidate white">
        </div>
        <div class="">
          <label for="direccionClienteEdit">Direccion:</label>
          <input id="direccionClienteEdit" type="text" name="direccionClienteEdit" value="<?php echo $cliente->direccion; ?>" class="vlidate white">
        </div>
      </div>
      <?php
    }else {
      echo "Este Usuario no se encuentra Registrado.";
    }
  }

  public function actualizarCliente(){
    $id         =$_POST['idClienteEdit'];
    $nombre     =$_POST['nombreClienteEdit'];
    $razon      =$_POST['razonClienteEdit'];
    $telefono   =$_POST['telefonoClienteEdit'];
    $direccion  =$_POST['direccionClienteEdit'];

    if (!empty($id) &&
        !empty($nombre) &&
        !empty($razon) &&
        !empty($telefono) &&
        !empty($direccion)) {
      $query=("UPDATE clientes SET nombre = :nombre,
                                   razon = :razon,
                                   telefono = :telefono,
                                   direccion = :direccion WHERE id=:id");
        $consulta = $this->DBConexion->prepare($query);
        $consulta->bindParam(':id',$id);
        $consulta->bindParam(':nombre',$nombre);
        $consulta->bindParam(':razon',$razon);
        $consulta->bindParam(':telefono',$telefono);
        $consulta->bindParam(':direccion',$direccion);
        $consulta->execute();

        if ($consulta) {
          header("Location: ../otros/clientes.php?status=2");
        }else{
          echo "Los campos estan vacios";
        }
    }
  }

  public function terminarVenta(){
    $cliente    = $_POST['idCliente'];
    $moneda       = $_POST['moneda'];
    $costoMoneda  = $_POST['tipoCambio'];
    $almacen      = $_POST['idAlmacen'];
    $total        = $_POST["total"];
    $fecha = date("Y-m-d H:i:s");


    $query = ("INSERT INTO ventas(fecha, moneda, costoMoneda, total) VALUES (:fecha, :moneda, :costoMoneda, :total);");
    $consulta = $this->DBConexion->prepare($query);
    $consulta->bindParam(':fecha',$fecha);
    $consulta->bindParam(':moneda',$moneda);
    $consulta->bindParam(':costoMoneda',$costoMoneda);
    $consulta->bindParam(':total',$total);
    $consulta->execute();



    $query = ("SELECT id FROM ventas ORDER BY id DESC LIMIT 1;");

    $sentencia = $this->DBConexion->prepare($query);
    $sentencia->execute();
    $resultado = $sentencia->fetch(PDO::FETCH_OBJ);

    $idVenta = $resultado === false ? 1 : $resultado->id;

    $query = ("INSERT INTO productos_vendidos(id_producto, codigo, producto, cantidad,id_cliente, id_venta) VALUES (?, ?, ?, ?, ?, ?);");
    $sentencia = $this->DBConexion->prepare($query);
    $query = ("UPDATE productos SET existencia = existencia - ? WHERE codigo = ? AND almacen = ?;");
    $sentenciaExistencia = $this->DBConexion->prepare($query);
    foreach ($_SESSION["ventas"] as $producto) {
      $total += $producto->total;
      $sentencia->execute([$producto->id, $producto->codigo, $producto->nombre, $producto->cantidad,$cliente, $idVenta]);
      $sentenciaExistencia->execute([$producto->cantidad, $producto->codigo, $producto->almacen]);
    }

    unset($_SESSION["ventas"]);
    $_SESSION["ventas"] = [];
    header("Location: ../ventas/ventas.php?status=6");
  }

  public function ventasRealizadas(){
    $sentencia = $this->DBConexion->prepare("SELECT
                                    ventas.id,
                  		              ventas.fecha,
                  		              ventas.moneda,
                  		              ventas.costoMoneda,
                                    ventas.total,
                                    GROUP_CONCAT(
                                      productos.codigo, '..',
                    		              productos.nombre, '..',
                                      productos_vendidos.cantidad, '..',
                                      productos_vendidos.id_cliente, '..',
                                      clientes.nombre SEPARATOR '__'
                                    ) AS productos
                  		              FROM ventas INNER JOIN productos_vendidos ON productos_vendidos.id_venta = ventas.id
                                                INNER JOIN productos ON productos.id = productos_vendidos.id_producto
                                                INNER JOIN clientes on productos_vendidos.id_cliente = clientes.id GROUP BY ventas.id ORDER BY ventas.id;");
      $sentencia->execute();
      $ventas = $sentencia->fetchAll(PDO::FETCH_OBJ);

      foreach($ventas as $venta){?>
        <tr>
          <td><?php echo $venta->id; ?></td>
          <td><?php echo $venta->fecha; ?></td>
          <td><?php echo $venta->moneda; ?></td>
          <td><?php echo $venta->costoMoneda; ?></td>
          <td>
            <table>
              <thead class="grey lighten-3">
                <th>Codigo</th>
                <th>Producto</th>
                <th>Cantidad</th>
                <th># cliente</th>
                <th>cliente</th>
              </thead>
              <tbody>
                <?php
                  foreach (explode("__", $venta->productos) as $productosConcatenados){
                  $producto = explode("..", $productosConcatenados)
                ?>
                  <tr>
                    <td><?php echo $producto[0] ?></td>
                    <td><?php echo $producto[1] ?></td>
                    <td><?php echo $producto[2] ?></td>
                    <td><?php echo $producto[3] ?></td>
                    <td><?php echo $producto[4] ?></td>
                  </tr>
                  <?php } ?>

              </tbody>
            </table>
          </td>
          <td>$<?php echo $venta->total .' '; echo $venta->moneda;?></td>
          <td><a href="<?php echo "../ventas/eliminarVenta.php?id=".$venta->id?>" class="btn red"><i class="material-icons">delete</i></a></td>
        </tr>
        <?php
      }

  }

  public function eliminarVenta(){
    $id = $_GET["id"];
    $query = "DELETE ventas,productos_Vendidos from Ventas join productos_vendidos on ventas.id=productos_vendidos.id_venta WHERE ventas.id=:id";
    $consulta = $this->DBConexion->prepare($query);
    $consulta->bindParam(':id',$id);
    $consulta->execute();

    if ($consulta) {
      header("Location: ../ventas/ventasRealizadas.php");
    }else{
      echo "algo a salido mal";
    }
  }

}
 ?>
