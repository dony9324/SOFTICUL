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
            <form id="loginForm" action="renombrarItemCode.php" method="POST" role="form">
              <legend>Modificar Articulo</legend>
              <div class="form-group">
                <label for="usuario"><?php
                $id= $_GET['id'];
                $sql="SELECT * from invetario WHERE `id`= $id";
                $result=mysqli_query($conexion,$sql);
                while($mostrar=mysqli_fetch_array($result)){
                  echo "Nombre";
                  ?></label>
                  <input type="text" value="<?php  echo $mostrar['nombre']; }	 ?>" name="txtUsuario" class="form-control" id="usuario" autofocus required placeholder="ingrese nuevo nombre">
                </div>
                <div class="form-group">
                  <label for="usuario"><?php
                  $id= $_GET['id'];
                  $sql="SELECT * from invetario WHERE `id`= $id";
                  $result=mysqli_query($conexion,$sql);
                  while($mostrar=mysqli_fetch_array($result)){
                    echo $mostrar['descricion']; }
                    ?></label>
                    <input type="text" name="txtUsuario" class="form-control" id="usuario" autofocus required placeholder="ingrese nuevo nombre">
                  </div>
                  <div class="form-group">
                    <label for="usuario"><?php
                    $id= $_GET['id'];
                    $sql="SELECT * from invetario WHERE `id`= $id";
                    $result=mysqli_query($conexion,$sql);
                    while($mostrar=mysqli_fetch_array($result)){
                      echo $mostrar['nota']; }
                      ?></label>
                      <input type="text" name="txtUsuario" class="form-control" id="usuario" autofocus required placeholder="ingrese nuevo nombre">
                    </div>
                    <input type="hidden" name="txtAsociacion" class="form-control" id="asociacion" value="<?php echo $_SESSION["usuario"]["id"]; ?> ">
                    <input type="hidden" name="txtId" class="form-control" id="id" value="<?php echo $id; ?> ">
                    <button type="submit" class="btn btn-success">Guardar</button>
                  </form>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div><!-- /.container -->
<?php include 'partials/footerRenombrar.php';?>
