<?php

//File path and location
$fileNameLocation = "C:/wamp64/www/dw3/file-writting-test.txt";

//Content to add to the file
$data = <<<_END
//Source https://en.wikipedia.org/wiki/PHP
    PHP is a general-purpose scripting language geared toward web development.
    It was originally created by Danish-Canadian programmer Rasmus Lerdorf in 1993 
    and released in 1995. 
    The PHP reference implementation is now produced by The PHP Group.
    PHP was originally an abbreviation of Personal Home Page,
    but it now stands for the recursive initialism PHP: Hypertext Preprocessor.
_END;

//Call the functions
createFileIfNotExists($fileNameLocation);
writeFileIfEmpty($fileNameLocation, $data);

function notification(){
    //Message to display
    $message = array();
    $message['file-exist'] = "The file is not created because it already exists<br/>";
    $message['file-created'] = "The file is successfully created<br/>";
    $message['file-written'] = "The file is successfully written<br/>";
    $message['file-not-written'] = "The text was not added to the file because it already exists<br/>";
    return $message;
}
function createFileIfNotExists($fileNameLocation){
    $message=notification();
    if (file_exists($fileNameLocation) === TRUE)
        echo $message['file-exist'];
    else {
        //Create the file using fopen()-The first time it creates it
        $open_cmd = fopen($fileNameLocation, 'w') or die("The file cannot be created.");
        echo $message['file-created'];
        fclose($open_cmd);
    }
}

function writeFileIfEmpty($fileNameLocation, $data){
    $message=notification();
    //Write data to the file when it is empty
    $existing_content = file_get_contents($fileNameLocation);
    if ($existing_content == '') {
        //2.1-Open the file for writing using fopen()-The next times it opens it  
        $open_cmd = fopen($fileNameLocation, 'w') or die("The file cannot be opened for writing.<br/>");
        fwrite($open_cmd, $data) or die("The text cannot be written to the file.<br/>");
        echo $message['file-written'];
        fclose($open_cmd);
    } else {
        echo $message['file-not-written'];
    }
}