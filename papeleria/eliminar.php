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
    $con=conectar();

    $id=$_GET['id'];

    $sql="DELETE FROM productos WHERE id_productos = '$id'";
    $query = mysqli_query($con,$sql);

    if($query)
    {
        header("Location:index.php");
    }
    mysqli_close($con);
?>