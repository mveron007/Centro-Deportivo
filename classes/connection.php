<?php

	$user = '';
	$pass = '';

	try {
		$connection = new PDO(
			"mysql:host=localhost; dbname=centro_zucamor; charset=utf8_general_ci",
			$user,
			$pass,
			[PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION]
		);
	} catch (PDOException $exception) {
		echo $exception->getMessage();
	}