<?php include 'partials/head.php';?>
<?php include 'partials/menu.php'; ?>
<?php
if (isset($_SESSION["usuario"])) {
  if ($_SESSION["usuario"]["privilegio"] == 2) {
    //    header("location:usuario.php");
  }
} else {
  header("location:login.php");
}

if(!isset($_SESSION["Prestar2"])){

    if(!isset($_GET['id'])){

    //  header("vistasArticulosP.php");
  }else {
  $id= $_GET['id'];
  $sql="SELECT * from personas WHERE `id`= $id";
  $result=mysqli_query($conexion,$sql);
  while($mostrar=mysqli_fetch_array($result)){
    $tmpnombre = $mostrar['nombre'];
    $tmpapellidos = $mostrar['apellidos'];
    $tmpidentificacion = $mostrar['identificacion'];
  }
  $p = array("id"=>$id,"nombre"=> $tmpnombre, "apellidos"=> $tmpapellidos, "identificacion"=> $tmpidentificacion);
  $_SESSION["Prestar2"] = array($p);
  //	$cart = $_SESSION["Prestar"];
  //	unset($_SESSION["Prestar2"]);
}}
//unset($_SESSION["Prestar2"]);
?>
<div class="container">
  <div class="starter-template">
    <br>
    <br>
    <br>
    <br>
    <div class="jumbotron">
      <div class="container text-center">
          <div class="alert alert-info text-center">
            <p><i class='glyphicon glyphicon-circle-arrow-right'></i> Seleccione la fecha de inicio y la fecha de devolución del articulo!!</p>
            <p></p>
          </div>
          <?php foreach($_SESSION["Prestar"] as $p){ ?>
          <h1><strong>Articulo</strong></h1>
          <h2> #:  <strong><?php  echo $p["id"]; ?> </strong> - Nombre: <strong><?PHP  echo $p["nombre"]; ?></strong> </h2>
        <?php } ?>
        <?php foreach($_SESSION["Prestar2"] as $p){ ?>
        <h1><strong>Responsable</strong></h1>
        <h2> #:  <strong><?php  echo $p["id"]; ?> </strong> - Nombre: <strong><?PHP  echo $p["nombre"]." ".$p["apellidos"]."</strong> - identificacion <strong>".$p["identificacion"] ; ?>  </strong> </h2>
      <?php } ?>
        <br><br>
        <form id="loginForm"  action="prestarCode.php" method="post">
          <div class="col-md-offset-3 col-md-6 input-group">


          <div class="input-group">
          <span class="input-group-addon">INICIO</span>
            <input type="date" name="start_at" required="" class="form-control">
          </div>
          <br>
          <div class="input-group">
            <span class="input-group-addon">FIN</span>
            <input type="date" name="finish_at" required="" class="form-control">
            <input type="hidden" name="txtAsociacion" class="form-control" id="asociacion" value="<?php echo $_SESSION["usuario"]["id"]; ?> ">
          </div>
          <div class="">
            <br>
                  <button type="submit" class="btn btn-primary btn-block" placeholder="Email">Procesar</button>
          </div>
          <div class="">
          <br>
            <input type="submit" value="Cancelar" class="btn btn-danger btn-block" placeholder="Email">
          </div>
            </div>
        </form>
        <div id="show_search_results"></div>
      </div>
    </div>
  </div>
</div>

<?php include 'partials/footer.php';?>
<script>
$(document).ready(function() {



    <?php    if(!isset($_GET['id'])){
      ?>
          $("body").overhang({
              type: "error",
              message: "debes selecionar un articulo y un Responsable antes de llegar aqui",
              callback: function() {
                window.location.href = "vistasArticulosP.php";
              }
            });
      <?php

        //  header("vistasArticulosP.php");
      }
  ?>




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
        $("#loginForm button[type=submit]").html("procesando...");
        $("#loginForm button[type=submit]").attr("disabled", "disabled");
      },
      success: function(response) {
        if (response.estado == "true") {
          $("body").overhang({
            type: "success",
            message: "Se procesó prestamo correctamente",
            callback: function() {
             window.location.href = "vistasPrestamos.php";
              $("#loginForm button[type=submit]").html("Desactivar");
            }
          });
        } else {
          $("body").overhang({
            type: "error",
            message: "Algo salio mal!"
          });
        }
        $("#loginForm button[type=submit]").html("Procesar");
        $("#loginForm button[type=submit]").removeAttr("disabled");
      },
      error: function() {
        $("body").overhang({
          type: "error",
          message: "Algo salio mal!"
        });
        $("#loginForm button[type=submit]").html("Procesar");
        $("#loginForm button[type=submit]").removeAttr("disabled");
      }
    });
    /*cansela el envio del formulario*/
    return false;
  });
});
</script>
