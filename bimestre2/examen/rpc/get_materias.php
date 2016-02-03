<?php

if($_POST){

  $nivel = $_POST['nivel'];

  $conn = new mysqli('localhost' , 'root' , '', 'examen2');
  if ($conn->connect_error) die($conn ->connect_error);

  $query = "SELECT * FROM materia WHERE id_nivel = '$nivel'";
  $result = $conn ->query($query);
  if (!$result) die($conn ->error);

  $rows = $result ->num_rows;
      
  $materias = array();

  for ($j = 0 ; $j < $rows ; ++$j){
    $result ->data_seek($j);
    $materias[] = $result ->fetch_array(MYSQLI_ASSOC); //MYSQLI_NUM , MYSQLI_BOTH
  }

  $query1 = "SELECT * FROM nivel WHERE numero = '$nivel'";
  $result1 = $conn ->query($query1);
  if (!$result1) die($conn ->error);
  $niv = $result1 ->fetch_array(MYSQLI_ASSOC);

  $options = "";
  $options .= '<h4>Lista de materias disponibles en el nivel'.$niv["nombre"].'</h4>';
  foreach ($materias as $ma) {
    $options .= '<div class="checkbox"><label><input type="checkbox" name="elementos" id="elemento'. $ma['id_materia'] .'" value="' . $ma['id_materia'] . '">' . $ma["nombre"] . '</label></div>';
  }

  

  echo $options;

  $result ->close();
  $conn ->close();

  
} else {
  echo "No se han recibido datos";
}  

?>