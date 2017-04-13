<?php


  // $cvar= "Pm1";
  // $ivar= "James Finn";
  // $dvar = "Monday";
  // $tvar= "12:00";
  // $dec = "this is crazy";




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
