<?php

// get the q parameter from URL
$q = $_REQUEST["rqst"];


$TimezoneDate = "";

// lookup all hints from array if $q is different from ""
if ($q == "") {
    $TimezoneDate = "No data received";
}
else {
    date_default_timezone_set($q);
    $TimezoneDate = date("d/m/y : H:i:s", time());
}

echo $TimezoneDate;
