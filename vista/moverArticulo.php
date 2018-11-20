<?php include 'partials/head.php';?>
<?php include 'partials/menu.php';?>
<?php
if (!isset($_SESSION["usuario"])) {
  header("location:vista/login.php");
}
?>
<div class="container">
  <div class="starter-template">
    <br>
    <br>
    <br>
    <div class="row">
      <div class="col-md-4 col-md-offset-4">
        <div class="panel panel-default">
          <div class="panel-body">
            <form id="loginForm" action="moverArticuloCode.php" method="POST" role="form">
              <legend>Mover Articulo</legend>
              <div class="form-group">
                <label for="usuario"><?php
                $id= $_GET['id'];
                $sql="SELECT * from invetario WHERE `id`= $id";
                $result=mysqli_query($conexion,$sql);
                while($mostrar=mysqli_fetch_array($result)){
                  echo " # "; echo $mostrar['id'];
                  echo "<br>  Nombre: "; echo $mostrar['nombre'];
                  ?></label>
                  <?php   ; }	 ?>
                </div>

                <div class="input-group">
                  <input type="hidden" name="txtId" class="form-control" id="id_item" value="<?php echo $_GET['id']; ?> ">
                  <select class="form-control" name="txtId_item" required="">
                    <option value=""> -- Item --</option>
                    <?php
                    $conexion=mysqli_connect('localhost','root','','softicul');
                    $sql="SELECT * from item WHERE estado = 1";
                    $result=mysqli_query($conexion,$sql);

                    while($mostrar=mysqli_fetch_array($result)){
                      ?>   <option value="<?php echo $mostrar['id']; ?>"> <?php echo $mostrar['nombre'] ;?></option>
                    <?php } ?>

                  </select>
                  <span class="input-group-btn">
                    <button type="submit" class="btn btn-primary"><i class="glyphicon glyphicon-transfer"></i> Mover</button>
                  </span>
                </div>
                <br>
                <p>Seleccione ítem al que desea mover el articulo.</p>

                <input type="hidden" name="txtAsociacion" class="form-control" id="asociacion" value="<?php echo $_SESSION["usuario"]["id"]; ?> ">
                <input type="hidden" name="txtId" class="form-control" id="id" value="<?php echo $id; ?> ">

              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
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
          $("#loginForm button[type=submit]").html("Moviendo...");
          $("#loginForm button[type=submit]").attr("disabled", "disabled");
        },
        success: function(response) {
          if (response.estado == "true") {
            $("body").overhang({
              type: "success",
              message: "Se movio articulo correctamente",
              callback: function() {
                window.location.href = "vistasItem.php?id=<?php echo $_GET['id_item']; ?>";
                $("#loginForm button[type=submit]").html("<i class='glyphicon glyphicon-transfer'></i> Mover");
              }
            });
          } else {
            $("body").overhang({
              type: "error",
              message: "Algo salio mal!"
            });
          }

          $("#loginForm button[type=submit]").html("<i class='glyphicon glyphicon-transfer'></i> Mover");
          $("#loginForm button[type=submit]").removeAttr("disabled");
        },
        error: function() {
          $("body").overhang({
            type: "error",
            message: "Algo salio mal!"
          });

          $("#loginForm button[type=submit]").html("<i class='glyphicon glyphicon-transfer'></i> Mover");
          $("#loginForm button[type=submit]").removeAttr("disabled");
        }
      });
      /*cansela el envio del formulario*/
      return false;
    });

  });
  </script>
