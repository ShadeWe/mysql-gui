<?php 

class Controller_Home extends Controller {

	function __construct()
	{
		$this->model = new Model();
		$this->view = new View();
	}

	public function action_index() {
		
		// if the username and password were both specified ...
		if (isset($_GET["login"]["name"]) && isset($_GET["login"]["name"])) {

			// if php didn't die while connectiong to DBMS, print it out so that javascript knows if data are correct.
			echo "OK";

			$_SESSION["username"] = $_GET["login"]["name"];
			$_SESSION["password"] = $_GET["login"]["pass"];

		} else {

			$this->view->generate("home_view.php", "");

		}
	}

}
