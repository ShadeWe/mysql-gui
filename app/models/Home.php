<?php

class Home {

	static $pdo;

	static function connect($username, $password) {

		try {
			self::$pdo = new PDO('mysql:host=localhost;dbname=;charset=utf8mb4', $username, $password);
		}
		catch (PDOException $e) {
			print $e->getMessage();
	    	die();
		}
		
	}

	// returns all the databases of the user
	static function getDatabases() {

		$result = self::$pdo->query("SHOW DATABASES;");

		$i = 0;

		$data = array();

		while ($row = $result->fetch()) {
			$data[$i] = $row[0];
			$i++;
		}

		return $data;
	}

	static function getSystemVariables() {

		$result = self::$pdo->query("SHOW VARIABLES;");

		$i = 0;

		$data = array();

		while ($row = $result->fetch()) {
			$data["varname"][$i] = $row[0];
			$data["value"][$i] = $row[1];
			$i++;
		}

		return $data;
		
	}

	static function getVersion() {

		$result = self::$pdo->query("SELECT @@VERSION;");

		return $result->fetch()["@@VERSION"];

	}




}