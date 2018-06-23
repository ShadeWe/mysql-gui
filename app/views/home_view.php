<link rel="stylesheet" type="text/css" href="/css/home.css">
<script type="text/javascript" src="/js/homepage.js"></script>


<div id="background"></div>
<div id="createdb-window">

	<div class="window-header">CREATING DATABASE</div>

	<form method="GET" action='/home/viewdb' id="create-db-form">

		<div id="collasion">COLLASION</div>
		<div id="custom-select">
			<select id="select-charset" onmousedown="this.size=5;"  onchange='this.size=0;' onblur="this.size=0;" name="collation">
			  <option value="" selected disabled hidden>choose here</option>
			  
			  <?php
			  	for ($i = 0; $i < count($data["collasion"]); $i++)
			  		echo "<option>" . $data["collasion"][$i]["Default collation"] . "</option>";

			  ?>
			  
			</select>
		</div>

		<div id="dbname">DATABASE NAME</div>
		<input type="text" id="db-name-field" name="dbname">

		<div class="createdb-buttons" id="ok-button">OK</div>
		<div class="createdb-buttons" id="cancel-button">CANCEL</div>

	</form>

</div>

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

	<div class="leftPanelButtons" id="exitButton">EXIT</div>

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
				<th>DATABASE</th>
				<th>COLLATION</th>
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
	<div id="bottom">
		
	</div>
</div>
