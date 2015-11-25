<?php 
include('php/p_inicio.php');


echo '<!DOCTYPE html>';
echo '<html>';
echo '<head>';
echo '<link rel="stylesheet" href="css/estilos.css">';
echo '<meta charset="utf-8">';
echo '<title>Registro de Clientes</title>';
echo '</head>';
echo '<body>';
echo '<div class="capa1">';
echo '<div class="capa2">';
echo '<form action="php/p_inicio.php" method="post">';
echo '<div class="datos">';
echo '<div>';
echo '<label for="nombre">Nombre</label>';
echo '<input type="text" id="nombre" name="nombre" value="">';
echo '</div>';
echo '<div>';
echo '<label for="apellidos">Apellidos</label>';
echo '<input type="text" id="apellidos" name="apellidos" value="">';
echo '</div>';
echo '<div>';
echo '<label for="edad">Edad:</label>';
echo '<select name="edad" id="edad">
<option selected hidden>Selecciona su edad:</option>
<option value="-20">Menos de 20 años</option>
<option value="20-39">Entre 20 y 39 años</option>
<option value="40-59">Entre 40 y 59 años</option>
<option value="+60">Más de 60 años</option>
</select>';
echo '</div>';
echo '<div>';
echo '<label for="peso">Peso</label>';
echo '<input type="text" id="peso" name="peso" value="">';
echo '<div><label>Género:</label></div>
	  <label for="hombre">Hombre</label>
	  <input type="radio" id="hombre" name="genero" value="Hombre">
	  <label for="mujer">Mujer</label>
	  <input type="radio" id="mujer" name="genero" value="Mujer" checked="checked">';
echo '<div><label>Estado Civil:</label></div>
	  <label for="soltero">Soltero</label>
	  <input type="radio" id="soltero" name="estado" value="soltero" checked="checked">
	  <label for="casado">Casado</label>
	  <input type="radio" id="casado" name="estado" value="casado">
	  <label for="otro">Otro</label>
	  <input type="radio" id="otro" name="estado" value="otro">';
echo '</div>';
echo '<div>';
echo '<button id="registrar" name="registrar">Registrar</button>';
echo '</div>';
echo '<div>';
echo '<a href="php/cerrar_sesion.php">cerrar sesión</a>';
echo '</div>';
echo '<div>';

 //Para mostrar la tabla con los datos registrados
	//establecer conexion con la base de datos
	$conn = new mysqli('localhost', 'root', '', 'examen');
	if($conn->connect_error) die($conn->connect_error);

	$query = "SELECT * FROM datos";
	$results = $conn->query($query);
	if(!results) die($conn->error);
echo '<table>';
echo '<tr>';
echo '<th>Nombre</th>';
echo '<th>Apellidos</th>';
echo '<th>Edad</th>';
echo '<th>Peso</th>';
echo '<th>Género</th>';
echo '<th>Estado Civil</th>';
echo '</tr>';
	$rows = $results->num_rows;
	for($j=0;$j<$rows;++$j)
	{
		echo '<tr>';
		$results->data_seek($j);
		$row=$results->fetch_array(MYSQLI_ASSOC);
		echo 'Nombre'.$row['nombre'].'<br>';
		echo 'Apellido'.$row['apellidos'].'<br>';
		echo 'edad'.$row['edad'].'<br>';
		echo 'peso'.$row['peso'].'<br>';
		echo 'genero'.$row['genero'].'<br>';
		echo 'estado'.$row['estado'].'<br>';
echo '</tr>';
	}






echo '</table>';
echo '</div>';
echo '</div>';
echo '</div>';
echo '</div>';
echo '</body>';
echo '</html>';

