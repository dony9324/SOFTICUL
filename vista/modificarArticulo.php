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
            <form id="loginForm" action="modificarArticuloCode.php" method="POST" role="form">
              <legend>Modificar Articulo</legend>
              <div class="form-group">
                <label for="usuario"><?php
                $id= $_GET['id'];
                $sql="SELECT * from invetario WHERE `id`= $id";
                $result=mysqli_query($conexion,$sql);
                while($mostrar=mysqli_fetch_array($result)){
                  echo "Nombre";
                  ?></label>
                  <input type="text" value="<?php  echo $mostrar['nombre']; }	 ?>" name="txtNombre" class="form-control" id="usuario" autofocus required placeholder="ingrese nuevo nombre">
                </div>
                <div class="form-group">
                  <label for="usuario"><?php
                  $id= $_GET['id'];
                  $sql="SELECT * from invetario WHERE `id`= $id";
                  $result=mysqli_query($conexion,$sql);
                  while($mostrar=mysqli_fetch_array($result)){
                    echo "descricion";
                    ?></label>
                    <input type="text" value="<?php echo $mostrar['descricion']; }?>"name="txtDescricion" class="form-control" id="usuario" required placeholder="ingrese nuevo nombre">
                  </div>
                  <div class="form-group">
                    <label for="usuario"><?php
                    $id= $_GET['id'];
                    $sql="SELECT * from invetario WHERE `id`= $id";
                    $result=mysqli_query($conexion,$sql);
                    while($mostrar=mysqli_fetch_array($result)){
                      echo 'nota';
                      ?></label>
                      <input type="text" value="<?php echo $mostrar['nota']; } ?>" name="txtNota" class="form-control" id="usuario" autofocus required placeholder="ingrese nuevo nombre">
                    </div>

                    <div class="form-group">
                      <?php
                      $id= $_GET['id'];
                      $sql="SELECT * from invetario WHERE `id`= $id";
                      $result=mysqli_query($conexion,$sql);
                      while($mostrar=mysqli_fetch_array($result)){
                      ?>
                      <label for="usuario">Fecha de adquisición</label>
                      <input type="date" name="fecha_adquisicion" required="" value="<?php echo $mostrar['fecha_adquisicion']; } ?>"class="form-control" placeholder="Palabra clave">
                    </div>


                    <input type="hidden" name="txtId_item" class="form-control" id="id_item" value="<?php echo $_GET['id_item']; ?> ">
                    <input type="hidden" name="txtAsociacion" class="form-control" id="asociacion" value="<?php echo $_SESSION["usuario"]["id"]; ?> ">
                    <input type="hidden" name="txtId" class="form-control" id="id" value="<?php echo $id; ?> ">
                    <button type="submit" class="btn btn-success">Guardar</button>
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
              $("#loginForm button[type=submit]").html("Gardando...");
              $("#loginForm button[type=submit]").attr("disabled", "disabled");
            },
            success: function(response) {
              if (response.estado == "true") {
                $("body").overhang({
                  type: "success",
                  message: "Se guardo nuevo articulo correctamente",
                  callback: function() {
                    window.location.href = "vistasItem.php?id=<?php echo $_GET['id_item']; ?>";
                    $("#loginForm button[type=submit]").html("Gardar");
                  }
                });
              } else {
                $("body").overhang({
                  type: "error",
                  message: "Algo salio mal!"
                });
              }

              $("#loginForm button[type=submit]").html("Guardar");
              $("#loginForm button[type=submit]").removeAttr("disabled");
            },
            error: function() {
              $("body").overhang({
                type: "error",
                message: "Algo salio mal!"
              });

              $("#loginForm button[type=submit]").html("Guardar");
              $("#loginForm button[type=submit]").removeAttr("disabled");
            }
          });
          /*cansela el envio del formulario*/
          return false;
        });

      });
      </script>
