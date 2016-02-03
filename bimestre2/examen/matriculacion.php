<?php

$conn = new mysqli('localhost' , 'root' , '', 'examen2');
if ($conn->connect_error) die($conn ->connect_error);

//Consulta para llenar select de niveles
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

//Consulta para obtener las materias por estudiante
$id = $_SESSION['est']['id_estudiante'];

$query1 = "SELECT * FROM estudiante_x_materia WHERE id_estudiante='$id'";
$result1 = $conn ->query($query1);
if (!$result1) die($conn ->error);

$rows1 = $result1 ->num_rows;
$est_mat = array();
for ($j = 0 ; $j < $rows1 ; ++$j){
  $result1 ->data_seek($j);
  $est_mat[] = $result1 ->fetch_array(MYSQLI_ASSOC); //MYSQLI_NUM , MYSQLI_BOTH
}
$result1 ->close();

//obtener materias
$mat = array();
foreach ($est_mat as $em) {
  $idm = $em['id_materia'];

  $query2 = "SELECT * FROM materia WHERE id_materia='$idm'";
  $result2 = $conn ->query($query2);
  if (!$result2) die($conn ->error);

  $mat[] = $result2 ->fetch_array(MYSQLI_ASSOC);
}

//Nombres de los niveles
$i=0;
foreach ($mat as $idn) {

  foreach ($niveles as $key) {
    if($key['id_nivel']==$idn['id_nivel'])
    {
      
      $mat[$i]['id_nivel']= $key['nombre'];
      $i++;
    }
  }

}

$result2 ->close();
$conn ->close();
?>



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
          <h3>Bienvenido/a <?php print_r($_SESSION['est']['nombres']); ?>, en esta pantalla puedes matricularte</h3>
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
              <div id="materias">

              </div>
            </div>
            </div>
          </form>

           
          </div>
          <div class="col-md-4 col-md-offset-5" >
            <button type="button" class="btn btn-primary" id="btn-regmaterias" data-loading-text="Registrando...">Registrar materias</button>
          </div>
          
          <div class="table-responsive col-md-12">
            <table class="table" >
              <th>
                <td>Materia</td>
                <td>Nivel</td>
                <td>Profesor</td>
              </th>
              <tbody>
                <?php
                $contador = 0;
                foreach ($mat as $m){

                  echo '<tr>';
                  echo '<td></td>';
                  echo '<td class="id" data-campo="id">'. $m['nombre'] .'</td>';
                  echo '<td class="id" data-campo="id">'. $m['id_nivel'] .'</td>';
                  echo '<td class="id" data-campo="id">'. $m['profesor'] .'</td>';
                  echo '</tr>';

                $contador++;
                }
                ?>
                
                </tbody>
            </table> 

          <a href="php/cerrar_sesion.php">cerrar sesión</a>
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