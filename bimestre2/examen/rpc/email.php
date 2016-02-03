<?php
//print_r($_POST);
$result = "";

if($_POST) {
    $email = $_POST['email'];

	$conn = new mysqli('localhost' , 'root' , '', 'examen2');
    if ($conn->connect_error) die($conn ->connect_error);

    $con_user = "SELECT email FROM estudiante where email ='$email'";
    $result = $conn ->query($con_user);
    if (!$result) die($conn ->error);

    $rows = $result ->num_rows;
    
    if($rows>0){
    	 echo "false";
    }else{
        echo "true";
    }
}
?>