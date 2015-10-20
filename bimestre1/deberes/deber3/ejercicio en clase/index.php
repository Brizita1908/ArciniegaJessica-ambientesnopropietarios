<?php
echo '<html>';
echo '<head>';
echo '<meta charset="utf-8">';
echo '<title>Pagina 100% PHP</title>';
echo '<style>';
echo 'h1{
	text-align:center;
}
.impar{
	background-color:blue;
}
.par{
	background-color:red;
}
table, th, td{
	border: 1px solid #000000;
	border-collapse:collapse;
}
';
echo '</style>';
echo '</head>';
echo '<body>';
echo '<h1>Este es el cuerpo de la página</h1>';
echo '<p>La siguiente tabla es general...(elemento <code>&lt;ol&lt;</code>)</p>';
echo '<ol>';
echo '<li>La tabla...</li>';
echo '<li>La tabla...</li>';
echo '<li>La tabla...</li>';
echo '<li>La tabla...</li>';
echo '</ol>';

echo '<table>';
echo '<thead>';
echo '<tr>';
echo '<th>Columna 1</th>';
echo '<th>Columna 2</th>';
echo '</tr>';
echo '</thead>';
echo '<tbody>';

$i=0;
$es_impar=true;
while($i <10){
	echo '<tr class="'.($es_impar ? 'impar' : 'par').'">';
	$es_impar=($es_impar ? false:true);
	for($j=0;$j<2;$j++){
		echo '<td>';
		echo ++$i;
		echo '</td>';
	}
	echo '</tr>';
}

echo '</tbody>';
echo '</table>';
echo '</body>';
echo '</html>';