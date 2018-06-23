<?php

include "app/models/Home.php";

class HomeController {

     function actionViewtableinfo() {
     	Home::connect($_SESSION["username"], $_SESSION["password"]);
     	$data = Home::getTablesDescription($_GET["table"], $_GET["dbname"]);

     	include "app/views/viewtb_view.php";

     }

	 function actionViewdatabase() {

	 	Home::connect($_SESSION["username"], $_SESSION["password"]);

	 	if (isset($_GET["collation"]) && isset($_GET["dbname"])) {
	 		Home::createDatabase($_GET["dbname"], $_GET["collation"]);
	 	}

	 	$tables = Home::getTables($_GET["dbname"]);
	 	
	 	include "app/views/viewdb_view.php";

	 }


	 function actionIndex() {

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