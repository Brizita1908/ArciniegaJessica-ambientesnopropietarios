<?php

if($_POST){


	$nombre=$_POST['nombre'];
	$apellidos=$_POST['apellidos'];
	$edad=$_POST['edad'];
	$peso=$_POST['peso'];
	$genero=$_POST['genero'];
	$estado=$_POST['estado'];
	
	//estableciendo conexion con bdd
	$conn = new mysqli('localhost', 'root', '', 'examen');
	if($conn->connect_error) die($conn->connect_error);
	
	//query para insertar datos
	$query="INSERT INTO datos
		(nombre, apellidos, edad, peso, genero, estado)
		VALUES('$nombre','$apellidos', '$edad', '$peso', '$genero', '$estado')";
	
	$result=$conn->query($query);
	if($result){
		echo htmlentities('Datos ingresados correctamente');
	}
	 else{die($conn->error);}


	


}

