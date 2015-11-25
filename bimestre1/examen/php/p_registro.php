<?php
//echo '<pre>';
//print_r($_POST);
//echo '</pre>';



if($_POST){


	$email=$_POST['email'];
	$contrasenia=md5($_POST['contrasenia']);
	$ver_contrasenia=md5($_POST['ver_contrasenia']);

	//estableciendo conexion con bdd
	$conn = new mysqli('localhost', 'root', '', 'examen');
	if($conn->connect_error) die($conn->connect_error);


	//Consulta para saber si el correo ingresado ya existe
	$conn1 = mysql_connect("localhost", "root", "");
    mysql_select_db("examen", $conn1);

    $con_email = mysql_query("SELECT * FROM usuarios where email ='$email'", $conn1);
    $existe = mysql_num_rows($con_email);


     if($existe!==0){
		echo htmlentities('El correo electronico ya se encuentra registrado');
	}
	else {
		//Verificando que las contraseñas ingresadas sean iguales
		if($contrasenia!==$ver_contrasenia){
			echo htmlentities('Las contraseñas no coinciden');
		}
		else {
			//query para insertar datos
			$query="INSERT INTO usuarios
				(Email, Contrasena)
				VALUES('$email', '$contrasenia')";
			
			$result=$conn->query($query);
			if($result) die($conn->error);

			echo htmlentities('Datos registrados correctamente');
		}
	}




}