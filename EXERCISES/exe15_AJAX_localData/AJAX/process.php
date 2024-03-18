<?php

// get the q parameter from URL
$dataReceivedFromJS = $_GET["text-written-onkeyup"];

//Convert data to lowercase letters
$dataReceivedFromJS = strtolower($dataReceivedFromJS);

//Declare variables
$warn_msg = "Must start with a letter [a-z]";
$no_warn_msg = "On a good way!";

//Compare data to display output
//If first character of data is empty or includes a-z display no_warm_msg
//If first character of data is different than a-z display warm_msg
echo (($dataReceivedFromJS == "")
    || (preg_match("/[a-z]/", $dataReceivedFromJS[0])))
    ? $no_warn_msg : $warn_msg;
