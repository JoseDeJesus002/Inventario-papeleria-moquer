<!DOCTYPE html>
<html>
<head>
	<title>Registro de producto</title>
	<link rel="stylesheet" type="text/css" href="css/styleagregar.css">
</head>
<body>

		<?php
		//include("conexion.php");
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
			$con = conectar();
			date_default_timezone_set('America/Mexico_City');
			$fecha=date("d/m/Y");
			$hora=date('h:i:s');

			if (isset($_REQUEST['agregar'])) {
				if (isset($_FILES['imagen']['name'])) {
					//$tipoArchivo = $_FILES['imagen']['type'];
					//$imagenSubida = fopen($_FILES['foto']['tmp_name'], 'r');
					$binariosImagen = fread($imagenSubida, $tamanoArchivo);
					$binariosImagen = mysqli_escape_string($con, $binariosImagen);
					$permitido=array("image/png","image/jpeg");
					if( in_array($tipoArchivo,$permitido) ==false ){
						die("Archivo no permitido");
					}
				}
			}
		?>
		<div>
			<form action="insertar.php" method="POST" enctype="multipart/form-data">
				<label>Id del productos</label><br>
				<input type="text" name="id_productos" maxlength="11"><br>

				<label>Nombre</label><br>
				<input type="text" name="nombre" maxlength="30"><br>
				
				<label>Cantidad</label><br>
				<input type="text" name="cantidad" maxlength="11"><br>

				<label>Precio</label><br>
				<input type="text" name="precio" maxlength="5"><br>

				<label>Descripcion</label><br>
				<input type="text" name="descripcion" maxlength="500"><br>

				<label>Categoria</label><br>
				
				<select name="categoria">
					<option value="0">Selecciona una categoria</option>
					<?php
					$categoria = "SELECT * FROM categorias";
					$resultado=mysqli_query($con,$categoria);
					while ($row = mysqli_fetch_array($resultado)) 
					{
						echo '<option value="'.$row['id'].'">'.$row['categoria'].'</option>';
					}
					?>
				</select>

				<label>Imagen</label><br>
				<input type="file" name="imagen"><br>

				<label>Fecha de registro</label><br>
				<input type="datetime" name="fecha_ingreso" value="<?= $fecha?>" readonly><br>

				<label>Hora de registro</label><br>
				<input type="text" name="hora_ingreso" value="<?= $hora?>" readonly><br>

				<input type="submit" name="agregar" value="AGREGAR">

				<a href="index.php">REGRESAR</a>
			</form>
		</div>
</body>
</html>