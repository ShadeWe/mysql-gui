<?php

class Controller_Databases extends Controller {

	function __construct()
	{
		$this->model = new Model_Databases();
		$this->view = new View();
	}

	public function action_index() {
		
		$data = $this->model->getDatabases();
		$this->view->generate("databases_view.php", $data);
	}

}