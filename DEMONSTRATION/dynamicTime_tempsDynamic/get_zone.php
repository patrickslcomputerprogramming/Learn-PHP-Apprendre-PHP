<?php
//Receive request from AJAX including the continent 
//Submit response to AJAX including the corresponding cities 

//Array with timezone names
include_once("timezones.php");

//Get the data sent in the request 
$continent = $_REQUEST["rqdata"];

//Lookup all corresponding cities 
$correspondingCities = "";

foreach($timeZone as $section => $items){
  foreach($items as $key => $value){
      if ($key===$continent){
        if ($correspondingCities === "")
            $correspondingCities = $value;
        else
            $correspondingCities .= ",". $value;
      }
  }
}

// Output $corresponding cities
// Format : Montreal, Toronto, Los_Angeles when $continent='America'
echo $correspondingCities;

?>