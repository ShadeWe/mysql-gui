<?php

class Route {

	static function start() {

		// the controller and action that are used by default
		$controller_name = "Home";
		$action_name = "index";


		$routes = explode('/', explode('?', $_SERVER['REQUEST_URI'])[0]);

		if ( !empty($routes[1]) )
		{	
			$controller_name = $routes[1];
		}

		if ( !empty($routes[2]) )
		{
			$action_name = $routes[2];
		}

		$model_name = 'Model_'.$controller_name;
		$controller_name = 'Controller_'.$controller_name;
		$action_name = 'action_'.$action_name;

		// including the model class
		$model_file = strtolower($model_name).'.php';
		$model_path = "app/models/".$model_file;
		if(file_exists($model_path))
		{
			include "app/models/".$model_file;
		}

		// including the controller class
		$controller_file = strtolower($controller_name).'.php';
		$controller_path = "app/controllers/".$controller_file;
		if(file_exists($controller_path))
		{
			include "app/controllers/".$controller_file;
		}

		$controller = new $controller_name;
		$action = $action_name;
		
		if(method_exists($controller, $action))
		{
			// вызываем действие контроллера
			$controller->$action();
		}

	}

}