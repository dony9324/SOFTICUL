<?php include 'partials/head.php';?>
<?php
if (isset($_SESSION["usuario"])) {
    if ($_SESSION["usuario"]["privilegio"] == 2) {
        header("location:usuario.php");
    }
} else {
    header("location:login.php");
}
?>
<?php include 'partials/menu.php';?>
<div class="container">
	<div class="starter-template">
		<br>
		<br>
		<br>
        <br>
		<br>
		<br>
		<div class="jumbotron">
      <?php if(isset($_COOKIE['desactivaritemtrue'])){?>
      <div class="alert alert-success text-center">
      <p><i class='glyphicon glyphicon-ok'></i> Se ha desactivado ítem exitosamente.!!</p>
      <p>para volver a activarlo use la opción ítem desatibados</p>
      </div>
    <?php setcookie("desactivaritemtrue","",time()-18600);
    }?>

    <?php if(isset($_COOKIE['activaritemtrue'])){?>
    <div class="alert alert-success text-center">
    <p><i class='glyphicon glyphicon-ok'></i> Se ha activado ítem exitosamente.!!</p>
    <p>Ya esta disponible en el menu</p>
    </div>
  <?php setcookie("activaritemtrue","",time()-18600);
  }?>
			<div class="container text-center">
				<h1><strong>Bienvenido</strong> <?php echo $_SESSION["usuario"]["nombre"]; ?></h1>
				<p>Panel de control | <span class="label label-info"><?php echo $_SESSION["usuario"]["privilegio"] == 1 ? 'Admin' : 'Cliente'; ?></span></p>
				<p>
					<a href="cerrar-sesion.php" class="btn btn-primary btn-lg">Cerrar sesión</a><br><br>
          <?php
          $sql="SELECT * from item WHERE estado = 0";
          $result=mysqli_query($conexion,$sql);
          $conta = false;
          while($mostrar=mysqli_fetch_array($result)){
              $conta=true;
             }
             if ($conta){
               echo'<a href="vistasItemDesatibados.php" class="btn btn-info btn-lg">ítem desatibados</a>
               <br> <br>';
             }?>

             <?php
             $sql="SELECT * from invetario WHERE estado < 2";
             $result=mysqli_query($conexion,$sql);
             $conta = false;
             while($mostrar=mysqli_fetch_array($result)){
                 $conta=true;
                }
                if ($conta){
                  echo'<a href="vistasArticulosP.php" class="btn btn-info btn-lg">Prestar articulo</a>
                  <br> <br>';
                  echo'<a href="vistasPrestamos.php" class="btn btn-info btn-lg">ver Prestamos</a>
                  <br> <br>';
                }?>
				</p>
			</div>
		</div>
	</div>
</div><!-- /.container -->
<?php include 'partials/footer.php';?>
