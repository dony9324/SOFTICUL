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
            <form id="loginForm" action="personaCode.php" method="POST" role="form">
              <legend>Registrar persona.</legend>
              <div class="form-group">
                <label  class="col-lg-2 control-label">Nombre*</label>
                <input type="text" name="txtNombre" required="" class="form-control" id="name" placeholder="Nombre">
              </div>
              <div class="form-group">
                <label class="col-lg-2 control-label">Apellidos*</label>
                <input type="text" name="txtApellidos"required="" class="form-control" id="lastname" placeholder="Apellidos">
              </div>
              <div class="form-group">
                <label class="col-lg-2 control-label">Identificacion*</label>
                <input type="text" name="txtidentificacion" class="form-control" id="identificacion" placeholder="Identificacion">
              </div>
              <div class="form-group">
                <label class="col-lg-2 control-label">Email*</label>
                <input type="text" name="txtemail" class="form-control" id="email" placeholder="Email">
              </div>
              <div class="form-group">
                <label for="inputEmail1" class="col-lg-2 control-label">Direccion</label>
                <input type="text" name="txtdireccion" class="form-control" id="	direccion" placeholder="direccion">
              </div>
              <div class="form-group">
                <label for="inputEmail1" class="col-lg-2 control-label">Telefono*</label>
                <input type="number" name="txtcell" class="form-control" id="cell" placeholder="Telefono">
              </div>
              <p class="alert alert-info">* Campos obligatorios</p>
              <input type="hidden" name="txtAsociacion" class="form-control" id="asociacion" value="<?php echo $_SESSION["usuario"]["id"]; ?> ">
              <div class="col-lg-offset-2 col-lg-10">
                <button type="submit" class="btn btn-success">Guardar</button>
              </div>
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
              window.location.href = "PrestarArticulo.php";
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
