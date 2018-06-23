<!DOCTYPE html>
<html>
<head>
	<title></title>
	<link rel="stylesheet" type="text/css" href="/css/viewtb.css">
</head>
<body style="background-color: white;">

	<div id='getback-button' onclick='window.location.href="/home/viewdb?dbname=<?php echo $_GET['dbname']?>"'><< back to databases</div>

	<div id="wrap-info">
		<span class="desc">DATABASE </span><span class="name"><?php echo $_GET["dbname"]?></span>
		<br>
		<span class="desc">TABLE </span><span class="name"><?php echo $_GET["table"]?></span>
	</div>

	<div id='wrap'>
	
		<div id='buttonsContainer'>
			<div class="tbuttons">SELECT DATA</div>
			<div class="tbuttons">ALTER TABLE</div>
			<div class="tbuttons">NEW ITEM</div>
		</div>
 
		<table>
			<tr>
				<th>Name</th>
				<th>Type</th>
				<th>Null</th>
				<th>Key</th>
				<th>Default</th>
				<th>Extra</th>
			</tr>

			<?php
				for ($i = 0; $i < count($data); $i++) {
					echo "<tr>";
					echo "<td>" . $data[$i]["Field"] . "</td>";
					echo "<td>" . $data[$i]["Type"] . "</td>";
					echo "<td>" . $data[$i]["Null"] . "</td>";
					echo "<td>" . $data[$i]["Key"] . "</td>";
					echo "<td>" . $data[$i]["Default"] . "</td>";
					echo "<td>" . $data[$i]["Extra"] . "</td>";
					echo "</tr>";
				}
			?>
		</table>
	</div>
</body>
</html>