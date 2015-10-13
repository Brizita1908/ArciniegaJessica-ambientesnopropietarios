
<?php
function generar_tabla(){
	echo '<table>';
	$i=0;
		while($i<100){
			echo '<tr>';
			for ($j=0; $j < 10; $j++) { 
				$es_primo = es_primo($i);
				echo '<td>';
				if ($es_primo == true) {
					echo '<td class="primo">';
				}
				else {
					echo '<td>';
				}
				echo $i;
				echo '</td>';
				$i++;
			}
			echo '</tr>';
		}
	echo '</table>';		
}

function es_primo($num){
$verf=true;
	for ($j=2; $j < ($num/2); $j++) { 
		if(($num % $j)==0){
			$verf = false;
			break;
		}	
		else{
			$verf = true;
		}
	}
	return $verf;
}

?>

<html>	
	<head>
		<title></title>
		<link rel="stylesheet" type="text/css" href="css/estilos.css">
	</head>
	<body>
		<?php generar_tabla(); ?>
	</body>
</html>			


