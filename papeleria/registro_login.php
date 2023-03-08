<!DOCTYPE html>
<html>
<head>
	<title>Registro de usuarios</title>
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
		$bd="user";
		$conexion=mysqli_connect($host,$usuario,$pass);
		mysqli_select_db($conexion,$bd);
		return $conexion;
		}
			$con = conectar();
		?>
		<div>
			<form action="registrar_login.php" method="POST" enctype="multipart/form-data">
			<h1>Registro</h1>
				<label>Id rol</label><br>
				<input type="text" name="id_rol" maxlength="30" value="2" readonly><br>
				
				<label>Nombre</label><br>
				<input type="text" name="Nombres" maxlength="50"><br>

				<label>Apellido paterno</label><br>
				<input type="text" name="Ap" maxlength="50"><br>

				<label>Apellido materno</label><br>
				<input type="text" name="Am" maxlength="50"><br>

                <label>Edad</label><br>
				<input type="text" name="Edad" maxlength="2"><br>

                <label>Usuario</label><br>
				<input type="text" name="Usuario" maxlength="20"><br>

                <label>Password</label><br>
				<input type="password" name="password" maxlength="20"><br>

                <label>Correo</label><br>
				<input type="text" name="Correo" maxlength="40"><br>

				<input type="submit" name="agregar" value="AGREGAR">

				<a href="login.php">REGRESAR</a>
			</form>
		</div>
</body>
</html>