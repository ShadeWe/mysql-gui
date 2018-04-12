<?php

class View {

	function generate($view, $data = null) {

		include "app/views/" . $view;

	}

}