<?php include 'partials/head.php';?>
<?php
if (isset($_SESSION["usuario"])) {
  if ($_SESSION["usuario"]["privilegio"] == 2) {
    //    header("location:usuario.php");
  }
} else {
  header("location:login.php");
}

if(isset($_SESSION["Prestar"])){
	unset($_SESSION["Prestar"]);
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

        <h1><strong>Prestar articulo</strong> </h1>
        <h3>Escoja el articulo</h3>


        <form id="searchp" >
          <div class="col-md-offset-3 col-md-6">
            <!-- 	<input type="hidden" name="view" value="sell">  -->
            <input type="text" id="product_code" name="product" class="form-control" autocomplete="off" placeholder="Buscar articulo por nombre o por codigo:">
          </div>
          <div class="col-md-3" hidden="on">
            <button type="submit" class="btn btn-info"></button><!--si quitas el submit no borra al dar enter-->
          </div>
        </form>

        <div id="show_search_results"></div>




        <?php
        $sql="SELECT * from invetario WHERE `estado` < 2 ";
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
              <th>descricion</th>
              <th>fecha de registro</th>
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
                <td><?php echo $mostrar['descricion']; ?></td>
                <td><?php echo $mostrar['fecha_registro']; ?></td>
                <td>
                  <a href="PrestarArticulo.php?id=<?php echo $mostrar['id']; ?>"> <button type="button" class="btn btn-primary">Escojer</button> </a>
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


      ///busca los productos al escribir
      $("#searchp").on("keyup","#product_code",function(e){
        e.preventDefault();
        $.get("buscararticulo.php",$("#searchp").serialize(),function(data){
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
