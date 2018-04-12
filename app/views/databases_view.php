<link rel="stylesheet" type="text/css" href="css/databases.css">


<div id="leftPanel">
	
	<div id="logo">
		<span id="lWord">SQL</span>
		<span id="sWord">EATER</span>
	</div>

	<div id="databases">DATABASES</div>

	<div id="dbsContainer">

		<?php

			for ($i = 0; $i < count($data); $i++)
				echo "<div class='dbnameContainer'>" . $data[$i] . "</div>";

		?>

	</div>
</div>