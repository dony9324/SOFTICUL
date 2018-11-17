<?php include 'partials/head.php';?>
<?php include 'partials/menu.php';
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
  <?php if(isset($_COOKIE['itemtrue'])){?>
  <div class="alert alert-success text-center">
  <p><i class='glyphicon glyphicon-ok'></i> Se ha guardo ítem exitosamente.!!</p>
  <p>Para acceder, pulsa en el menú arriba.</p>
  </div>
<?php setcookie("itemtrue","",time()-18600);
}?>

        <div class="panel panel-default">
          <div class="panel-body">
            <form id="loginForm" action="itemCode.php" method="POST" role="form">
              <legend>Registrar nuevo ítem.</legend>
              <div class="form-group">
                <label for="usuario">Nombre</label>
                <input type="text" name="txtUsuario" class="form-control" id="usuario" autofocus required placeholder="ingrese nombre">
              </div>
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
                        message: "Se guardo nuevo item correctamente",
                        callback: function() {
                            window.location.href = "nuevoItem.php";
							$("#loginForm button[type=submit]").html("Gardar");
                        }
                    });
                } else {
                    $("body").overhang({
                        type: "error",
                        message: "Algo salio mal!"
                    });
                }
                $("#loginForm button[type=submit]").html("Gardar");
                $("#loginForm button[type=submit]").removeAttr("disabled");
            },
            error: function() {
                $("body").overhang({
                    type: "error",
                    message: "Algo salio mal!"
                });
                $("#loginForm button[type=submit]").html("Ingresar");
                $("#loginForm button[type=submit]").removeAttr("disabled");
            }
        });
/*cansela el envio del formulario*/
        return false;
    });
});
</script>
