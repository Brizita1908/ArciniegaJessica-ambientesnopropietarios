<?php

$conn = new mysqli('localhost' , 'root' , '', 'examen2');
if ($conn->connect_error) die($conn ->connect_error);

$query = "SELECT * FROM nivel";
$result = $conn ->query($query);
if (!$result) die($conn ->error);

$rows = $result ->num_rows;
$niveles = array();
for ($j = 0 ; $j < $rows ; ++$j){
  $result ->data_seek($j);
  $niveles[] = $result ->fetch_array(MYSQLI_ASSOC); //MYSQLI_NUM , MYSQLI_BOTH
}


$result ->close();
$conn ->close();
?>


<!DOCTYPE html> 
<html lang="es"> 
<head> 
  <meta charset="utf-8"> 
  <title>Matriculacion</title>

  <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">

</head>
  <body>
    <div class="container">
      <div class="row">
        <div class="col-md-12">
          <h3>Bienvenido ..., en esta pantalla puedes matricularte</h3>
          <form id="matricula">
            <div class="col-md-5">
              <div class="form-group">
                <label for="nivel">Selecciona el nivel:</label>
                <select class="form-control" id="selnivel" name="nivel">
                  <option value="">Seleccione...</option>
                  <?php
                    foreach($niveles as $nv){
                      echo '<option value="' . $nv['numero'] . '">' . $nv['nombre'] . '</option>';
                    }
                  ?>
                </select>
              </div>
            </div>
            <div class="col-md-7">
              <h4>Lista de materias disponibles en ... nivel</h4>
              <div id="materias">

              </div>
            
            </div>
            </div>
          </form>
          <button type="button" class="btn btn-primary" id="btn-regmaterias" data-loading-text="Registrando...">Registrar materias</button>
          
        </div>
      </div>
    </div>
            



    <script type="text/javascript" src="js/jquery.js"></script>
    <script type="text/javascript" src="js/bootstrap.min.js"></script>
    <script type="text/javascript" src="js/jquery.validate.js"></script>
    <script type="text/javascript" src="js/additional-methods.js"></script>

    <script type="text/javascript" src="js/main.js"></script>
  </body>
</html>