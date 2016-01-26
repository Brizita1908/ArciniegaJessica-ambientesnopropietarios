<?php

$conn = new mysqli('localhost' , 'root' , '', 'registro');
if ($conn->connect_error) die($conn ->connect_error);

$query = "SELECT * FROM provincias";
$result = $conn ->query($query);
if (!$result) die($conn ->error);

$rows = $result ->num_rows;
$provincias = array();
for ($j = 0 ; $j < $rows ; ++$j){
  $result ->data_seek($j);
  $provincias[] = $result ->fetch_array(MYSQLI_ASSOC); //MYSQLI_NUM , MYSQLI_BOTH
}
// print_r($provincias);

$query1 = "SELECT * FROM usuarios";
$res = $conn ->query($query1);
if (!$res) die($conn ->error);

$rows1 = $res ->num_rows;
$usuarios = array();
for ($j = 0 ; $j < $rows1 ; ++$j){
  $res ->data_seek($j);
  $usuarios[] = $res ->fetch_array(MYSQLI_ASSOC); //MYSQLI_NUM , MYSQLI_BOTH
}



$result ->close();
$res ->close();
$conn ->close();
?>

<!DOCTYPE html> 
<html lang="es"> 
<head> 
  <meta charset="utf-8"> 
  <title>Registro de Usuario AJAX</title>

  <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">

</head>
<body>
  <div class="container">
    <h4>Registro de Usuarios</h4>
    <div id="success" class="success"></div>
    <div id="error" class="error"></div>

    <!-- Button trigger modal -->
    <button type="button" class="btn btn-primary btn-lg" data-toggle="modal" data-target="#contact-form">
      Registrarse
    </button>

    <!-- Modal -->
    <div class="modal fade" id="contact-form" tabindex="-1" role="dialog" aria-labelledby="RegistroLabel">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            <h4 class="modal-title" id="RegistroLabel">Formulario de Registro</h4>
          </div>
          <div class="modal-body">
            <form id="contacto">
              <div class="form-group">
              <label for="nombre">Nombre</label>
                <input type="text" name="nombre" class="form-control" id="nombre" placeholder="Nombre">
              </div>
              <div class="form-group">
              <label for="apellido">Apellido</label>
                <input type="text" name="apellido" class="form-control" id="apellido" placeholder="Apellido">
              </div>
              <div class="form-group">
                <label for="email">Email</label>
                <input type="email" name="email" class="form-control" id="email" placeholder="Email">
              </div>
              <div class="form-group">
                <label for="telefono">Teléfono</label>
                <input type="text" name="telefono" class="form-control" id="telefono" placeholder="Teléfono">
              </div>
              <div class="form-group">
                <label for="direccion">Dirección</label>
                <input type="text" name="direccion" class="form-control" id="direccion" placeholder="Dirección">
              </div>
              <div class="form-group">
                <label for="provincia">Provincia</label>
                <select class="form-control" id="selprovincia" name="provincia">
                  <option value="">Seleccione...</option>
                  <?php
                    foreach($provincias as $pr){
                      echo '<option value="' . $pr['cod_provincia'] . '">' . $pr['provincia'] . '</option>';
                    }
                  ?>
                </select>
              </div>
              <div class="form-group">
                <label for="canton">Cantón</label>
                <select class="form-control" id="selcanton" name="canton">
                  <option value="">Seleccione...</option>
                </select>
              </div>
              <div class="form-group">
                <label for="parroquia">Parroquia</label>
                <select class="form-control" id="selparroquia" name="parroquia">
                  <option value="">Seleccione...</option>
                </select>
              </div>
              <div class="form-group">
                <label for="usuario">Usuario</label>
                <input type="text" name="usuario" class="form-control" id="usuario" placeholder="Usuario">
              </div>
              <div class="form-group">
                <label for="contrasena">Contraseña</label>
                <input type="password" name="contrasena" class="form-control" id="contrasena" placeholder="Contraseña">
              </div>
              <div class="form-group">
                <label for="vercontrasena">Verificar Contraseña</label>
                <input type="password" name="vercontrasena" class="form-control" id="vercontrasena" placeholder="Contraseña">
              </div>
            </form>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
            <button type="button" class="btn btn-primary" id="btn-enviar" data-loading-text="Enviando...">Enviar</button>
          </div>
        </div>
      </div>
    </div>
  </div>

  <div class="table-responsive">
    <form id="act">
    <table class="table" id="tabla_usuarios">
      <th>
        <td>Nombre</td>
        <td>Apellido</td>
        <td>Email</td>
        <td>Direccion</td>
        <td>Usuario</td>
      </th>

      <?php
      $contador = 1;
      foreach ($usuarios as $us) {

        echo '<tr>';
        echo '<td></td>';
        echo '<td id="nombre' . $contador . '">'.$us['nombre'].'</td>';
        echo '<td id="apellido' . $contador . '">'.$us['apellido'].'</td>';
        echo '<td id="email' . $contador . '">'.$us['email'].'</td>';
        echo '<td id="direccion' . $contador . '">'.$us['direccion'].'</td>';
        echo '<td id="usuario' . $contador . '">'.$us['usuario'].'</td>';
        echo '<td id="boton' . $contador . '"></td>';
        echo '</tr>';

      $contador++;
      }
      ?>
    </table>
    </form>
  </div>
</div>

<script type="text/javascript" src="js/jquery.js"></script>
<script type="text/javascript" src="js/bootstrap.min.js"></script>
<script type="text/javascript" src="js/jquery.validate.js"></script>
<script type="text/javascript" src="js/additional-methods.js"></script>

<script type="text/javascript" src="js/main.js"></script>
</body>
</html>