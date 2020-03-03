<?php
	$servername = "127.0.0.1";  //localhost
	$user = "root";
	$pass = "";
	$dbname = "centro_zucamor";

	try {
		$connection = new PDO("mysql:host=$servername; dbname=$dbname; charset=utf8", $user, $pass);
		
		$connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		// echo "Conexion exitosa";
	} catch (PDOException $exception) {
		echo $exception->getMessage();
	}
?>