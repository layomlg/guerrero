<?php 

#$mysqli = new mysqli('127.0.0.1', 'root', '' , 'testlayator');
$mysqli = new mysqli('127.0.0.1', 'root', '' , 'layatorc_test');
#$mysqli = new mysqli('127.0.0.1', 'layatorc_sql', 'e=[~en@@ZZAm' , 'layatorc_test');

    

	if($mysqli->connect_errno){
		echo 'Conexion fallida a MYSQL: ' .  $mysqli->connect_error . PHP_EOL;
	}
?>
	

