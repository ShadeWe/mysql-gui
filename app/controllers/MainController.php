<?php

include "app/models/Main.php";

class MainController {

	function actionIndex() {

		if (isset($_SESSION["username"]) && isset($_SESSION["password"])) {
			header("Location: /home");
		}

		include "app/views/main_view.php";

	}

	function actionLogin() {

		Main::connect($_GET["login"]["name"], $_GET["login"]["pass"]);

		echo "OK";

		$_SESSION["username"] = $_GET["login"]["name"];
		$_SESSION["password"] = $_GET["login"]["pass"];

	}

}