<?php

include "app/models/Home.php";

class HomeController {

	 function actionIndex() {

	 	if (isset($_SESSION["username"]) && isset($_SESSION["password"]));

	 		Home::connect($_SESSION["username"], $_SESSION["password"]);

			// getting the list of databases and the version of DBMS
			$data = Home::getDatabases();
			$enc = Home::getEncoding($data);
			$size = Home::getDatabasesSize($data);
			$num = Home::getNumberOfTables($data);
			$version = Home::getVersion();


			$data = array("databases" => $data, "version" => $version, "encoding" => $enc, "number" => $num, "size" => $size);

			include "app/views/home_view.php";

		

	 }

}