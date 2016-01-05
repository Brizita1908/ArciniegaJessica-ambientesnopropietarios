<!DOCTYPE HTML>
<html>
   <head>
   	<meta charset="utf-8">
      <TITLE>Ejercicio 3</TITLE>
      <link rel="stylesheet" type="text/css" href="css/estilos.css">
   </head>
   <body>
      <form action="bdd.php" method="POST">
      	<div id="contenedor_1" class="contenedor">
         	<label for="intereses">Interés 1:</label>
         	<input type="text" id="interes1" name="interes1" value="">
            
      	</div>
         <input class="btn-gr" type="submit" value="Guardar" />
      </form>
   	<button id="btn">Agregar Interes</button>
   	<button id="btn_eliminar">Eliminar</button>
   	<script src="js/jquery.min.js"></script>
   	<script src="js/main.js"></script>
   </body>
</html>