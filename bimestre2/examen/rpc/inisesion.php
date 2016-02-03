<?php

print_r($_POST);

if($_POST){
  $email = $_POST['email'];
  $contrasena = md5($_POST['contrasena']);

  $conn = new mysqli('localhost' , 'root' , '', 'examen2');
if ($conn->connect_error) die($conn ->connect_error);

  $con_est = "SELECT * FROM estudiante where email ='$email'";
    
  $result = $conn ->query($con_est);
  if (!$result) die($conn ->error);

  $rows = $result ->num_rows;

    if($rows>0){
       
      $datos = $result ->fetch_array(MYSQLI_ASSOC);
      $contra_datos=$datos['contrasena'];

      if($contrasena==$contra_datos){
          // Si las contrasenas coinciden podemos iniciar sesion
             //http_redirect("matriculacion.php",true);
             echo "false";
      }
      else {
          echo htmlentities('Error, ingrese su email y/o contraseña correctamente');
      }



    }else{
        echo "Error, ingrese su email y/o contraseña correctamente";
    }

   

}