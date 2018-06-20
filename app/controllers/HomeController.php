<?php

include "app/models/Home.php";

class HomeController {

	 function actionIndex() {

	 	if (isset($_GET["db"]["collation"]) && isset($_GET["db"]["name"])) {

	 		Home::connect($_SESSION["username"], $_SESSION["password"]);

	 		Home::createDatabase($_GET["db"]["name"], $_GET["db"]["collation"]);

	 		echo "OK";

	 		return 0;
	 	}

	 	if (isset($_SESSION["username"]) && isset($_SESSION["password"]));

	 		Home::connect($_SESSION["username"], $_SESSION["password"]);
	 		
			
			$dbs = Home::getDatabases();
			$enc = Home::getEncoding($dbs);	
			$size = Home::getDatabasesSize($dbs);
			$num = Home::getNumberOfTables($dbs);
			$version = Home::getVersion();
			$cset = Home::getCharacterSetsAvailable();


			$data = array(
				"databases" => $dbs, 
				"version" => $version, 
				"encoding" => $enc, 
				"number" => $num, 
				"size" => $size, 
				"collasion" => $cset
			);

			include "app/views/home_view.php";

			return 0;
	 }

}