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
echo '<div id="estructura">';
echo '<div id="contenido">';
echo '<div id="cab">';
echo '<h1>Regístrate</h1>';
echo '<h2>Es gratis (y lo seguirá siendo).</h2>';
echo '</div>';
echo '<div class="bd">';
echo '<table>';
echo '<tr>';
echo '<td><label>Nombre:</label></td>';
echo '<td><input class="txt" type="text" name="nombre"></td>';
echo '</tr>';
echo '<tr>';
echo '<td><label>Apellidos:</label></td>';
echo '<td><input class="txt" type="text" name="apellidos"></td>';
echo '</tr>';
echo '<tr>';
echo '<td><label>Tu Email:</label></td>';
echo '<td><input class="txt" type="text" name="email"></td>';
echo '</tr>';
echo '<tr>';
echo '<td><label>Escribe de nuevo<br> el correo<br> electrónico:</label></td>';
echo '<td><input class="txt" type="text" name="email2"></td>';
echo '</tr>';
echo '<tr>';
echo '<td><label>Contraseña<br> nueva:</label></td>';
echo '<td><input class="txt" type="text" name="contraseña"></td>';
echo '</tr>';
echo '<tr>';
echo '<td><label>Sexo:</label></td>';
echo '<td>';
echo '<select name="sexo" id="sexo">
<option selected hidden>Selecciona el sexo:</option>
<option value="Mujer">Mujer</option>
<option value="Hombre">Hombre</option>
</select>';
echo '</td>';
echo '</tr>';
echo '<tr>';
echo '<td><label>Fecha de<br> nacimiento:</label></td>';
echo '<td>';
echo '<select class="da" name="dia" id="dia">
<option selected>Dia:</option>';
	for ($i=1; $i<=31; $i++)
	{echo '<option value="'.$i.'">'.$i.'</option>';}
echo '</select>';
echo '<select class="mes" name="mes" id="mes">
<option selected>Mes:</option>
<option value="Enero">ene</option>
<option value="Febrero">feb</option>
<option value="Marzo">mar</option>
<option value="Abril">abr</option>
<option value="Mayo">may</option>
<option value="Junio">jun</option>
<option value="Julio">jul</option>
<option value="Agosto">ago</option>
<option value="Septiembre">sep</option>
<option value="Octubre">oct</option>
<option value="Noviembre">nov</option>
<option value="Diciemnre">dic</option>
</select>';
echo '<select class="da" name="año" id="año">
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
echo '<td><input class="btn" type="submit" value=Regístrate /></td>';
echo '</tr>';
echo '</table>';
echo '</div>';
echo '</div>';
echo '</div>';
echo '</body>';
echo '</html>';