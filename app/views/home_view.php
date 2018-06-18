<link rel="stylesheet" type="text/css" href="/css/home.css">
<script type="text/javascript" src="js/databasesPage.js"></script>

<div id="userInfoBox">
			
			<?php 
				echo "DBMS version: " . "<b>" .$data["version"] . "</b>" . "<br>";
				echo "You are logged on as: " . "<b>" . $_SESSION["username"] . "</b>";
			?>

</div>

<div id="leftPanel">
	
	<div id="logo">
		<span id="lWord">SQL</span>
		<br>
		<span id="sWord">VIEWER</span>
	</div>

	<div id="buttonContainer">
		<div class="leftPanelButtons">SQL REQUEST</div>
		<div class="leftPanelButtons">IMPORT</div>
		<div class="leftPanelButtons">EXPORT</div>
	</div>

	<div class="leftPanelButtons" id="exitButton">
		EXIT
	</div>

</div>


<div id='wrap'>

	<div id="deletedb">DELETE</div>
	<div id="selectedInformer">
		<span style="font-weight: bold; font-family: Arial; font-size: 12px;">0</span>
		<span style="font-weight: lighter; font-family: Arial; font-size: 12px;">selected</span>
	</div>

	<div class="funcButtons" id="createdb">CREATE A DATABASE</div>
	<div class="funcButtons" id="showvars">SYSTEM VARIABLES</div>
	<div class="funcButtons" id="statedb">SYSTEM STATE</div>
	<div class="funcButtons" id="processdb">PROCESS LIST</div>

		<table>
			<tr>
				<th>DATABASE NAME</th>
				<th>ENCODING</th>
				<th>TABLES</th>
				<th>SIZE</th>
			</tr>

			<?php
				for ($i = 0; $i < count($data["databases"]); $i++) {

					echo "<tr class='dataCells'>";
					echo "<td>" . $data["databases"][$i] . "</td>";
					echo "<td>" . $data["encoding"][$i] . "</td>";
					echo "<td>" . $data["number"][$i] . "</td>";
					echo "<td>" . round($data["size"][$i], 3) . " mb </td>";
					echo "</tr>";

				}
			?>
		</table>
	
</div>