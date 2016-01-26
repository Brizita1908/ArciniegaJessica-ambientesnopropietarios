<?php

print_r($_POST);

//   $conn = new mysqli('localhost' , 'root' , '', 'registro');
//   if ($conn->connect_error) die($conn ->connect_error);

//   $query="SELECT * FROM usuarios";
//     $result = $conn->query($query);
//     if(!$result) die($conn->error);
//     $rows = $result->num_rows;


//   $usuarios = array();
//   for ($j = 0 ; $j < $rows ; ++$j){
//     $result ->data_seek($j);
//     $usuarios[] = $result ->fetch_array(MYSQLI_ASSOC); //MYSQLI_NUM , MYSQLI_BOTH
//   }




// if($_POST)
// {
//   $id=empty($_POST['id']) ? "" : $_POST['id'] ;

// 	$nombre = htmlentities($_POST['nomb']);
//   $apellido = htmlentities($_POST['apellido']);
//   $email = htmlentities($_POST['email']);
//   $telefono = htmlentities($_POST['telefono']);
//   $direccion = htmlentities( $_POST['direccion'] );
//   $usuario = htmlentities($_POST['usuario']);


// printf($nombre);


//     $q_update1 ="UPDATE usuarios SET $nombre = '".$value."' WHERE ID = '".$id."'";
//     $res1 = $conn->query($q_update1);
//     if (!$res1) die($conn ->error);
//     $q_update2 ="UPDATE usuarios SET $apellido = '".$value."' WHERE ID = '".$id."'";
//     $res2 = $conn->query($q_update2);
//     if (!$res2) die($conn ->error);
//     $q_update3 ="UPDATE usuarios SET $email = '".$value."' WHERE ID = '".$id."'";
//     $res3 = $conn->query($q_update3);
//     if (!$res3) die($conn ->error);
  


// } 


?>