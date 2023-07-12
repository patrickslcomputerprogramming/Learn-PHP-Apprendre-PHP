<?php
/**
 *
 *EXERCISE 15 VERSION 2
 *Patrick Saint-Louis, 2023
*/
?>
<!DOCTYPE html>
<html>

    <head>
        <title>Answer</title>
        <link rel="stylesheet" href="style.css">
    </head>

    <body>
        <div class="container">
            <h1 class="blueText">Registration List</h1>
            <hr />
            <?php
            //Assign data collected from the form
            $theFirstName= $_POST['fname'];  
            $theLastName= $_POST['lname'];
            $theEmail= $_POST['email'];

            //Declare variables and constants
            
            //Login info 
            const HOST = 'localhost';
            const USER = 'root';
            const PASS = '';
            const DB = 'users';

            //DB info
            $dbName = "users"; 
            $tableName = "employees";

            //Load the content of the user-defined functions used to interact with MySQL
            include_once "general_functions.php";
            include_once "specific_functions.php";

            //Call the user-defined functions used to interact with MySQL 
            //Create the database and table
            createDatabaseAndTable($dbName, $tableName);
            //Insert a row to the table 
            insertToTable($dbName, $tableName, $theFirstName, $theLastName, $theEmail);
            //Select all rows from the table and display them
            selectAndDisplayFromTable($dbName, $tableName)
        ?>
        <div id="back">
            <a href="index.php"><input type="submit" value="Try again!"></a>
        </div>
    </body>
</html>
