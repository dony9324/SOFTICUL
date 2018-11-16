<?php 

	$conexion=mysqli_connect('localhost','root','','inventario_cultural');

 ?>


<!DOCTYPE html>
<html>
<head>
	<title>mostrar datos</title>
</head>
<body>

<br>

	<table border="1" >
		<tr>
			<td>id</td>
			<td>nombre</td>
			<td>estado</td>
			<td>asociacion</td>
			<td>fecha_reguistro</td>	
		</tr>

		<?php 
		$sql="SELECT * from item";
		$result=mysqli_query($conexion,$sql);

		while($mostrar=mysqli_fetch_array($result)){
		 ?>

		<tr>
			<td><?php echo $mostrar['id'] ?></td>
			<td><?php echo $mostrar['nombre'] ?></td>
			<td><?php echo $mostrar['estado'] ?></td>
			<td><?php echo $mostrar['asociacion'] ?></td>
			<td><?php echo $mostrar['fecha_reguistro'] ?></td>
		</tr>
	<?php 
	}
	 ?>
	</table>

</body>
</html>