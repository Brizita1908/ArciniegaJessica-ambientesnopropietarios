<?php
 
      $buscar = $_POST['b'];
      print_r($buscar);
       
      if(!empty($buscar)) {
            buscar($buscar);
      }
       
      function buscar($b) {
            

            $conn = mysql_connect("localhost", "root", "");
            if (!$conn) {
                die('No pudo conectarse: ' . mysql_error());
            }else{
                  echo 'Conectado satisfactoriamente';
            }
            
            mysql_select_db("registro", $conn);
       
            $sql = mysql_query('SELECT * FROM usuarios WHERE nombre LIKE "%'.$b.'%"', $conn);

            $contar = mysql_num_rows($sql);
             
            if($contar == 0){
                  echo "No se han encontrado resultados para '<b>".$b."</b>'.";
            }else{
                  while($row=mysql_fetch_array($result)){
                        $nombre = $row['nombre'];
                        $id = $row['id'];
                         
                        echo $id." - ".$nombre."<br /><br />";    
                  }
            }
      }
       
?>