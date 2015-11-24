
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
       $Provincia=$provincia['provincia'];
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
        $Canton=$cantones['canton'];
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
         $Parroquia=$parroquia;
         }
     echo '>'.$parroquia.'</option>';
}
echo '</select>';
echo '<button id="enviar" name="enviar">Enviar</button>';
if(empty($Parr)==false)
{
bdd($Prov,$Provincia,$Cant,$Canton,$Parr,$Parroquia);
}
echo '</body>';
echo '</html>';

function bdd($Prov,$provincia,$Cant,$canton,$Parr,$parroquia)
{
 $conn = new mysqli('localhost' , 'root' , '', 's5e3');
 if ($conn->connect_error) die($conn ->connect_error);

  $query="INSERT INTO datos
        (codProv, provincia, codCant, canton, codParr, parroquia)
        VALUES('$Prov','$provincia','$Cant','$canton','$Parr', '$parroquia')";
  
  $result=$conn->query($query);
    if($result){ echo "\nConexión con la Base de Datos realizada correctamente. "; }
    else{ die($conn->error);}
   

}
