window.onload = function() {

	var buttonPressed;
	window.onkeydown = function(e) {
		if (e.keyCode == 16)
			buttonPressed = 16;
	}

	window.onkeyup = function(e) {
		buttonPressed = 0;
	}

	// the createdb window pops up when this button's clicked
	document.getElementById('createdb').onclick = function() {
		document.getElementById("createdb-window").style.visibility = 'visible';
		document.getElementById("background").style.visibility = 'visible';
		document.getElementById("createdb-window").style.opacity = '1';
		document.getElementById("background").style.opacity = "0.8";
	}

	// the OK button in the createdb window
	document.getElementById("ok-button").onclick = function() {

		var select = document.getElementById("select-charset");
		var value = select.options[select.selectedIndex].value;
		var dbname = document.getElementById("db-name-field").value;

		if (value != "" && dbname != "") {
			document.getElementById('create-db-form').submit();
		}
	}

	// the CANCEL button in the createdb window
	document.getElementById("cancel-button").onclick = function() {
		document.getElementById("createdb-window").style.opacity = '0';
		document.getElementById("background").style.opacity = "0";
		document.getElementById("createdb-window").style.visibility = 'hidden';
		document.getElementById("background").style.visibility = 'hidden';
	}


	var dataCells = document.getElementsByClassName("dataCells");

	for (let i = 0; i < dataCells.length; i++) {
		dataCells[i].onclick = function() {
			if (buttonPressed == 16) {
				if (dataCells[i].hasAttribute("selected")) {
					dataCells[i].removeAttribute("selected");
				} else {
					dataCells[i].setAttribute("selected");
				}
			} else {
				window.location.href = "/home/viewdb?dbname=" + dataCells[i].childNodes[0].textContent;
			}
		}
	}

}