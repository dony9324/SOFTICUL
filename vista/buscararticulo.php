<?php
if(isset($_GET["product"]) && $_GET["product"]!=""):
 include 'partials/head.php';
$t = $_GET["product"];
  $conexion=mysqli_connect('localhost','root','','softicul');
$sql ="SELECT * from invetario WHERE `id` like '$t' or `nombre` like '$t'";
//$sql = "SELECT * from invetario WHERE id like $temp or nombre like $temp or descricion like $temp or nota like $temp";
$result=mysqli_query($conexion,$sql);
$resul=mysqli_query($conexion,$sql);
$conta = false;

while($mos=mysqli_fetch_array($resul)){
  $conta=true;
}
  // si hay usuarios?
  ?>
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
</div>
	<?php endif; ?>
