<!DOCTYPE html>
<html>
<head>
	<title></title>
	<link rel="stylesheet" type="text/css" href="/css/viewdb.css">
</head>
<body>

	<div id='getback-button' onclick='window.location.href="/home"'><< back to databases</div>

	<div id="wrap-info">
		<span id="desc">DATABASE </span><span id="dbname"><?php echo $_GET["dbname"]?></span>
	</div>

	<table>
		<tr>
			<th>Table</th>
			<th>Engine</th>
			<th>Collation</th>
			<th>Data Length</th>
			<th>Index Length</th>
			<th>Data Free</th>
			<th>Auto Inc</th>
			<th>Rows</th>
			<th>Comment</th>
		</tr>

		<?php

			for ($i = 0; $i < count($tables); $i++) {
				echo "<tr class='dataCell'>";

				echo "<td>" . $tables[$i]["Name"] . "</td>";
				echo "<td>" . $tables[$i]["Engine"] . "</td>";
				echo "<td>" . $tables[$i]["Collation"] . "</td>";
				echo "<td>" . $tables[$i]["Data_length"] . "</td>";
				echo "<td>" . $tables[$i]["Index_length"] . "</td>";
				echo "<td>" . $tables[$i]["Data_free"] . "</td>";

				echo "<td>";
				echo ($tables[$i]["Auto_increment"] == NULL) ? 'no' : 'yes';
				echo "</td>";

				echo "<td>" . $tables[$i]["Rows"] . "</td>";
				
				echo "<td>";
				echo ($tables[$i]["Comment"] == NULL) ? 'no' : 'yes';
				echo "</td>";

				echo "</tr>";
			}

		?>

		<script type="text/javascript" src="/js/viewdb.js"></script>
	</table>
</body>
</html>