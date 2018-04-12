<?php

session_start();

require_once "app/core/model.php";
require_once "app/core/view.php";
require_once "app/core/controller.php";
require_once "app/core/route.php";

Route::start();

/*
if ($_GET["login"]["name"] != "" && $_GET["login"]["pass"] != "") {
	
	try {
		$pdo = new PDO('mysql:host=localhost;dbname=;charset=utf8mb4', $_GET["login"]["name"], $_GET["login"]["pass"]);
	}
	catch (PDOException $e) {
		print "Error!: " . $e->getMessage();
    	die();
	}

	$result = $pdo->query("SHOW DATABASES;");

	while ($row = $result->fetch()) {
		echo $row["Database"] . "\n";
	}

}
*/
