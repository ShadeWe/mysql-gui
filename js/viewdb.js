window.onload = function() {

	var dataCells = document.getElementsByClassName("dataCell");

	for (let i = 0; i < dataCells.length; i++) {
		dataCells[i].onclick = function() {
			window.location.href = "/home/viewtb?table=" + dataCells[i].childNodes[0].textContent + "&dbname="
			+ document.getElementById("dbname").textContent;
		}
	}

}