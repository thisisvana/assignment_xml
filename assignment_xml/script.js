
	function sendXmlRequest(file) {
		var xhttp = new XMLHttpRequest();
		xhttp.open("GET", file, true);
		xhttp.onreadystatechange = function() {
			if(xhttp.readyState === 4 && xhttp.status === 200) {
				// console.log(xhttp.responseXML);
				if(file === 'classes.xml') {
					displayXml(xhttp);
				}
				else {
					// displayXml(xhttp);
				}
			}
		};
		xhttp.send();
	}

	function displayXml(xml){
		var xmlDoc = xml.responseXML;
		var x = xmlDoc.getElementsByTagName("Course");
		var table="<tr><th>Class</th><th>Instructor</th><th>Day</th><th>Time</th><th>Description</th></tr>";
		var formC = "";
		for(var i = 0; i < x.length; i++) {
			table += "<tr><td>" +
		    x[i].getElementsByTagName("Class")[0].childNodes[0].nodeValue +
		    "</td><td>" +
		    x[i].getElementsByTagName("Instructor")[0].childNodes[0].nodeValue +
		    "</td><td>" +
		    x[i].getElementsByTagName("Day")[0].childNodes[0].nodeValue +
		    "</td><td>" +
		    x[i].getElementsByTagName("Time")[0].childNodes[0].nodeValue +
		    "</td><td>" +
		    x[i].getElementsByTagName("Description")[0].childNodes[0].nodeValue +
		    "</td></tr>";
		}
		document.getElementById("course_tb").innerHTML = table;
		for (var i=0; i<x.length; i++){
			formC += "<select><option>" +
			x[i].getElementsByTagName("Class")[0].childNodes[0].nodeValue +
			"</option></select>";
		}
		document.getElementById("class-select").innerHTML = formC;
	}

	// function getData(node, interval) {
	// 	return x[interval].getElementsByTagName(node)[0].childNodes[0].nodeValue;
	// }
