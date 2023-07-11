<?php 
    //Querying a MySQL Database with PHP using the class PDO
    //Access 1 time the content of the file mylogin.php and don't continue the program if this file is not found 
    require_once 'mylogin.php'; 
    
    //1. Connect to MySQL and select the database to use.
    try {
        $connection = new PDO("mysql:dbname=$database;host=$hostname", $username, $password);
    }  
    //Display an error message if connection to the database fails
    catch (PDOException $error) {
        die("Connection to DBMS & DB failed <br>".$error->getMessage());
    }

    //Sql code for selecting data from a table
    $sqlCode = "SELECT * FROM employees";

    //2. Select data from the Table
    try {
        $result=$connection->query($sqlCode);
    }  
    //Display an error message if select data from the Table failed
    catch (PDOException $error) {
        die("Select from table failed <br>". $error->getMessage());
    }  
    
    //3-Displat the data selected from the table
    //If select data from the Table succeeds display the rows 
    if ($result=$connection->query($sqlCode)) {
        //$result=$connection->query($query);
        while($row = $result->fetch()) {
            echo "ID: $row[0]<br> First Name: $row[1]<br> Last Name: $row[2]<br>  Email: $row[3] <br><br>";
        }
    } 

    //4. Disconnect from MySQL.
    unset($connection);

?>