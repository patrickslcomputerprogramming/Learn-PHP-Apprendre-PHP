<?php
/*
Simple process to connect the script with MySQL via MySQLi
Without showing error messages when there are.
Processus simple pour connecter le script à MySQL via MySQLi
Sans afficher les messages d'erreur lorsqu'il y en a.
*/

//User data
$password='mypoPass84!';
$passCode=password_hash($password, PASSWORD_DEFAULT);
$firstname='Patrick';
$lastname='Saint-Louis';
$username='SaiVid456';
$currentTime='now()';

//Login info 
define('HOST','localhost');
define('USER','root');
define('PASS','');

//Database info
$dbname1='kidsgames';
$tabname1='player';
$tabname2='authenticator';
$tabname3='score';
$vwname1='history';

//1-Connect to the DBMS MySQL
//1-Se connecter au SGBD MySQL
$connection = new mysqli(HOST, USER, PASS);

//2-Create the DB customer if it doesn't exist yet
//2-Créer la BD customer si elle n'existe pas encore
$connection->query("CREATE DATABASE IF NOT EXISTS $dbname1;");

//3-Connect to the DB customer
//3-Se connecter à la BD customer
mysqli_select_db($connection, $dbname1);

//4-Create the TABLES if they doesn't exist yet
//4-Créer les TABLES si elle n'existent pas encore
$createTbPlayer=$connection->query("CREATE TABLE IF NOT EXISTS $tabname1( 
    fName VARCHAR(50) NOT NULL, 
    lName VARCHAR(50) NOT NULL, 
    userName VARCHAR(20) NOT NULL UNIQUE,
    registrationTime DATETIME NOT NULL,
    id VARCHAR(200) GENERATED ALWAYS AS (CONCAT(UPPER(LEFT(fName,2)),UPPER(LEFT(lName,2)),UPPER(LEFT(userName,3)),CAST(registrationTime AS SIGNED))),
    registrationOrder INTEGER AUTO_INCREMENT,
    PRIMARY KEY (registrationOrder)
)CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;");

$connection->query("CREATE TABLE IF NOT EXISTS $tabname2(   
    passCode VARCHAR(255) NOT NULL,
    registrationOrder INTEGER, 
    FOREIGN KEY (registrationOrder) REFERENCES player(registrationOrder)
)CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;");

$connection->query("CREATE TABLE $tabname3( 
    scoreTime DATETIME NOT NULL, 
    result ENUM('success', 'failure', 'incomplete'),
    livesUsed INTEGER NOT NULL,
    registrationOrder INTEGER, 
    FOREIGN KEY (registrationOrder) REFERENCES player(registrationOrder)
)CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;");

$connection->query("CREATE VIEW $vwname1 AS
SELECT s.scoreTime, p.id, p.fName, p.lName, s.result, s.livesUsed 
FROM player p, score s
WHERE p.registrationOrder = s.registrationOrder;");

//5-Check that the TABLES exist
//5-Vérifier si les TABLES existent
$connection->query("DESC player;");
$connection->query("DESC authenticator;");
$connection->query("DESC score;");
$connection->query("DESC history;");

//6-Insert data into the TABLE Player
//6-Insérer des données dans la TABLE Player
$connection->query("INSERT INTO player(fName, lName, userName, registrationTime)
VALUES('$firstname','$lastname', '$username', $currentTime);");

//7-Select 1 column from a row of the TABLE Player
//7-Sélectionner 1 colonne d'un enregistrement de la TABLE Player
$result=$connection->query("SELECT registrationOrder FROM player WHERE userName='$username';"); 

//8-Save the data selected from the TABLE Player 
//8-Enregistrer les données sélectionnées de la TABLE Player
$count_row = $result->num_rows;
for ($i = 1 ; $i <= $count_row ; ++$i){
    $each_row = $result->fetch_array(MYSQLI_ASSOC);
    foreach ($each_row as $section => $item)
        $row_saved["row$i"]["$section"]=$item;
}

foreach ($row_saved as $section => $item){
    foreach ($item as $key => $value){
        $oneColumn=$value;
    }
  }

$matching_reg_order=intval($oneColumn);

var_dump($matching_reg_order);
//6-Insert data into the TABLE Authenticator
//6-Insérer des données dans la TABLE Authenticator
$insAuthent=$connection->query("INSERT INTO authenticator(passCode, registrationOrder)
VALUES('$passCode', $matching_reg_order);");

//9-Disconnect from the DBMS MySQL
//9-Se déconnecter de la SGBD MySQL
$connection->close();
