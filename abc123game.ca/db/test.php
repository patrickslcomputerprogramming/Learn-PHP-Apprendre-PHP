<?php
require_once "Database.php";
require_once "Create.php";
require_once "Insert.php";
require_once "Select.php";
require_once "Update.php";

//Object for creating database, tables, and views
$objCreation = new Create;
var_dump ($objCreation);

//Set the TimeZone
date_default_timezone_set('America/Montreal');

//Calculate time - format 2023-06-08 13:28:18
//Use FROM_UNIXTIME($current_timestamp) to convert it in MySQL
$format="Y-m-d H:i:s";
$current_timestamp=time();

//Object for adding a new Table row 
$objIdentity = new Insert('insertIdentity',
    $fn='Ralph', $ln='Maggie', $un='king1', $rt="FROM_UNIXTIME($current_timestamp)", 
    $pc='',$ro='', 
    $st='', $fr='', $lu='');

var_dump ($objIdentity);


//Object for selecting all Usernames
$objAllUnames = new Select('selectAllUn', $un='', $ro='');
$dataFound=$objAllUnames->selectFromTAB();
//Display selected Usernames
if (is_array($dataFound)){ 
    foreach($dataFound as $section => $items)
    foreach($items as $key => $value)
        echo "$section:\t$key:\t$value<br>";
}
else{
    echo "No data corresponds to the SELECT Query!";
}

var_dump ($dataFound);

//Object for updating Passwords
$pc='helloquebec';
$pc=password_hash($pc, PASSWORD_DEFAULT);
$ro=1;
$objCode = new Update('updateCode',$pc,$ro);


