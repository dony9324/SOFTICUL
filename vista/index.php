<?php include 'partials/head.php';?>
<?php include 'partials/menu.php';?>
<?php
if (isset($_SESSION["usuario"])) {
    if ($_SESSION["usuario"]["privilegio"] == 1) {
        header("location:admin.php");
    }
} else {
    header("location:login.php");
}
?>
<div class="container">
	<div class="starter-template">
		<br>
		<br>
		<br>
        <br>
			<div class="jumbotron">
			<div class="container">
				<h1>softicul!</h1>
				<p>Software inventario cultural</p>
				<p>
					<a href="cerrar-sesion.php" class="btn btn-primary btn-lg">Cerrar sesion</a>
				</p>
			</div>
		</div>
	</div>
</div><!-- /.container -->
<?php include 'partials/footer.php';?>
