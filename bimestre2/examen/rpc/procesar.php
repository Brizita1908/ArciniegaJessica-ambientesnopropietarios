<?php

if ( $_POST ) {
  $nombres = htmlentities($_POST['nombres']);
  $apellidos = htmlentities($_POST['apellidos']);
  $email = htmlentities($_POST['email']);
  $contra = md5($_POST['contrasena']);
  

  $conn = new mysqli('localhost', 'root', '', 'examen2');
  if($conn->connect_error) die($conn->connect_error);
 
  $query= "INSERT INTO estudiante(nombres,apellidos,email,contrasena)
                VALUES ('$nombres','$apellidos','$email','$contra')";

  $result=$conn->query($query);

    if($result){
      echo 'true';
    }else {
      echo 'false';
    }

}