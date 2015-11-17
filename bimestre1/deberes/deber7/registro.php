<?php require('php/p_registro.php'); ?>
<?php
echo '<html>';
echo '<head>';
echo '<meta charset="utf-8">';
echo '<title>Pagina 100% PHP</title>';
echo '<style>';
echo 'body{
	color: #0000CC;
}
div{
	width:100%;
}
#estructura {
	width: 100%;
	margin-top: 10px;
}
#contenido{
	width: 460px;
	margin-left:auto;
	margin-right:auto;
}
.bd{
	background-color:#F4F5F9;
	padding:20px;
}
table, tr, td{
	text-align: left;
}
label{
	display: block;
	float: right;
	text-align: right;
	color: #0000CC;
}
.btn{
	background-color: #339933;
	padding: 5px 20px;
	color: white;
}
.txt{
	width:300px;
	height: 35px;
}
select{
	height: 35px;
}
.mes{
	width:120px;
}
.da{
	width:60px;
}
a{
	text-decoration:none;
	color: #0000CC;
}

';
echo '</style>';
echo '</head>';
echo '<body>';
echo '<form action="php/p_registro.php" method="post">';
echo '<div id="estructura">';
echo '<div id="contenido">';
echo '<div id="cab">';
echo '<h1>Regístrate</h1>';
echo '<h2>Es gratis (y lo seguirá siendo).</h2>';
echo '</div>';
echo '<div class="bd">';
echo '<table>';
echo '<tr>';
echo '<td><label for="nombre">Nombre:</label></td>';
echo '<td><input class="txt" type="text" id="nombre" name="nombre" value=""></td>';
echo '</tr>';
echo '<tr>';
echo '<td><label for="apellidos">Apellidos:</label></td>';
echo '<td><input class="txt" type="text" id="apellidos"name="apellidos" value=""></td>';
echo '</tr>';
echo '<tr>';
echo '<td><label for="email">Tu Email:</label></td>';
echo '<td><input class="txt" type="text" id="email" name="email" value=""></td>';
echo '</tr>';
echo '<tr>';
echo '<td><label for="correo">Escribe de nuevo<br> el correo<br> electrónico:</label></td>';
echo '<td><input class="txt" type="text" id="correo" name="correo" value=""></td>';
echo '</tr>';
echo '<tr>';
echo '<td><label for="contrasena">Contraseña<br> nueva:</label></td>';
echo '<td><input class="txt" type="password" id="contrasena" name="contrasena" value=""></td>';
echo '</tr>';
echo '<tr>';
echo '<td><label for="sexo">Sexo:</label></td>';
echo '<td>';
echo '<select name="sexo" id="sexo">
<option selected hidden>Selecciona el sexo:</option>
<option value="Mujer">Mujer</option>
<option value="Hombre">Hombre</option>
</select>';
echo '</td>';
echo '</tr>';
echo '<tr>';
echo '<td><label for="fecha">Fecha de<br> nacimiento:</label></td>';
echo '<td>';
echo '<select class="da" name="dia" id="dia">
<option selected>Dia:</option>';
	for ($i=1; $i<=31; $i++)
	{echo '<option value="'.$i.'">'.$i.'</option>';}
echo '</select>';
echo '<select class="mes" name="mes" id="mes">
<option selected>Mes:</option>
<option value="01">ene</option>
<option value="02">feb</option>
<option value="03">mar</option>
<option value="04">abr</option>
<option value="05">may</option>
<option value="06">jun</option>
<option value="07">jul</option>
<option value="08">ago</option>
<option value="09">sep</option>
<option value="10">oct</option>
<option value="Noviembre">nov</option>
<option value="Diciemnre">dic</option>
</select>';
echo '<select class="da" name="anio" id="anio">
<option selected>Año:</option>';
	for ($i=1905; $i<=2015; $i++)
	{echo '<option value="'.$i.'">'.$i.'</option>';}
echo '</select>';
echo '</td>';
echo '</tr>';
echo '<tr>';
echo '<td></td>';
echo '<td><a href="pagina_deber.html">¿Por qué debo proporcionar esta información?</a></td>';
echo '</tr>';
echo '<tr>';
echo '<td></td>';
echo '<td><button id="registrate" name="registrate" class="btn">Regístrate</button></td>';
echo '</tr>';
echo '</table>';
echo '</div>';
echo '</div>';
echo '</div>';
echo '</body>';
echo '</html>';