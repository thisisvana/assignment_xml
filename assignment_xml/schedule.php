<!doctype html>
<html class="no-js" lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="x-ua-compatible" content="ie=edge">
        <title>Term 3 Schedule</title>
        <meta name="viewport" content="width=device-width, initial-scale=1">
         <link href="https://fonts.googleapis.com/css?family=Ubuntu:300,300i,400,400i,500,500i,700" rel="stylesheet">
        <!-- <link href="css/foundation.css" rel="stylesheet" type="text/css"/> -->
        <link href="https://cdnjs.cloudflare.com/ajax/libs/foundation/6.3.1/css/foundation.min.css">
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
			}
			td {
				padding:0.5rem 2rem;
			}
			th{
				color: orange;
				font-size: 1.3rem;
			}
			h2{

				color: #4d4d4d;
			}
      textarea {
        width: 20rem;
        height: 10rem;
      }
      form {
        background-color: #f6f6f6;
        margin-top: 2rem;
        display: flex;
        align-items: center;
        justify-content: center;
        flex-direction: column;
      }
      input, select, button {
        width: 20rem;
        height: 3rem;
      }

		</style>

	</head>
	<body onLoad="sendXmlRequest('classes.xml')">

    <div class="schedule">
  		<h2>Web Dev 11 - Term 3</h2>
      <div class="table-container large-8 column">
        <table id="course_tb"></table>

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
      </div>
      <h3>Weather Today</h3>
      <form id="weather-form" action="#" method="post">
        <label for="city-select">Select City</label>
        <select id="city-select" name="city-select">
          <option value="vancouver">Vancouver</option>
          <option value="ny">NY</option>

        </select>

      </form>

		<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
		<script src="data.js"></script>
	</body>
</html>
