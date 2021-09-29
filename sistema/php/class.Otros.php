<?php
class Otros{
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
          <a id="delete" onclick="M.toast({html: 'Registro Correcto',classes: 'green darken-1 rounded'})"></a>
          <script type="text/javascript">
            document.getElementById('delete').click();
          </script>
        </div>
        <?php
      }
      else if ($_GET["status"] === "2") {
        ?>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">
        <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>
        <div>
          <a id="delete" onclick="M.toast({html: 'Actualizacion correcta',classes: 'amber rounded'})"></a>
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
          <a id="delete" onclick="M.toast({html: 'Se elimino correctamente',classes: 'blue rounded'})"></a>
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

  public function eliminar(){
    $id = $_GET['id'];
    $query = "SELECT * FROM clientes WHERE id=:id";
    $consulta = $this->DBConexion->prepare($query);
    $consulta->bindParam(':id',$id);
    $consulta->execute();
    $cliente = $consulta->fetch(PDO::FETCH_OBJ);

    if ($cliente) {
      ?>
      <table>
        <tr>
          <th>Id:</th>
          <td><?php echo $cliente->id; ?></td>
        </tr>
        <tr>
          <th>Nombre del Cliente:</th>
          <td><?php echo $cliente->nombre; ?></td>
        </tr>
        <tr>
          <th>Razon:</th>
          <td><?php echo $cliente->razon; ?></td>
        </tr>
        <tr>
          <th>Telefono:</th>
          <td><?php echo $cliente->telefono; ?></td>
        </tr>
        <tr>
          <th>Direccion:</th>
          <td><?php echo $cliente->direccion; ?></td>
        </tr>
      </table>
      <div class="card-action">
        <a class="btn red" href="<?php echo "../otros/eliminar.php?id=" . $cliente->id?>">Eliminar</a>
        <a class="btn green" href="../otros/clientes.php">Cancelar</a>
      </div>
      <?php
    }else{
      echo "algo a salido mal";
    }
  }

  public function eliminarCliente(){
    $id = $_GET['id'];
    $query = "DELETE FROM clientes WHERE id=:id";
    $consulta = $this->DBConexion->prepare($query);
    $consulta->bindParam(':id',$id);
    $consulta->execute();
      if ($consulta) {
          header("Location: ../otros/clientes.php?status=3");
      }else{
        echo "Algo salio mal";
      }
  }

  public function mostrarProveedor(){
    $sentencia = $this->DBConexion->prepare("SELECT * FROM proveedor;");
    $sentencia->execute();
    $proveedor = $sentencia->fetchAll(PDO::FETCH_OBJ);
    foreach($proveedor as $proveedor){?>
      <tr>
        <td><img src="<?php echo $proveedor->img; ?>" width="100" height="100"></td>
        <td><?php echo $proveedor->nombre; ?></td>
        <td><?php echo $proveedor->razon; ?></td>
        <td><?php echo $proveedor->rfc; ?></td>
        <td><?php echo $proveedor->direccion; ?></td>
        <td><?php echo $proveedor->contacto; ?></td>
        <td><a href="<?php echo '../otros/verProveedor.php?id='. $proveedor->idProveedor; ?>" class="btn blue"><i class="material-icons">visibility</i></a></td>
      </tr>
      <?php
    }
  }

  public function registrarProveedor(){
    $nombre = $_POST['nombreProveedor'];
    $razon = $_POST['razonProveedor'];
    $rfc = $_POST['rfcProveedor'];
    $direccion = $_POST['direccionProveedor'];
    $contacto = $_POST['contactoProveedor'];
    $img = $_POST['imgProveedor'];
    $moneda = $_POST['id_moneda_CV'];

    if (!empty($nombre) &&
        !empty($razon) &&
        !empty($rfc) &&
        !empty($direccion) &&
        !empty($contacto) &&
        !empty($img) &&
        !empty($moneda)) {

          $query = ('INSERT INTO proveedor (nombre,razon,rfc,direccion,contacto,img,moneda_Proveedor)VALUES(:nombre, :razon, :rfc, :direccion, :contacto, :img, :moneda)');
          $consulta = $this->DBConexion->prepare($query);
          $consulta->bindParam(':nombre',$nombre);
          $consulta->bindParam(':razon',$razon);
          $consulta->bindParam(':rfc',$rfc);
          $consulta->bindParam(':direccion',$direccion);
          $consulta->bindParam(':contacto',$contacto);
          $consulta->bindParam(':img',$img);
          $consulta->bindParam(':moneda',$moneda);
          $consulta->execute();

          if ($consulta) {
            header("Location: ../otros/proveedores.php?status=1");
          }else {
            echo "Ocurrio un error al procesar la acción";
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

  public function verProveedor(){
    $id=$_GET['id'];
    $query=('SELECT * FROM proveedor WHERE idProveedor=:id');
    $consulta = $this->DBConexion->prepare($query);
    $consulta->bindParam(':id',$id);
    $consulta->execute();
    $proveedor = $consulta->fetch(PDO::FETCH_OBJ);
    if ($proveedor) {
      ?>

          <div class="card">
            <div class="card-comtainer">
              <div class="col s12">
                <h1><i class="large material-icons left">assignment_ind</i><?php echo $proveedor->nombre; ?></h1>
                <div class="">
                  <div class="col s3">
                    <img src="<?php echo $proveedor->img; ?>" class="responsive-img">
                  </div>
                  <div class="col s8">
                    <form method="post">
                      <table>

                            <div class="input-field">
                              <input id="idProveedor" name="idProveedor" type="hidden" class="validate" value="<?php echo $proveedor->idProveedor; ?>">
                            </div>

                        <tr>
                          <th class="blue lighten-5">Nombre del Proveedor:</th>
                          <td>
                            <div class="input-field">
                              <i class="material-icons prefix">account_circle</i>
                              <input id="nombreProveedor" name="nombreProveedor" type="text" class="validate" value="<?php echo $proveedor->nombre; ?>">
                              <label for="nombreProveedor">Cliente</label>
                            </div>
                          </td>
                        </tr>

                        <tr>
                          <th class="blue lighten-5">Razón Social:</th>
                          <td>
                            <div class="input-field">
                              <i class="material-icons prefix">people</i>
                              <input id="razonProveedor" name="razonProveedor" type="text" class="validate" value="<?php echo $proveedor->razon;; ?>">
                              <label for="razonProveedor">Razón Social</label>
                            </div>
                          </td>
                        </tr>

                        <tr>
                          <th class="blue lighten-5">RFC:</th>
                          <td>
                            <div class="input-field">
                              <i class="material-icons prefix">business</i>
                              <input id="rfcProveedor" name="rfcProveedor" type="text" class="validate" value="<?php echo $proveedor->rfc; ?>">
                              <label for="rfcProveedor">RFC</label>
                            </div>
                          </td>
                        </tr>

                        <tr>
                          <th class="blue lighten-5">Direccion:</th>
                          <td>
                            <div class="input-field">
                              <i class="material-icons prefix">location_on</i>
                              <input id="direccionProveedor" name="direccionProveedor" type="text" class="validate" value="<?php echo $proveedor->direccion; ?>">
                              <label for="direccionProveedor">Direccion</label>
                            </div>
                          </td>
                        </tr>

                        <tr>
                          <th class="blue lighten-5">Contacto:</th>
                          <td>
                            <div class="input-field">
                              <i class="material-icons prefix">phone</i>
                              <input id="contactoProveedor" name="contactoProveedor" type="text" class="validate" value="<?php echo $proveedor->contacto; ?>">
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
                                <input id="id_moneda_CV" name="id_moneda_CV" type="text" class="validate" value="<?php echo $proveedor->moneda_Proveedor; ?>">
                                <label for="id_moneda_CV">Moneda</label>
                              </div>
                            </div>
                          </td>
                        </tr>
                        <tr>
                          <th></th>
                          <td>
                            <div class="">
                              <input type="submit" name="actualizarProveedor" value="Actualizar Proveedor" class="btn green">
                              <a href="proveedores.php" class="btn red">Cancelar Registro</a>
                            </div>
                          </td>
                        </tr>
                      </table>
                    </form>
                  </div>
                </div>
              </div>
            </div>
          </div>
      <?php
    }
  }

  public function actualizarProveedor(){
    $id=$_POST['idProveedor'];
    $nombre = $_POST['nombreProveedor'];
    $razon = $_POST['razonProveedor'];
    $rfc = $_POST['rfcProveedor'];
    $direccion = $_POST['direccionProveedor'];
    $contacto = $_POST['contactoProveedor'];
    $moneda = $_POST['id_moneda_CV'];

    if (!empty($id) &&
        !empty($nombre) &&
        !empty($razon) &&
        !empty($rfc) &&
        !empty($direccion) &&
        !empty($contacto) &&
        !empty($moneda)) {

          $query = ('UPDATE proveedor SET nombre = :nombre,
                                          razon = :razon,
                                          rfc = :rfc,
                                          direccion = :direccion,
                                          contacto = :contacto,
                                          moneda_Proveedor = :moneda WHERE idProveedor=:id');
          $consulta = $this->DBConexion->prepare($query);
          $consulta->bindParam(':nombre',$nombre);
          $consulta->bindParam(':razon',$razon);
          $consulta->bindParam(':rfc',$rfc);
          $consulta->bindParam(':direccion',$direccion);
          $consulta->bindParam(':contacto',$contacto);
          $consulta->bindParam(':moneda',$moneda);
          $consulta->bindParam(':id',$id);
          $consulta->execute();

          if ($consulta) {
            header("Location: ../otros/proveedores.php?status=2");
          }else {
            echo "Ocurrio un error al procesar la acción";
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

  public function mostrarAlmacen(){
    $query="SELECT * FROM almacen";
    $consulta = $this->DBConexion->prepare($query);
    $consulta->execute();
    $almacenes = $consulta->fetchAll(PDO::FETCH_OBJ);

    foreach ($almacenes as $almacen) {
      ?>
      <div class="col s3">
        <div class="card">
          <div class="card-content purple darken-1">
            <div class="row">
              <div class="col s12">
                <div class="center">
                  <h5 class="white-text"><i class="large material-icons">widgets</i></h5>
                </div>
              </div>
            </div>
          </div>
          <div class="card-action">
            <a href="productos/listar.php" class="purple-text text-darken-1"><?php echo $almacen->nombreAlmacen; ?><i class="material-icons right">navigate_next</i></a>
          </div>
        </div>
      </div>
      <?php
    }
  }

  public function crearAlmacen(){
    $nombreAlmacen = $_POST['nombreAlmacen'];
    $descripcionAlmacen = $_POST['descripcionAlmacen'];

    if (!empty($nombreAlmacen) && !empty($descripcionAlmacen)) {
      $query=('INSERT INTO almacen(nombreAlmacen,descripcionAlmacen)VALUES(:nombreAlmacen,:descripcionAlmacen)');
      $consulta = $this->DBConexion->prepare($query);
      $consulta->bindParam(':nombreAlmacen', $nombreAlmacen);
      $consulta->bindParam(':descripcionAlmacen',$descripcionAlmacen);
      $consulta->execute();

      if ($consulta) {
        header("Location: ../otros/almacenes.php?status=1");
      }else {
        echo "Ocurrio un error al procesar la acción";
      }
    }
  }


//////////////////////////////////////////////////////////////////
}
 ?>
