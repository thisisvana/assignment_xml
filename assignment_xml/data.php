<?php
// GRAB YAHOO DATA
// =================
 $dataNy = simplexml_load_file('https://query.yahooapis.com/v1/public/yql?q=select%20*%20from%20weather.forecast%20where%20woeid%20in%20(SELECT%20woeid%20FROM%20geo.places(1)%20WHERE%20text%20%3D%20%22New%20York%22)%20AND%20u%3D%22c%22&diagnostics=true');
 $dataV = simplexml_load_file('https://query.yahooapis.com/v1/public/yql?q=select%20*%20from%20weather.forecast%20where%20woeid%20in%20(SELECT%20woeid%20FROM%20geo.places(1)%20WHERE%20text%20%3D%20%22Vancouver%22)%20AND%20u%3D%22c%22&diagnostics=true');


function weather($data){

    $namespace = $data->results->channel->getNamespaces(true);

    // creating $yw shortcut which is referring child elements of channel uses 'yweather' namespace
    $yw = $data->results->channel->children($namespace['yweather']);

    // WIND
    // =================
    $speedUnit = $yw->units->attributes()->speed;
    $speed = $yw->wind->attributes()->speed;
    $direction = $yw->wind->attributes()->direction/45;//deviding the degrees by 45 so i can have 8 compas directions (N,NE,E,SE,S,SW,W,NW)

    //associative array
    $compassArr = array(0=>'N', 1=>'NE', 2=>'E', 3=>'SE', 4=>'S', 5=>'SW', 6=>'W', 7=>'NW', 8=>'N');// North is twice in the array because North is 360deg and 0deg
    $direction = intval($direction);
    //looping through associative array
    foreach($compassArr as $x => $x_value){
      if($direction === $x){ //check if the integer wind direction is equal to the key
        $direction = $x_value; //if equal assign the value to direction

      }
    }
    // if(array_key_exists($direction, $compassArr)){
    //   echo $direction;
    // }

    // LOCATION
    // =================
    $city = $yw->location->attributes()->city;
    $country = $yw->location->attributes()->country;
    $province = $yw->location->attributes()->region;

    // VISIBILITY
    // =================
    $visibility = $yw->atmosphere->attributes()->visibility;

    // creating $cw shortcut which is referring child elements of item uses 'yweather' namespace (condition and forecast)
    $cw = $data->results->channel->item->children($namespace['yweather']);


    // TEMPERATURE & CONDITIONS
    // ==================
    $current_temp = $cw->condition->attributes()->temp; // get current temperature
    $temp_unit = $yw->units->attributes()->temperature;
    $current_condition = $cw->condition->attributes()->text; // get current condition

    // this will get html content encoded as cdata
    // CDATA
    // ==================

    // Last Updated
    $last_update = $data->results->channel->lastBuildDate;
    //displaying the weather information
    echo "<h3>Current weather condition in ". $city." , ".$province." , ".$country."</h3>";
    echo "<ul>";
    echo "<li><i class='icons fa fa-fighter-jet' aria-hidden='true'></i>Wind speed - ". $speed.$speedUnit."</li>";
    echo "<li><i class='icons fa fa-compass' aria-hidden='true'></i>Wind direction - ".$direction."</li>";
    echo "<li><i class='icons fa fa-low-vision' aria-hidden='true'></i>Visibility - ".$visibility."</li>";
    echo "<li><i class='icons fa fa-thermometer-half' aria-hidden='true'></i>Temperature - ".$current_temp."c</li>";
    echo "<li><i class='icons fa fa-cloud' aria-hidden='true'></i>Condition - ".$current_condition."</li>";
    echo "</ul>";
    echo $last_update;
}

if(isset($_GET['city'])){ //checking if get request is set

    $city = $_GET['city'];
    if($city == "Vancouver"){ //if Vancouver, calling the function weather and passing the data for Vancouver as an argument for the data parameter
      weather($dataV);
    }
    else{
      weather($dataNy);// else passing the data for New York
    }
}



?>
