<nav class="navbar navbar-inverse navbar-fixed-top">
  <div class="container">
    <div class="navbar-header">
      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <a class="navbar-brand" href="index.php">SOFTICUL</a>
    </div>
    <div id="navbar" class="collapse navbar-collapse">
      <ul class="nav navbar-nav">

        <?php if (!isset($_SESSION["usuario"])) {?>
        <?php } else {
          ?>
          <?php if ($_SESSION["usuario"]["privilegio"] == 1) {?>
            <li><a href="admin.php">Admin</a></li>
          <?php } ?>
          <?php
          $conexion=mysqli_connect('localhost','root','','softicul');
          $sql="SELECT * from item WHERE estado = 1";
          $result=mysqli_query($conexion,$sql);
          while($mostrar=mysqli_fetch_array($result)){
            ?> <li><a href="vistasItem.php?id=<?php echo $mostrar['id']; ?>"><?php echo $mostrar['nombre'] ;?></a></li>
          <?php } ?>
          <li><a href="nuevoItem.php"><span class="glyphicon glyphicon-plus"></span> Nuevo item</a></li>
          <?php
        }?>
      </ul>
    </div><!--/.nav-collapse -->
  </div>
</nav>
