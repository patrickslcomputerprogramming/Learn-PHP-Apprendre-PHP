<?php
//STEP 1 - SAVE DATA TO THE DATABASE IF NOT EXISTS AND RETRIEVE THEM 
// Array of administrative regions names of Quebec
$adminRegionQC=array();
$adminRegionQC[] = "Bas-Saint-Laurent";
$adminRegionQC[] = "Saguenay–Lac-Saint-Jean";
$adminRegionQC[] = "Capitale-Nationale";
$adminRegionQC[] = "Mauricie";
$adminRegionQC[] = "Estrie";
$adminRegionQC[] = "Montréal";
$adminRegionQC[] = "Outaouais";
$adminRegionQC[] = "Côte-Nord";
$adminRegionQC[] = "Nord-du-Québec";
$adminRegionQC[] = "CRÉ de la Baie-James";
$adminRegionQC[] = "Cree Regional Authority";
$adminRegionQC[] = "Kativik Regional Government";
$adminRegionQC[] = "Gaspésie–Îles-de-la-Madeleine";
$adminRegionQC[] = "Chaudière-Appalaches";
$adminRegionQC[] = "Laval";
$adminRegionQC[] = "Lanaudière";
$adminRegionQC[] = "Laurentides";
$adminRegionQC[] = "Montérégie";
$adminRegionQC[] = "CRÉ de Longueuil";
$adminRegionQC[] = "CRÉ Montérégie Est";
$adminRegionQC[] = "CRÉ Vallée-du-Haut-Saint-Laurent";
$adminRegionQC[] = "Centre-du-Québec";

//Login info 
define('HOST','localhost');
define('USER','root');
define('PASS','');

$dbname="infoqc";
$tablename="regions";

//1-Connect to the DBMS MySQL
//1-Se connecter au SGBD MySQL
$connection = new mysqli(HOST, USER, PASS); 

//2-Create the DB customer if it doesn't exist yet
//2-Créer la BD customer si elle n'existe pas encore
$connection->query("CREATE DATABASE IF NOT EXISTS $dbname;");

//3-Connect to the DB customer
//3-Se connecter à la BD customer
mysqli_select_db($connection, $dbname);

//4-Create the TABLE regions if it doesn't exist yet
//4-Créer la TABLE regions si elle n'existe pas encore
$createTbPlayer=$connection->query(
  "CREATE TABLE IF NOT EXISTS `$tablename` (
  `name` varchar(80) NOT NULL,
  PRIMARY KEY  (`name`)
  );"
);

//6-Insert data into the TABLE regions
//6-Insérer des données dans la TABLE regions
foreach ($adminRegionQC as $item){
    $result=$connection->query("INSERT INTO `$tablename` VALUES ('$item');") ;
    //If data insertion to the table failed save the system error message  
        //if ($result === FALSE) 
            //die ("Failed to Insert ". $connection->error);
}

//7-Select all columns of the TABLE regions
//7-Sélectionner toutes les colonnes de la TABLE regions
  $result=$connection->query("SELECT * FROM `$tablename`;"); 
  if ($result === FALSE) 
            die ("Failed to Insert ". $connection->error);

//8-Save the data selected from the TABLE Player 
//8-Enregistrer les données sélectionnées de la TABLE Player
$count_row = $result->num_rows;
$adminRegionQC_DB=array();
for ($i = 1 ; $i <= $count_row ; ++$i){
    $each_row = $result->fetch_array(MYSQLI_ASSOC);
    foreach ($each_row as $section => $item)
    $adminRegionQC_DB[]=$item;
}

//STEP 2 - RECEIVE AJAX REQUEST (THIS MEANS THE CHARACTERS TO FIND IN THE BEGINNING OF THE NAMES)
// get the q parameter from URL
$q = $_REQUEST["rqst"];

//STEP 3 - SELECT NAMES THAT STARTS WITH THE CHARACTERS RECEIVED IN THE REQUEST
$correspondingName = "";
// lookup all hints from array if $q is different from ""
if ($q !== "") {
  $q = strtolower($q);
  $len=strlen($q);
  foreach($adminRegionQC_DB as $name) {
    if (stristr($q, substr($name, 0, $len))) {
      if ($correspondingName === "") {
        $correspondingName = $name;
      } else {
        $correspondingName .= ", $name";
      }
    }
  }
}

//STEP 4 - ANSWER THE REQUEST (THIS MEANS SEND THE NAMES FOUND) 
// Output hints when there are, or nothing when there aren't
echo $correspondingName;



?>
