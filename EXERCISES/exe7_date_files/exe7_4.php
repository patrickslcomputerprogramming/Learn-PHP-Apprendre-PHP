<?php

/**
 *exe7_4.php
 *EXERCISE 7 NUMBER 4
 *Patrick Saint-Louis, 2023
*/

//Webpage to read 
$url="https://www.wikipedia.org/";
//Read the webpage and its collect in an array
$data = file($url) or die('ERROR: Cannot find file');
//Display all the array elements to display the page because its html
foreach ($data as $eachLine) {
    echo $eachLine;
}
//See the array elements saved in $data
var_dump($data); 

