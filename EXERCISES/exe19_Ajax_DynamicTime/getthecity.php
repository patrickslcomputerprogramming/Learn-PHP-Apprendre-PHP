<?php
//Receive request from AJAX including the continent 
//Submit response to AJAX including the corresponding cities 

//Array with timezone names
$timeZone=array();
$timeZone[] = array("America"=>"Montreal");
$timeZone[] = array("America"=>"Toronto");
$timeZone[] = array("Africa"=>"Ouagadougou");
$timeZone[] = array("Europe"=>"Amsterdam");
$timeZone[] = array("America"=>"Los_Angeles");
$timeZone[] = array("Asia"=>"Pyongyang");
$timeZone[] = array("Indian"=>"Antananarivo");


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
