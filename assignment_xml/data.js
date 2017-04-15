
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
		// var dayArr = ["Monday", "Tuesday", "Wednesday"]
		// var formD = "";
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

	}

function callWeather(city){
	$.ajax({
		url:"data.php?city=" + city,
		type:"POST"
	})
	.done(function(response){
		$("#weatherC").html(response);
	})
	.fail(function(response){
		console.log("fail");
	});
}

$(function(){
	callWeather("Vancouver");

	$('#city-select').change(function(){
		let city = $(this).val();
		callWeather(city);
		changeBg( $('option:selected', this).data('bg') );

	});
});

//change the background color based on the data-bg attribute
function changeBg(bg) {
    $(".bg").css('background-image', 'url("' + bg + '")');
}
