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
if(!isset($_SESSION["Prestar"])){
  if(!isset($_GET['id'])){
?>


<?PHP
  //  header("vistasArticulosP.php");
}else {

  $id= $_GET['id'];
  $sql="SELECT * from invetario WHERE `id`= $id";
  $result=mysqli_query($conexion,$sql);
  while($mostrar=mysqli_fetch_array($result)){
    $tmpnombre = $mostrar['nombre'];
  }
  $p = array("id"=>$id,"nombre"=> $tmpnombre);
  $_SESSION["Prestar"] = array($p);
  //	$cart = $_SESSION["Prestar"];
  //	unset($_SESSION["Prestar"]);
}}
?>

<div class="container">
  <div class="starter-template">
    <br>
    <br>
    <br>
    <br>
    <div class="jumbotron">
      <div class="container text-center">
        <?php if(isset($_COOKIE['nuevapersonatrue'])){?>
        <div class="alert alert-success text-center">
        <p><i class='glyphicon glyphicon-ok'></i> Se registro nueva persona exitosamente.!!</p>
        <p>para seleccionarla, busque en la lista o use el campo</p>
        </div>
      <?php setcookie("nuevapersonatrue","",time()-18600);
      }?>
        <?php foreach($_SESSION["Prestar"] as $p){ ?>
        <h1><strong>Prestar articulo</strong></h1>
        <h2> #:  <strong><?php  echo $p["id"]; ?> </strong> - Nombre: <strong><?PHP  echo $p["nombre"]; ?></strong> </h2>
        <?php } ?>
          <h1>Escoja el responsable</h1>
          <a href="nuevaPersona.php?id=6" class="btn btn-default btn-info"><span class="glyphicon glyphicon-plus"></span>Registrar nuevo Responsable</a>
          <br><br>
          <form id="searchp" >
            <div class="col-md-offset-3 col-md-6">
              <!-- 	<input type="hidden" name="view" value="sell">  -->
              <input type="text" id="product_code" name="product" class="form-control" autocomplete="off" placeholder="Buscar persona por documento de identidad:">
            </div>
            <div class="col-md-3" hidden="on">
              <button type="submit" class="btn btn-info"></button><!--si quitas el submit no borra al dar enter-->
            </div>
          </form>

          <div id="show_search_results"></div>
          <?php
          $sql="SELECT * from personas WHERE `estado` < 2 ";
          $result=mysqli_query($conexion,$sql);
          $resul=mysqli_query($conexion,$sql);
          $conta = false;
          ?>        </div>
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
                <th>apellidos</th>
                <th>identificacion</th>
                <th></th>
              </tr>
            </thead>
            <tbody>
              <?php  $contador = false;
              while($mostrar=mysqli_fetch_array($result)){
                $contador = true;
                ?>
                <tr>
                  <th scope="row"><?php echo $mostrar['id']; ?> </th>
                  <td><?php echo $mostrar['nombre']; ?></td>
                  <td><?php echo $mostrar['apellidos']; ?></td>
                  <td><?php echo $mostrar['identificacion']; ?></td>
                  <td>
                    <a href="PrestarArticulo2.php?id=<?php echo $mostrar['id']; ?>"> <button type="button" class="btn btn-primary">Escojer</button> </a>
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



  <?php    if(!isset($_GET['id'])){
    ?>


          $("body").overhang({
            type: "error",
            message: "debes selecionar un articulo antes de llegar aqui",
            callback: function() {
              window.location.href = "vistasArticulosP.php";
            }
          });


    <?php

      //  header("vistasArticulosP.php");
    }
?>

      ///busca los productos al escribir
      $("#searchp").on("keyup","#product_code",function(e){
        e.preventDefault();
        $.get("buscarpersonas.php",$("#searchp").serialize(),function(data){
          $("#show_search_results").html(data);
        });
      });

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
