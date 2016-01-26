<?php
$result = "";
//print_r($_POST);
if ( $_POST ) {
  $nombre = htmlentities($_POST['nombre']);
  $apellido = htmlentities($_POST['apellido']);
  $email = htmlentities($_POST['email']);
  $telefono = htmlentities($_POST['telefono']);
  $direccion = htmlentities( $_POST['direccion'] );
  $provincia = htmlentities( $_POST['provincia'] );
  $canton = htmlentities( $_POST['canton'] );
  $parroquia = htmlentities( $_POST['parroquia'] );
  $usuario = htmlentities($_POST['usuario']);
  $contra = md5($_POST['contrasena']);
  

  $conn = new mysqli('localhost', 'root', '', 'registro');
  if($conn->connect_error) die($conn->connect_error);
 
  $query= "INSERT INTO usuarios(nombre,apellido,email,telefono,direccion,provincia,canton,parroquia,usuario,contrasena)
                VALUES ('$nombre','$apellido','$email','$telefono','$direccion','$provincia','$canton','$parroquia','$usuario','$contra')";

  $result=$conn->query($query);

    if(!$result){
      $res = 'Existi&oacute; un error al insertar.' . $conn->error;
    }else {
      $res = 'Mensaje enviado con &eacute;xito.';
    }

}

echo json_encode( $res );
?>