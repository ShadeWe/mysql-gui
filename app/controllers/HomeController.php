<?php

include "app/models/Home.php";

class HomeController {

	 function actionIndex() {

	 	if (isset($_SESSION["username"]) && isset($_SESSION["password"]));

	 		Home::connect($_SESSION["username"], $_SESSION["password"]);

			// getting the list of databases and the version of DBMS
			$data = Home::getDatabases();
			$version = Home::getVersion();

			$data = array("databases" => $data, "version" => $version);

			include "app/views/home_view.php";

		

	 }

}