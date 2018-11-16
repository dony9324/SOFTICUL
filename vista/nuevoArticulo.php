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

<?php include 'partials/footerArticulo.php';?>
