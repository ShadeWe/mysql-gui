<?php

class Main {

	static function connect($username, $password) {

		try {
			$pdo = new PDO('mysql:host=localhost;dbname=;charset=utf8mb4', $username, $password);
		}
		catch (PDOException $e) {
			print $e->getMessage();
	    	die();
		}
		echo "OK";
		return $pdo;
		
	}
	
}