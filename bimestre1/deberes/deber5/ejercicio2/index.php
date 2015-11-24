
<?php
include('provincias_cantones_parroquias.php');

$Prov= empty($_POST['provincia']) ? 0 : $_POST['provincia'] ;
$Cant= empty($_POST['canton']) ? 0 : $_POST['canton'] ;
$Parr= empty($_POST['parroquia']) ? 0 : $_POST['parroquia'] ;

echo '<!DOCTYPE html>';
echo '<html>';
echo '<head>';
echo '	<title>Provincias Cantones y Parroquias del Ecuador</title>';
echo '</head>';
echo '<body>';
echo '<h2>Provincias Cantones y Parroquias del Ecuador</h2>';
echo '<form action="" method="post">';
echo '<select id="provincia" name="provincia">';
echo '<option value="">Seleccione:</option>';
foreach ($provincias_cantones_parroquias as $codProv => $provincia) {
    echo '<option value="'.$codProv.'"';
       if ($codProv==$Prov){
       echo 'selected="selected"';
       }
    echo '>'.$provincia['provincia'] .'</option>';
}
echo '</select>';
echo '<select id="canton" name="canton">';
echo '<option value="">Seleccione:</option>';
foreach ($provincias_cantones_parroquias[$Prov]['cantones'] as $codCant => $cantones) {
    echo '<option value="'.$codCant.'"';
        if ($codCant==$Cant){ 
    	echo 'selected="selected"';
        }
    echo '>'.$cantones['canton'].'</option>';
}
echo '</select>';
echo '<select id="parroquia" name="parroquia">';
echo '<option value="">Seleccione:</option>';
foreach ($provincias_cantones_parroquias[$Prov]['cantones'][$Cant]['parroquias'] as $codParr => $parroquia) {
     echo '<option value="'.$codParr.'"';
         if ($codParr==$Parr) { 
         echo 'selected="selected"'; 
         }
     echo '>'.$parroquia.'</option>';
}
echo '</select>';
echo '<button id="enviar" name="enviar">Enviar</button>';
echo '</body>';
echo '</html>';
