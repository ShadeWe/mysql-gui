<?php

class Model {

	public $pdo;

	function __construct() {
		$this->connect($_SESSION["username"], $_SESSION["password"]);
	}

	function connect($username, $password) {
		try {
			$this->pdo = new PDO('mysql:host=localhost;dbname=;charset=utf8mb4', $username, $password);
		}
		catch (PDOException $e) {
			print $e->getMessage();
	    	die();
		}
	}

}