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

	static function createDatabase($dbname, $collation) {

		self::$pdo->query("CREATE DATABASE `". $dbname . "` COLLATE '" . $collation . "';");

	}

	static function getEncoding($dbs) {

		$data;

		for ($i = 0; $i < count($dbs); $i++) {

			self::$pdo->query("USE " . $dbs[$i] . ";");
			$result = self::$pdo->query("SELECT @@collation_database;");
			$data[$i] = $result->fetch()[0];
		}

		return $data;
	}

	static function getCharacterSetsAvailable() {
		return self::$pdo->query('SHOW CHARACTER SET;')->fetchAll();
	}

	static function getDatabasesSize($dbs) {

		$result = self::$pdo->query('SELECT table_schema "dbname", sum( data_length + index_length) / 1024 / 1024 
"size" FROM information_schema.TABLES GROUP BY table_schema ;');
		
		$data;
		$temp;

		// extracting databases' sizes and names
		for ($i = 0; $i < count($dbs); $i++) {
			$data[$i] = $result->fetch();
		}

		for ($i = 0; $i < count($dbs); $i++) {
			for ($k = 0; $k < count($dbs); $k++) {
				if ($dbs[$i] == $data[$k]["dbname"]) {
					$temp[$i] = $data[$k]["size"];
				}
			}
			if (!isset($temp[$i])) $temp[$i] = 0;
		}

		return $temp;
	}

	static function getNumberOfTables($dbs) {

		$data;

		for ($i = 0; $i < count($dbs); $i++) {

			$result = self::$pdo->query("SELECT COUNT(*) FROM information_schema.tables WHERE table_schema = '" . $dbs[$i] . "';");
			$data[$i] = $result->fetch()[0];
		}

		return $data;
	}

	// returns all the databases of the user
	static function getDatabases() {

		$result = self::$pdo->query("SHOW DATABASES;");

		$i = 0;

		$data;

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