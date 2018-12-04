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
    <br>
      <div class="row">
      <div class="col-md-4 col-md-offset-4">
        <div class="panel panel-default">
          <div class="panel-body">
            <form id="loginForm" action="articuloCode.php" method="POST" role="form">
              <legend>Registrar nuevo Articulo. <?php if(isset($_GET['id'])){ echo "";}else {echo "Este articulo no se guardara en nigun item";}; ?> </legend>

              <div class="form-group">
                <label for="usuario">Nombre</label>
                <input type="text" name="txtNombre" class="form-control" id="nombre" autofocus required placeholder="ingrese nombre">
              </div>
              <div class="form-group">
                <label for="usuario">Descricion</label>
                <input type="text" name="txtDescricion" class="form-control" id="descricion" autofocus required placeholder="ingrese una descricion">
              </div>

              <div class="form-group">
                <label for="usuario">Nota</label>
                <input type="text" name="txtNota" class="form-control" id="nota" autofocus required placeholder="ingrese alguna informacion adicional">
              </div>
              <div class="form-group">
                <label for="usuario">Fecha de adquisición</label>
                <input type="date" name="fecha_adquisicion" required="" value="" class="form-control" placeholder="Palabra clave">
              </div>
              <input type="hidden" name="txtId_item" class="form-control" id="id_item" value="<?php echo $_GET['id']; ?> ">
              <input type="hidden" name="txtAsociacion" class="form-control" id="asociacion" value="<?php echo $_SESSION["usuario"]["id"]; ?> ">
              <button type="submit" class="btn btn-success">Guardar</button>
            </form>
          </div>
        </div>
      </div>
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
        $("#loginForm button[type=submit]").html("Gardando...");
        $("#loginForm button[type=submit]").attr("disabled", "disabled");
      },
      success: function(response) {
        if (response.estado == "true") {
          $("body").overhang({
            type: "success",
            message: "Se guardo nuevo articulo correctamente",
            callback: function() {
              window.location.href = "vistasItem.php?id=<?php echo $_GET['id']; ?>";
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
