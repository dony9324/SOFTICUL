
<?php include 'partials/head.php';?>
<?php include 'partials/menu.php';?>


<?php
if (isset($_SESSION["usuario"])) {
   
} else {
    header("location:login.php");
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
						<form action="registroCode.php" method="POST" role="form">
							<legend>Registro de usuarios</legend>
							<div class="form-group">
								<label for="nombre">Nombre </label>
								<input type="text" name="txtNombre" class="form-control" id="nombre" autofocus required placeholder="Ingresa nombre">
							</div>

							<div class="form-group">
								<label for="apellido">Apellido</label>
								<input type="text" name="txtApellido" class="form-control" id="apellido"  required placeholder="Ingresa apellidos">
							</div>

							<div class="form-group">
								<label for="usuario">Usuario</label>
								<input type="text" name="txtUsuario" class="form-control" id="usuario" autofocus required placeholder="usuario">
							</div>

							<div class="form-group">
								<label for="password">Password</label>
								<input type="password" name="txtPassword" class="form-control" required id="password" placeholder="****">
							</div>
                            
						
								
								<input type="hidden" name="txtAsociacion" class="form-control" id="asociacion" value="<?php echo $_SESSION["usuario"]["id"]; ?> ">
					

							<button type="submit" class="btn btn-success">Registrar</button>
						</form>
					</div>
				</div>
			</div>
		</div>
	</div>

</div><!-- /.container -->

<?php include 'partials/footer.php';?>