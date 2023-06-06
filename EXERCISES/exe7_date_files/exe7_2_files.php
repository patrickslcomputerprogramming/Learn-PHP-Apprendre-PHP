<?php

/**
 *exe7_2_files.php
 *EXERCISE 7 NUMBER 2
 *Patrick Saint-Louis, 2023
*/

//File path and location
$fileNameLocation = "C:/wamp64/www/dw3/file-test-class.txt";

//Content to add to the file
$data = <<<_END
//Source https://en.wikipedia.org/wiki/PHP
        PHP est un langage de script à usage général orienté vers le développement Web.
        Il a été créé à l'origine par le programmeur danois-canadien Rasmus Lerdorf en 1993
        et sorti en 1995.
        L'implémentation de référence PHP est maintenant produite par The PHP Group.
        PHP était à l'origine une abréviation de Personal Home Page,
        mais il représente maintenant l'initialisme récursif PHP : Hypertext Preprocessor.
_END;

//Message to display
$message = array();
$message['file-exist'] = "Le fichier n'est pas créé car il existe déjà<br/>" ;
$message['file-created'] = "Le fichier a été créé avec succès<br/>" ;
$message['file-written'] = "Le fichier a été écrit avec succès<br/>" ;
$message['file-not-written'] = "Le texte n'a pas été ajouté au fichier car il existe déjà<br/>" ;

if (file_exists($fileNameLocation) === TRUE)
    echo $message['file-exist'];
else {
    //Create the file using fopen()-The first time it creates it
    $open_cmd = fopen($fileNameLocation, 'w') or die("The file cannot be created.");
    echo $message['file-created'];
    fclose(fopen($fileNameLocation, 'w'));
}
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


/*
//ENGLISH VERSION

//File path and location
$fileNameLocation = "C:/wamp64/www/dw3/newfolder/test.txt";

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

//Message to display
$message = array();
$message['file-exist'] = "The file is not created because it already exists<br/>";
$message['file-created'] = "The file is successfully created<br/>";
$message['file-written'] = "The file is successfully written<br/>";
$message['file-not-written'] = "The text was not added to the file because it already exists<br/>";


if (file_exists($fileNameLocation) === TRUE)
    echo $message['file-exist'];
else {
    //Create the file using fopen()-The first time it creates it
    $open_cmd = fopen($fileNameLocation, 'w') or die("The file cannot be created.");
    echo $message['file-created'];
    fclose(fopen($fileNameLocation, 'w'));
}
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

*/
