<?php



if($_POST){

  $materias = $_POST['materias'];
  $id = $_SESSION['est']['id_estudiante'];

  $conn = new mysqli('localhost' , 'root' , '', 'examen2');
  if ($conn->connect_error) die($conn ->connect_error);
  
  foreach ($materias as $ma) {
    $query = "INSERT INTO estudiante_x_materia(id_estudiante,id_materia)
                VALUES ('$id','".$ma."')";
    $result = $conn ->query($query);
    if (!$result) die($conn ->error);
  }
  



  
}