<?php
$result = "";
//print_r($_POST);
if ( $_POST ) {
  $nombre = htmlentities($_POST['nombre']);
  $apellido = htmlentities($_POST['apellido']);
  $email = htmlentities($_POST['email']);
  $telefono = htmlentities($_POST['telefono']);
  $direccion = htmlentities( $_POST['direccion'] );
  $usuario = htmlentities($_POST['usuario']);
  $contra = htmlentities($_POST['contrasena']);
  

  $conn = new mysqli('localhost', 'root', '', 'registro');
  if($conn->connect_error) die($conn->connect_error);
 
  $query= "INSERT INTO users(nombre,apellido,email,telefono,direccion,usuario,contrasena)
                VALUES ('$nombre','$apellido','$email','$telefono','$direccion','$usuario','$contra')";

  $result=$conn->query($query);

    if(!$result){
      $res = 'Existi&oacute; un error al insertar.' . $conn->error;
    }else {
      $res = 'Mensaje enviado con &eacute;xito.';
    }

}

echo json_encode( $res );
?>