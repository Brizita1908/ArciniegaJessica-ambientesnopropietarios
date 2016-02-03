<?php

if($_POST){

  

  $email = htmlentities($_POST['email']);
  $contrasena = htmlentities(md5($_POST['contrasena']));

  $conn = new mysqli('localhost' , 'root' , '', 'examen2');
if ($conn->connect_error) die($conn ->connect_error);

  $con_est = "SELECT * FROM estudiante where email ='$email' AND contrasena='$contrasena'";
    
  $result = $conn ->query($con_est);
  if (!$result) die($conn ->error);

  $rows = $result ->num_rows;

  $datos = $result ->fetch_array(MYSQLI_ASSOC);

  if($rows!=0){
    echo 'true';

    $_SESSION['est'] = $datos;
    
  }else{
    echo 'false';
  }

}
