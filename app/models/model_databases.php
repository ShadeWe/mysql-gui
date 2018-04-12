<?php

class Model_Databases extends Model {

	// returns all the databases of the user
	function getDatabases() {

		$result = $this->pdo->query("SHOW DATABASES;");

		$i = 0;

		$data = array();

		while ($row = $result->fetch()) {
			$data[$i] = $row[0];
			$i++;
		}

		return $data;
	}

}