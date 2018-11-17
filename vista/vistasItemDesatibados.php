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

        <h1><strong>Item Desactivos</strong></h1>
        <a href="nuevoItem.php" class="btn btn-default btn-lg"><span class="glyphicon glyphicon-plus"></span>Registrar nuevo item</a>
      </div>
    </div>
  </div>
</div>
<?php
$sql="SELECT * from item WHERE estado = 0";
$result=mysqli_query($conexion,$sql);
$resul=mysqli_query($conexion,$sql);
$conta = false;?>
<div class="container">
  <div class="starter-template">
    <div class="jumbotron">
      <table class="table table-striped">
        <thead class="thead-inverse">
          <tr>
            <th>#</th>
            <th>nombre</th>
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
              <td><?php echo $mostrar['fecha_registro']; ?></td>
              <td>
                <button id="<?php echo $mostrar['id']; ?>" class="btn btn-success" onclick="activarItem(<?php echo $mostrar['id']; ?>)">Activar</button>
              </td>
            </tr>
          <?php }  ?>
        </tbody>
      </table>
      <?php if (!$contador){
        echo "
        <h1>
        NO Hay item desactivos.
        </h1>";
      } ?>
    </div>
  </div>
</div><!-- /.container -->
<?php include 'partials/footer.php';?>
<script>
/*cactura el evento del formulario */
function activarItem (id2) {

  $.post("activarItemCode.php",
  {
    txtId: id2 },

    function(data){
      $("#"+id2).html("Activando...");
      $("#"+id2).attr("disabled", "disabled");
      if (data.estado == "true") {
        $("body").overhang({
          type: "success",
          message: "Se Activo item correctamente",
          callback: function() {
            window.location.href = "admin.php";
          }
        });
        $("#"+id2).html("Activar");
        $("#"+id2).removeAttr("disabled");
      } else {
        $("body").overhang({
          type: "error",
          message: "Algo salio mal!"
        });

      $("#"+id2).html("Activar");
      $("#"+id2).removeAttr("disabled");
    }
  });
  }

  </script>
