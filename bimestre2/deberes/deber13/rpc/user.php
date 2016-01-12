<?php
//print_r($_POST);
$result = "";

if($_POST) {
    $usuario = $_POST['usuario'];

	$conn1 = mysql_connect("localhost", "root", "");
    mysql_select_db("registro", $conn1);

    $con_user = mysql_query("SELECT usuario FROM users where usuario ='$usuario'", $conn1);
    

   $existe = mysql_num_rows($con_user);

    if($existe!==0){
    	 $result = 'Usuario ya existente';
    }else{
        $result = 'true';
    }
}
echo json_encode( $result );
?>