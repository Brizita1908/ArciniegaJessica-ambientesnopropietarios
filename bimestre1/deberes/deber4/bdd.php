<?php
//echo '<pre>';
//print_r($_POST);
//echo '</pre>';



if($_POST){



	$nombre=$_POST['nombre'];
	$apellidos=$_POST['apellidos'];
	$email=$_POST['email'];
	$correo=$_POST['correo'];
	$contrasena=md5($_POST['contrasena']);
	$sexo=$_POST['sexo'];
	$dia=$_POST['dia'];
	$mes=$_POST['mes'];
	$anio=$_POST['anio'];

	//Verificando que los correos ingresados sean iguales
	if($email!==$correo){
		echo htmlentities('Los correos electronicos no coinciden');
	}
	
	//estableciendo conexion con bdd
	$conn = new mysqli('localhost', 'root', '', 'sistema');
	if($conn->connect_error) die($conn->connect_error);
	
	//query para insertar datos
	$query="INSERT INTO usuarios
		(nombre, apellidos, email, contrasena, sexo, fecha)
		VALUES('$nombre','$apellidos', '$email', '$contrasena', '$sexo', '$anio-$mes-$dia')";
	
	$result=$conn->query($query);
	if($result) die($conn->error);


	//Consulta para saber si el correo ingresado ya existe
	$conn1 = mysql_connect("localhost", "root", "");
    mysql_select_db("sistema", $conn1);

    $con_email = mysql_query("SELECT * FROM usuarios where email ='$email'", $conn1);
    $existe = mysql_num_rows($con_email);

      if($existe!==0){
		echo htmlentities('El correo electronico ya se encuentra registrado');
	}




}