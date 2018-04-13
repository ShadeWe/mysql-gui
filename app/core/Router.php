<?php

class Router {

	private $routes;

	public function __construct() {
		$this->routes = include("app/config/routes.php");
	}

	public function run() {

		$uri;

		if (!empty($_SERVER["REQUEST_URI"])) {
			$uri = trim(explode('?', $_SERVER["REQUEST_URI"])[0], '/');
		}

		foreach ($this->routes as $uriPattern => $path) {


			if (preg_match("~^$uriPattern$~", $uri)) {
				

				$segments = explode('/', $path);

				$controllerName = ucfirst(array_shift($segments)) . "Controller";
				$actionName = "action" . ucfirst(array_shift($segments));

				$controllerFile = "app/controllers/" . $controllerName . ".php";

				if (file_exists($controllerFile)) {
					include_once($controllerFile);
				} else {
					echo "the page doesn't exist";
				}

				$object = new $controllerName;
				$object->$actionName();

			}

		}

	}

}