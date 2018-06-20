window.onload = function() {

	document.getElementById('createdb').onclick = function() {
		document.getElementById("createdb-window").style.visibility = 'visible';
		document.getElementById("background").style.visibility = 'visible';
		document.getElementById("createdb-window").style.opacity = '1';
		document.getElementById("background").style.opacity = "0.8";
	}


	document.getElementById("cancel-button").onclick = function() {
		document.getElementById("createdb-window").style.opacity = '0';
		document.getElementById("background").style.opacity = "0";
		document.getElementById("createdb-window").style.visibility = 'hidden';
		document.getElementById("background").style.visibility = 'hidden';
	}

	document.getElementById("ok-button").onclick = function() {

		var select = document.getElementById("select-charset");
		var value = select.options[select.selectedIndex].value;
		var dbname = document.getElementById("db-name-field").value;

		if (value != "" && dbname != "") {
			var xhr = new XMLHttpRequest();

			xhr.open('GET', 'home?db[collation]=' + value + "&db[name]=" + dbname, true);
			xhr.send();

			xhr.onreadystatechange  = function () {
			    if (xhr.readyState === xhr.DONE) {
			        if (xhr.status === 200) {
			            if (xhr.responseText == "OK") {
			            	console.log("the database has been added");
			            } else {
			            	console.log(xhr.responseText);
			            }
			        }
			    }
			};
		}

	}

}