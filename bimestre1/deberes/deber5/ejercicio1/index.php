<?php
//include('estilos.css');

$valor= empty($_POST['valor']) ? 0 : $_POST['valor'];

//calcular valor equivalente

if ($valor== 0){
	$equivalente=0;
}
elseif($_POST['convertir_a']=='euros'){
	$equivalente=$valor*0.94062;
}
else{
	$equivalente=$valor*3086.82;
}

//colocar tipo de moneda

if (empty($_POST['convertir_a'])){
	$moneda='';
}
elseif($_POST['convertir_a']=='euros'){
	$moneda='Euros';
}
else{
	$moneda='Pesos Colombianos';
}

echo '<!DOCTYPE html>';
echo '<html>';
echo '<head>';
echo '<link rel="stylesheet" type="text/css" href="css/estilos.css">';
echo '<meta charset="utf-8">';
echo '<title>Conversor de Monedas</title>';
echo '</head>';
echo '<body>';
echo '<div id="capa1">';
echo '<div id="capa2">';
echo '<form action="" method="post">';
echo '<h4>Conversor de Monedas</h4>';
echo '<div class="principal">';
echo '<label for="valor_usd">Valor en USD:</label>';
echo '<input type="text" id="valor" name="valor" value="">';
echo '   ';
echo '<label for="valor">Convertir a:</label>';
echo '<select class="convertir_a" id="convertir_a" name="convertir_a">';
echo '<option value="">Seleccione:</option>';
echo '<option value="euros">Euros</option>';
echo '<option value="pesos">Pesos Colombianos</option>';
echo '</select>';
echo '<br>';
echo '<button id="convertir" name="convertir">Convertir</button>';
echo '</div>';
echo '<div class="resultado">';
echo '<h3>';
echo $valor.' USD equivale a '.$equivalente.' '.$moneda;
echo '</h3>';
echo '</div>';
echo '</div>';
echo '</div>';
echo '</body>';
echo '</html>';


