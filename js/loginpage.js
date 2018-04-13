window.onload = function() {

	var xhr = new XMLHttpRequest();

	document.getElementById("loginButton").onclick = function() {

		var params = "login?login[name]=" + document.getElementById("usernameInput").value +
					"&login[pass]=" + document.getElementById("passwordInput").value;

		xhr.open("GET", params, true);
		xhr.send();

		xhr.onreadystatechange  = function () {
		    if (xhr.readyState === xhr.DONE) {
		        if (xhr.status === 200) {
		        	console.log(xhr.responseText);
		            if (xhr.responseText == "OK") {
		            	window.location.replace("/home");
		            }
		        }
		    }
		};

	}

}