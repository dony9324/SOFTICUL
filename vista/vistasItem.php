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
        <?php if(isset($_COOKIE['renombraritemtrue'])){?>
          <div class="alert alert-success text-center">
            <p><i class='glyphicon glyphicon-ok'></i> Se ha renombrado ítem exitosamente.!!</p>
            <p></p>
          </div>
          <?php setcookie("renombraritemtrue","",time()-18600);
        }?>

        <?php if(isset($_COOKIE['moverArticulotrue'])){?>
          <div class="alert alert-success text-center">
            <p><i class='glyphicon glyphicon-ok'></i> Se ha movido articulo exitosamente.!!</p>
            <p>lo puedes localizar en el Item elegido</p>
          </div>
          <?php setcookie("moverArticulotrue","",time()-18600);
        }?>

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
                  <td>
                    <a href="modificarArticulo.php?id=<?php echo $mostrar['id']; ?>&id_item=<?php echo $id; ?>"> <button type="button" class="btn btn-success">Modificar</button> </a>
                    <a href="moverArticulo.php?id=<?php echo $mostrar['id']; ?>&id_item=<?php echo $id; ?>"> <button type="button" class="btn btn-success">Mover</button> </a>
                  </td>
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
    <script>
    $(document).ready(function() {
      /*cactura el evento del formulario */
      $("#loginForm").bind("submit", function() {
        +
        $.ajax({
          /*cacturamos el metodo*/
          type: $(this).attr("method"),
          /**/
          url: $(this).attr("action"),
          data: $(this).serialize(),
          beforeSend: function() {
            $("#loginForm button[type=submit]").html("Desactivando...");
            $("#loginForm button[type=submit]").attr("disabled", "disabled");
          },
          success: function(response) {
            if (response.estado == "true") {
              $("body").overhang({
                type: "success",
                message: "Se desactivo item correctamente",
                callback: function() {
                  window.location.href = "admin.php";
                  $("#loginForm button[type=submit]").html("Desactivar");
                }
              });
            } else {
              $("body").overhang({
                type: "error",
                message: "Algo salio mal!"
              });
            }
            $("#loginForm button[type=submit]").html("Desactivar");
            $("#loginForm button[type=submit]").removeAttr("disabled");
          },
          error: function() {
            $("body").overhang({
              type: "error",
              message: "Algo salio mal!"
            });
            $("#loginForm button[type=submit]").html("Desactivar");
            $("#loginForm button[type=submit]").removeAttr("disabled");
          }
        });
        /*cansela el envio del formulario*/
        return false;
      });
    });
    </script>
