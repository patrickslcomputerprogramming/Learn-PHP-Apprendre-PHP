<?php
//Receive request from AJAX including the timezone 
//Submit response to AJAX including date and time 

//Get the data sent in the request 
$timezone = $_REQUEST["rqdata"];

//Check whether the timezone is complete or not
//For example when changing the continent the city becomes empty, the timezone sent is incomplete
$arrContinentCity=explode('/',$timezone);

//Set the timezone
$message = "";
if ($arrContinentCity[0] == "" || $arrContinentCity[1] == "")
    $message = "";
else {
    //Calculate the time and send it as a response
    date_default_timezone_set($timezone);
    $format = "l F d, Y - g:i:s A";
    $current_timestamp = time();
    $message = date($format, $current_timestamp);
}
echo $message;
//Format: Friday April 14, 2023 - 8:32:47 PM