<?php

//Login info 
define('HOSTNAME', 'localhost');
define('USERNAME', 'root');
define('PASSWORD', '');

//-----------------------------
//FEATURE 1: CREATE THE DATABASE AND TABLE STRUCTURE
//-----------------------------
//1-CONNECT TO THE DATABASE MANAGEMENT SYSTEM (DBMS) MYSQL
$connection = new mysqli(HOSTNAME, USERNAME, PASSWORD);
//2-CREATE THE DATABASE STRUCTURE IF IT DOESN'T EXIST YET
$createStructure = $connection->multi_query(file_get_contents("final_project_demonst.sql"));
//3-DISCONNECT FROM THE DATABASE MANAGEMENT SYSTEM (DBMS) MYSQL
$connection->close();

//-----------------------------
//FEATURE 2: INSERT 1 RECORD
//-----------------------------
//1-CONNECT TO THE DATABASE MANAGEMENT SYSTEM (DBMS) MYSQL
$connection = new mysqli(HOSTNAME, USERNAME, PASSWORD);
//2-SELECT THE DATABASE
$selectDBUsers = mysqli_select_db($connection, "kidsGames");
//3-CHECK IF THE TABLE EXISTS 
$sqlCode = "DESC player";
$describeTable = $connection->query($sqlCode);
//4-INSERT A RECORD INTO THE TABLE 
$sqlCode = "INSERT INTO player(fName, lName, userName, registrationTime)
VALUES('Patrick','Saint-Louis', 'sonic12345', now()); ";
$insertRecords = $connection->query($sqlCode);
//5-DISCONNECT FROM THE DATABASE MANAGEMENT SYSTEM (DBMS) MYSQL
$connection->close();

//-----------------------------
//FEATURE 3: SELECT ALL RECORDS
//-----------------------------
//1-CONNECT TO THE DATABASE MANAGEMENT SYSTEM (DBMS) MYSQL
$connection = new mysqli(HOSTNAME, USERNAME, PASSWORD);
//2-SELECT THE DATABASE
$selectDBUsers = mysqli_select_db($connection, "kidsGames");
//3-CHECK IF THE TABLE EXISTS 
$sqlCode = "DESC player";

//4-SELECT ALL THE EXISTING RECORDS INTO THE TABLE AND DISPLAY THEM
$sqlCode = "SELECT * FROM player";
    $selectRecords = $connection->query($sqlCode);
    //Calculate the number of records (or rows) available
    $number_of_rows = $selectRecords->num_rows;
    //Use a loop to display the records one by one in a HTML table
    for ($j = 0; $j < $number_of_rows; ++$j) {
        //Assign the records of each row to an associative array
        $each_row = $selectRecords->fetch_array(MYSQLI_ASSOC);
        //Display each the record corresponding to each column
        echo "<p>" . $each_row['fName'] . "</p>";
        echo "<p>" . $each_row['lName'] . "</p>";
        echo "<p>" . $each_row['userName'] . "</p>";
        echo "<p>" . $each_row['registrationTime'] . "</p>";
        echo "<p>" . $each_row['id'] . "</p>";
        echo "<p>" . $each_row['registrationOrder'] . "</p>";
    }
//5-DISCONNECT FROM THE DATABASE MANAGEMENT SYSTEM (DBMS) MYSQL
$connection->close();


