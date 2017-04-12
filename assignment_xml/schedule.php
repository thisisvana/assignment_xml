<!doctype html>
<html class="no-js" lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="x-ua-compatible" content="ie=edge">
        <title>Term 3 Schedule</title>
        <meta name="viewport" content="width=device-width, initial-scale=1">
         <link href="https://fonts.googleapis.com/css?family=Ubuntu:300,300i,400,400i,500,500i,700" rel="stylesheet">
        <link href="css/foundation.css" rel="stylesheet" type="text/css"/>
        <link rel="stylesheet" href="css/main.css">
        <script src="js/vendor/modernizr-2.8.3.min.js"></script>
        <script src="https://use.fontawesome.com/e38b461000.js"></script>
		<style>
			body {
				padding:1.5rem;
				font-family: Ubuntu;
			}
			table {
				width: 70%;
				/*margin: auto;*/
				padding: 2rem 1rem;
				background-color: #4d4d4d;
				color: #f6f6f6;
			}
			td {
				padding:0.5rem 2rem;
			}
			th{
				color: orange;
				font-size: 1.3rem;
			}
			h2{
				text-align: center;
				color: #4d4d4d;
			}

		</style>

	</head>
	<body onLoad="sendXmlRequest('classes.xml')">

		<h2>Web Dev 11 - Term 3</h2>

		<table id="course_tb"></table>
    <form id="" action="#" method="post">
      <select id="class-select" name="">

      </select>

    </form>



		<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
		<script src="script.js"></script>
	</body>
</html>
