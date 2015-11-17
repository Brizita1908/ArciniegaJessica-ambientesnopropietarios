<?php

if($_POST){
  $email = $_POST['email'];
   $contrasenia = md5($_POST['contrasenia']);
   

   //establecer conexion con la base de datos
   $conn1 = mysql_connect("localhost", "root", "");
mysql_select_db("sistema", $conn1);

$con_email = mysql_query("SELECT * FROM usuarios where email ='$email'", $conn1);

  // verificar si el campo no está vacio
   if(($email=="")||($contrasenia=="")){
      echo htmlentities('Ingrese su Email y/o Contraseña por favor');
    }
else {
	if(filter_var($email, FILTER_VALIDATE_EMAIL)){

    // verificamos que el usuario exista en la BDD
		$existe = mysql_num_rows($con_email);
		if($existe!==0){
		
      $datos = mysql_fetch_assoc($con_email); 

    // si el usuario existe en la BDD traemos la contrasena
      $contra_datos=$datos['contrasena'];
     }
    else{
      echo htmlentities('Error, ingrese su email y/o contraseña correctamente');
    }

    // verificar que la contrasena ingresada coincida con la almacenada en la BDD
    if($contrasenia==$contra_datos){
          // Si las contrasenas coinciden podemos iniciar sesion
             $_SESSION['email'] = $email;
             $_SESSION['contrasenia'] = $contrasenia;
      }
      else {
          echo htmlentities('Error, ingrese su email y/o contraseña correctamente');
      }
    }
    else {
      echo htmlentities('Error, ingrese su email y/o contraseña correctamente');
    }
  }
}

if(isset( $_SESSION['email'] )&&isset( $_SESSION['contrasenia'])) {
  http_redirect('inicio.php');
}

$msg = (isset($_GET['exito']) ? $_GET['exito'] : '');