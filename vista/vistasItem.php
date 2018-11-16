<?php include 'partials/head.php';?>
<?php
if (isset($_SESSION["usuario"])) {
  if ($_SESSION["usuario"]["privilegio"] == 2) {
    //    header("location:usuario.php");
  }
} else {
  header("location:login.php");
}
?>
<?php include 'partials/menu.php'; ?>
<div class="container">
  <div class="starter-template">
    <br>
    <br>
    <br>
    <br>
    <div class="jumbotron">
      <div class="container text-center">
        <h1><strong>Item</strong>
          <?php
          $id= $_GET['id'];
          $sql="SELECT * from item WHERE `id`= $id";
          $result=mysqli_query($conexion,$sql);
          while($mostrar=mysqli_fetch_array($result)){
            echo $mostrar['nombre']; }
            ?>
          </h1>
          <?php  if ($_SESSION["usuario"]["privilegio"] == 1){ ?>
            <p><a href="renombrarItem.php?id=<?php echo $id; ?>" class="btn btn-info">Renombrar</a></p>
            <?php
            $sql="SELECT * from invetario WHERE `id_item`= $id";
            $result=mysqli_query($conexion,$sql);
            $resul=mysqli_query($conexion,$sql);
            $conta = false;

            while($mos=mysqli_fetch_array($resul)){
              $conta=true;}

              if (!$conta){
                echo'

                <form id="loginForm" action="desactivarItemCode.php" method="POST" role="form">
                <input type="hidden" name="txtId" class="form-control" id="id" value="'.$id.'">
                <button  type="submit"  class="btn btn-danger">Desactivar</button>
                </form>
                <br> <br>';
              }
              // si hay usuarios?
              ?>
            <?php } ?>
            <a href="nuevoArticulo.php?id=<?php echo $id; ?>" class="btn btn-default btn-lg"><span class="glyphicon glyphicon-plus"></span>Registrar nuevo artículo</a>
          </div>
        </div>
      </div>
    </div>
    <div class="container">
      <div class="starter-template">
        <div class="jumbotron">


          <table class="table table-striped">
            <thead class="thead-inverse">
              <tr>
                <th>#</th>
                <th>nombre</th>
                <th>descricion</th>
                <th>fecha de registro</th>
                <th></th>
              </tr>
            </thead>
            <tbody>
              <?php                 $contador = false;
              while($mostrar=mysqli_fetch_array($result)){
                $contador = true;
                ?>
                <tr>
                  <th scope="row"><?php echo $mostrar['id']; ?> </th>
                  <td><?php echo $mostrar['nombre']; ?></td>
                  <td><?php echo $mostrar['descricion']; ?></td>
                  <td><?php echo $mostrar['fecha_registro']; ?></td>
                  <td><a href="modificarArticulo.php?id=<?php echo $mostrar['id']; ?>"> <button type="button" class="btn btn-success">Modificar</button> </a></td>
                </tr>
              <?php }  ?>
            </tbody>
          </table>
          <?php if (!$contador){
            echo "
            <h1>
            NO Hay articulos en este item.

            </h1>";

          } ?>

        </div>
      </div>
    </div><!-- /.container -->
    <?php include 'partials/footer.php';?>