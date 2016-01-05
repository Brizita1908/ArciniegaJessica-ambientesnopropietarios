<?php

	$conn = mysql_connect("localhost", "root", "");
	mysql_select_db("intereses", $conn);

	$i=1;

	$interes+$i=$_POST['interes'+'$i'];
	print_r($_POST['interes'+$i]);