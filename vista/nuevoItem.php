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
<script src="assets/js/app-item.js"></script>
