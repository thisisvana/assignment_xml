<!doctype html>
<html class="no-js" lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="x-ua-compatible" content="ie=edge">
        <title>Term 3 Schedule</title>
        <meta name="viewport" content="width=device-width, initial-scale=1">
         <link href="https://fonts.googleapis.com/css?family=Ubuntu:300,300i,400,400i,500,500i,700" rel="stylesheet">
        <!-- <link href="css/foundation.css" rel="stylesheet" type="text/css"/> -->
        <link href="http://cdn.foundation5.zurb.com/foundation.css">
        <!-- <link rel="stylesheet" href="css/main.css"> -->
        <!-- <script src="js/vendor/modernizr-2.8.3.min.js"></script> -->
        <script src="https://use.fontawesome.com/e38b461000.js"></script>
		<style>
			body {
				padding:1.5rem;
				font-family: Ubuntu;
			}
			table {
				width: 100%;
				/*margin: auto;*/
				padding: 2rem 1rem;
				background-color: #4d4d4d;
				color: #f6f6f6;
        opacity: 0.8;
			}
			td {
				padding:0.5rem 2rem;
			}
			th{
				background-color: #f6f6f6;
        color: #4d4d4d;
				font-size: 1.3rem;
        font-weight: 300;
        height: 4rem;
			}
      h1{
        color: #f6f6f6;
      }
			h2{
				color: #4d4d4d;
			}
      textarea {
        width: 20rem;
        height: 8rem;
        border: 0.1rem solid #4d4d4d;
      }
      form, .wform {
        background-color: #f6f6f6;
        opacity: 0.8;
        margin-top: 2rem;
        display: flex;
        align-items: center;
        justify-content: center;
        flex-direction: column;
        padding: 2rem;
        width: 50%;
        margin: auto;

      }
      input, select, button {
        width: 20rem;
        font-size: 0.9rem;
        height: 3rem;
        border: 0.1rem solid #4d4d4d;
      }
      li {
        list-style: none;
        border: 0.1rem solid #4d4d4d;
      }
      .bg {
        background: url('img/vancity.jpg');
        background-size: cover;
      }
      .wform {
        background-color: #f6f6f6;
				color: #4d4d4d;
        opacity: 0.9;
      }
      .icons{
        font-size: 2rem;
        padding: 0.4rem 1rem;
      }

		</style>

	</head>
	<body class='bg' onLoad="sendXmlRequest('classes.xml')">

    <div class="schedule">
  		<h1><i class="icons fa fa-calendar" aria-hidden="true"></i>Web Dev 11 - Term 3 Schedule</h1>
      <div class="table-container large-8">
        <table id="course_tb"></table>
      </div>
    </div>
      <div class="form-container">
        <form action="data.php" method="post">
          <label for="class-field">Class</label>
          <input id="class-field" name="class-field" placeholder="Class Name"><br>
          <label for="instructor-field">Instructor</label>
          <input id="instructor-field" name="instructor-field" placeholder="Instructor Name"><br>
          <label for="day-select">Day</label>
          <select id="day-select" name="day-select">
            <option value="monday">Monday</option>
            <option value="tuesday">Tuesday</option>
            <option value="wednesday">Wednesday</option>
            <option value="thursday">Thursday</option>
            <option value="friday">Friday</option>
            <option value="saturday">Saturday</option>
            <option value="sunday">Sunday</option>

          </select><br>
          <label for="class-time">Class Time</label>
          <input type="time" id="time-field" name="time-field"><br>
          <textarea name="description" id="description" placeholder="Class Description"></textarea>
          <button type="submit" id="submit" name="submit">Add</button>
        </form>
      </div>


    <?php

      if(isset($_POST['submit'])) {

        if(!empty($_POST['class-field']) || !empty($_POST['instructor-field']) || !empty($_POST['day-select']) || !empty($_POST['time-field']) || !empty($_POST['description'])){
          $cvar = $_POST['class-field'];
          $ivar = $_POST['instructor-field'];
          $dvar = $_POST['day-select'];
          $tvar = $_POST['time-field'];
          $dec = $_POST['description'];

          $xml = new DOMDocument("1.0");
          $xml = simplexml_load_file("classes.xml");

          $course = $xml->addChild("Course");
          $position = count($xml->Course)-1;
          $course_child_1 = $xml->Course[$position]->addChild("Class", $cvar);
          $course_child_1 = $xml->Course[$position]->addChild("Instructor", $ivar);
          $course_child_1 = $xml->Course[$position]->addChild("Day", $dvar);
          $course_child_1 = $xml->Course[$position]->addChild("Time", $tvar);
          $course_child_1 = $xml->Course[$position]->addChild("Description", $dec);

          $xml->asXML("classes.xml");

          echo "<script>location.replace('schedule.php');</script>";

        }

      }


      ?>



    <div class="wform">
    <h3>Check the weather in your city</h3>
    <form id="weather-form" action="#" method="post">
      <label for="city-select">Select City</label>
      <select id="city-select" onchange="showValue(this.value)" name="city-select">
        <option data-bg="img/vancity.jpg" value="Vancouver">Vancouver</option>
        <option data-bg="img/ny.jpg" value="ny">NY</option>

      </select>

    </form>
    <div id="weatherC">

    </div>
    </div>

		<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
		<script src="data.js"></script>
	</body>
</html>
