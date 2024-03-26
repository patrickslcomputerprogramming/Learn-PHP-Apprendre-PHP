<?php
//Conduct error handling to understand error when there are
//In this exercise there is no plece to display the error retrieved
//That's why $errorMsg is not calculated everywhere, neither used

//STEP 1 - RECEIVE AJAX REQUEST (THIS MEANS THE CHARACTERS TO FIND IN THE BEGINNING OF THE NAMES)
// get the q parameter from URL
$q = $_REQUEST["rqst"];


//STEP 2 - RETRIEVE DATA FROM THE DATABASE
//Login info 
define('HOST', 'localhost');
define('USER', 'root');
define('PASS', '');

//DB Info
$dbname = "infoqc";
$tablename = "regions";

//1-Connect to the DBMS MySQL
//1-Se connecter au SGBD MySQL
try {
    $connection = new mysqli(HOST, USER, PASS);
} catch (mysqli_sql_exception $errorMysqli) {
    $errorMsg = "Something went wrong" . $errorMysqli;
}

//2-Select the DB when it already exists
//Or create the DB if it doesn't exist yet 
//2-Selectionner la DB si elle existe
//Ou creer la DB si elle n'exite pas encore
try {
    $sqlCode = "USE $dbname";
    $connection->query($sqlCode);
} catch (mysqli_sql_exception) {
    //Hope the creation will work successfully, no error handling is conducted
    //Conduct error handling to make sure there's no error
    $connection->multi_query(file_get_contents("createDBStructureInsert.sql")); 
}

//3-DisConnect from the DBMS MySQL
//3-Se deconnecter du SGBD MySQL
try {
    $connection->close();
} catch (mysqli_sql_exception $errorMysqli) {
    $errorMsg = "Something went wrong" . $errorMysqli;
}

// --------------------------------------------------

//1-Connect to the DBMS MySQL
//1-Se connecter au SGBD MySQL
try {
    $connection = new mysqli(HOST, USER, PASS);
} catch (mysqli_sql_exception $errorMysqli) {
    $errorMsg = "Something went wrong" . $errorMysqli;
}

//2-Select the DB when it already exists
//Or create the DB if it doesn't exist yet 
//2-Selectionner la DB si elle existe
//Ou creer la DB si elle n'exite pas encore
try {
    $sqlCode = "USE $dbname";
    $connection->query($sqlCode);
} catch (mysqli_sql_exception) {
    //Hope the creation will work successfully, no error handling is conducted
    //Conduct error handling to make sure there's no error
   $errorMsg = "Something went wrong" . $errorMysqli; 
}

//3-Select all columns of the TABLE regions
//3-Sélectionner toutes les colonnes de la TABLE regions
try {
    $sqlCode = "SELECT * FROM `$tablename`;";
    $resultSet = $connection->query($sqlCode);
} catch (mysqli_sql_exception $errorMysqli) {
    $errorMsg = "Something went wrong" . $errorMysqli;
}

//STEP 3 - SELECT NAMES THAT STARTS WITH THE CHARACTERS RECEIVED IN THE REQUEST
$correspondingName = "";
// lookup all hints from array if $q is different from ""
if ($q !== "") {
    $q = strtolower($q);
    $len = strlen($q);
    //4-Retrieve the result set returned by the Select Query 
    foreach ($resultSet as $each_row) {
        foreach ($each_row as $columnName => $regionName) {
            //Compare each region name retrieved fron the db with the data received in the request
            if (stristr($q, substr($regionName, 0, $len))) {
                if ($correspondingName === "") {
                    $correspondingName = $regionName;
                } else {
                    $correspondingName .= ", $regionName";
                }
            }
        }
    }
}

//5-DisConnect from the DBMS MySQL
//5-Se deconnecter du SGBD MySQL
try {
    $connection->close();
} catch (mysqli_sql_exception $errorMysqli) {
    $errorMsg = "Something went wrong" . $errorMysqli;
}

//STEP 4 - ANSWER THE REQUEST (THIS MEANS SEND THE NAMES FOUND) 
// Output hints when there are, or nothing when there aren't
echo $correspondingName;
