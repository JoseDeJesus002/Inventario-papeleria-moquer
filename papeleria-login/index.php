<?php
//include ("conexion.php");
function conectar()
{
	$host="localhost";
	$usuario="root";
	$pass="";
	$bd="papeleria";
	$conexion=mysqli_connect($host,$usuario,$pass);
	mysqli_select_db($conexion,$bd);
	return $conexion;
}
$con=conectar();
$sql = "SELECT * FROM productos";
$query=mysqli_query($con,$sql);
?>

<!DOCTYPE html>
<html>
<head>
	<title>Productos</title>
	<link rel="stylesheet" type="text/css" href="css/style.css">
	<link rel="stylesheet" type="text/css" href="css/style_menu.css">
	<style>
  body {
    background-color: #6fb98f;
  }
</style>

</head>
<body>
<ul>
  <li><a href="index.php" class="active">Inicio</a></li>
  <li><a href="agregar.php">Nuevo Registro</a></li>
  <li><a href="productos.php">Productos</a></li>
  <li><a href="productos_descontinuados.php">Productos descontinuados</a></li>
</ul>
<h1 align="center">Inicio</h1>
<form action="index.php" method="post">
<div align="center">
  <label for="search-id">Buscar por ID:</label>
  <input type="text" id="search-id" name="id" style="padding: 10px; font-size: 10px; width: 50%; margin: 10px;"> 
  <input type="submit" value="Buscar" style="padding: 10px; font-size: 10px;">
</div>
</form>
<?php
if(isset($_POST['id'])){
  $id = $_POST['id'];
  $sql = "SELECT * FROM productos WHERE id_productos = '$id'";
  $query=mysqli_query($con,$sql);
}
?>
<br>
		<table class="table" border="white">
			<thead>
				<tr>
					<th>Id del producto</th>
					<th>Nombre del producto</th>
					<th>Cantidad</th>
					<th>Precio</th>
					<th>Imagen</th>
					<th>Fecha de ingreso</th>
					<th>Hora de ingreso</th>
					<th>Editar</th>
					<th>Eliminar</th>
				</tr>

			</thead>
		<tbody>
			<?php
				while($row=mysqli_fetch_array($query))
				{

				
			?>
			<tr class="contenido">
				<td><?php echo $row['id_productos']?></td>
				<td><?php echo $row['nombre']?></td>
				<td><?php echo $row['cantidad']?></td>
				<td><?php echo $row['precio']?></td>
				<td><img width="100" src="data:<?php echo $row['tipo']; ?>;base64,<?php echo  base64_encode($row['imagen']); ?>"></td>
				<td><?php echo $row['fecha_ingreso']?></td>
				<td><?php echo $row['hora_ingreso']?></td>
				<td><a href="actualizar.php?id=<?php echo $row['id_productos'] ?>">
				<img src="img/editar.png" width="30" height="30">
				</a></td>
				<td><a href="eliminar.php?id=<?php echo $row['id_productos'] ?>">
				<img src="img/eliminar.png" width="30" height="30">
				</a></td>
			</tr>

			<?php
				}
			?>
		</tbody>
	</div>
</body>
</html>




