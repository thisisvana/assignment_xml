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
    $direction = $yw->wind->attributes()->direction;

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
    // $desc = $data->results->channel->item->description;

    // Last Updated
    $last_update = $data->results->channel->lastBuildDate;

    echo "<h3>Current weather condition in ". $city." , ".$province." , ".$country."</h3>";
    echo "<ul>";
    echo "<li>Wind speed ". $speed.$speedUnit."</li>";
    echo "<li>Wind direction ".$direction."</li>";
    echo "<li>Visibility ".$visibility."</li>";
    echo "<li>Temperature ".$current_temp."c</li>";
    echo "<li>Condition ".$current_condition."</li>";
    echo "</ul>";


  //  echo $desc;
   echo $last_update;
}

if(isset($_GET['city'])){
    $city = $_GET['city'];
    if($city == "Vancouver"){
      weather($dataV);
    }
    else{
      weather($dataNy);
    }
}



?>
