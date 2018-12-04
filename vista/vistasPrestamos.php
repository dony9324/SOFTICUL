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
      <?php if(isset($_COOKIE['finalPrestartrue'])){?>
        <div class="alert alert-success text-center">
          <p><i class='glyphicon glyphicon-ok'></i> Se Finalizó prestamo exitosamente.!!</p>
          <p></p>
        </div>
        <?php setcookie("finalPrestartrue","",time()-18600);
      }?>
      <div class="container text-center">
        <h1><i class='fa fa-th-large'></i> Prestamos</h1>
        <br>
        <form class="form-horizontal" role="form">
          <input type="hidden" name="view" value="rents">
          <div class="form-group col-lg-6">
            <div class="col-lg-2">
              <label class="col-lg-1 control-label">Ver</label></div>
              <div class="col-lg-10">
                <div class="switch-field">
                  <input type="radio" id="switch_left" name="switch_2" value="0" <?php if(isset($_GET["switch_2"]) && $_GET["switch_2"]==0){ echo "checked"; } else if(!isset($_GET["switch_2"])){ echo "checked"; } ?>>
                  <label for="switch_left">Todos</label>
                  <input type="radio" id="switch_medio" name="switch_2" value="1"<?php if(isset($_GET["switch_2"]) && $_GET["switch_2"]==1){ echo "checked"; } ?>>
                  <label for="switch_medio">Activos</label>
                  <input type="radio" id="switch_right" name="switch_2" value="2"<?php if(isset($_GET["switch_2"]) && $_GET["switch_2"]==2){ echo "checked"; } ?>>
                  <label for="switch_right">Entregados</label>
                  <span class="btn btn-primary" onclick="refresh()"><i class="glyphicon glyphicon-refresh"></i></span>
                  <script>
                  function refresh(){
                    act = $('input[name="switch_2"]:checked').val();
                    act2 = $('input[name="start_at"]').val();
                    act3 = $('input[name="finish_at"]').val();
                    window.location.replace("./vistasPrestamos.php?switch_2="+act+"&start_at="+act2+"&finish_at="+act3)
                  }
                  </script>
                </div>
              </div></div>
              <div class="form-group">
                <div class="col-lg-3">
                  <div class="input-group">
                    <span class="input-group-addon">INICIO</span>
                    <input type="date" name="start_at" required value="<?php if(isset($_GET["start_at"]) && $_GET["start_at"]!=""){ echo $_GET["start_at"]; } ?>" class="form-control" placeholder="Palabra clave">
                  </div>
                </div>
                <div class="col-lg-3">
                  <div class="input-group">
                    <span class="input-group-addon">FIN</span>
                    <input type="date" name="finish_at" required value="<?php if(isset($_GET["finish_at"]) && $_GET["finish_at"]!=""){ echo $_GET["finish_at"]; } ?>" class="form-control" placeholder="Palabra clave">
                  </div>
                </div>
                <div class="col-lg-6">
                  <button class="btn btn-primary btn-block">Procesar</button>
                </div>

              </div>
            </form>
            <?php
            $products = array();
            if(isset($_GET["start_at"]) && $_GET["start_at"]!="" && isset($_GET["finish_at"]) && $_GET["finish_at"]!=""){
              if($_GET["start_at"]<$_GET["finish_at"]){
                $start = $_GET["start_at"];
                $end = $_GET["finish_at"];
                if(isset($_GET["switch_2"]) && $_GET["switch_2"]==1){
                  $sql="SELECT * from prestamos WHERE `prestamos`.`devuelto`  is  NULL AND ((date(fecha_registro) >= \"$start\")  and (date(fecha_registro) <= \"$end\")) ";
                }
                if(isset($_GET["switch_2"]) && $_GET["switch_2"]==2){
                  $sql="SELECT * from prestamos WHERE `prestamos`.`devuelto`  is NOT NULL AND ((date(fecha_registro) >= \"$start\")  and (date(fecha_registro) <= \"$end\")) ";
                }else {
                  $sql="SELECT * from prestamos WHERE ((date(fecha_registro) >= \"$start\")  and (date(fecha_registro) <= \"$end\")) ";
                }

                //  $products = OperationData::getRentsByRange($_GET["start_at"],$_GET["finish_at"]);
                //  $sql = "select * from ".self::$tablename." where (  (\"$start\">=start_at and \"$finish\"<=finish_at) or (start_at>=\"$start\" and finish_at<=\"$finish\") )  and returned_at is NULL ";
                //      $sql="SELECT * from invetario WHERE (`start_at` <= $_GET['start_at'] and  `finish_at` >= $_GET['finish_at'])";
                $result=mysqli_query($conexion,$sql);
                $resul=mysqli_query($conexion,$sql);
                $conta = false;
              }
            }else{
              if(isset($_GET["switch_2"]) && $_GET["switch_2"]==1){
                $sql="SELECT * from prestamos WHERE `prestamos`.`devuelto`  is NULL";
              }else if(isset($_GET["switch_2"]) && $_GET["switch_2"]==2){
                $sql="SELECT * from prestamos WHERE `prestamos`.`devuelto`  is NOT NULL";
              }else {
                $sql="SELECT * from prestamos";
              }

              $result=mysqli_query($conexion,$sql);
              $resul=mysqli_query($conexion,$sql);
              $conta = false;
            }
            ?>
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
                <th>articulo</th>
                <th>responsable</th>
                <th>inicio</th>
                <th>fin</th>
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
                  <td>
                    <?php
                    $id= $mostrar['inventario_id'];
                    $sql1="SELECT * from invetario WHERE `id`= $id";
                    $result1=mysqli_query($conexion,$sql1);
                    while($mos1=mysqli_fetch_array($result1)){
                      echo  $mos1['nombre'];
                    } ?>
                  </td>
                  <td><?php
                  $id= $mostrar['persona_id'];
                  $sql2="SELECT * from personas WHERE `id`= $id";
                  $result2=mysqli_query($conexion,$sql2);
                  while($mos=mysqli_fetch_array($result2)){
                    echo   $mos['nombre']." ".$mos['apellidos'];
                  } ?></td>

                  <td><?php echo $mostrar['comienzo']; ?></td>
                  <td><?php echo $mostrar['terminar']; ?></td>
                  <td>
                    <?php if ($mostrar['devuelto']==NULL) {
                      // code...
                     ?>
                    <button onclick="finalPrestar(<?php echo $mostrar['id'];?>)" class="<?PHP if (date('Y-m-d') < $mostrar['terminar'] ) {echo 'btn btn-danger'; }else { echo 'btn btn-primary'; } ?>">Finalizar</button>
                  <?php }else {
                    echo $mostrar['devuelto'];
                  }  ?>
                  </td>
                </tr>
              <?php }  ?>
            </tbody>
          </table>
          <?php if (!$contador){
            echo "
            <h1>
            NO Hay Prestamos.
            </h1>";
          } ?>
        </div>
      </div>
    </div>

    <?php include 'partials/footer.php';?>
    <script>
    function finalPrestar(id) {
      console.log("Final prestar "+id);
      $.post("finalPrestar.php",
      {
        Id: id,
      },function(data){
        if (data.estado == "true") {
          $("body").overhang({
            type: "success",
            message: "Se desactivo item correctamente",
            callback: function() {
              window.location.href = "vistasPrestamos.php";
            }
          });
        }else {
          $("body").overhang({
            type: "error",
            message: "Algo salio mal!"
          });
        }
      });
    }
    </script>
  </div>
</div>
