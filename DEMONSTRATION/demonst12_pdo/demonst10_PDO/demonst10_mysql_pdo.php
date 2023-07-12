<?php
/**
 *demonstration 
 *Insert and Select data from MySQL using PDO
*/
?>
    <!DOCTYPE html>
    <html>

    <head>
        <title>Answer</title>
        <!--<link rel="stylesheet" href="style.css">-->
    </head>

    <body>
        <div class="container">
            <h1 class="blueText">Registration List</h1>
            <hr />
            <?php
           

            //Assign data collected from the form
            $theFirstName= 'Tuesday';  
            $theLastName= "Morning";
            $theEmail= 'tm@tm.tm';

            //Login info 
            $hostname = 'localhost';
            $username = 'root';
            $password = '';
            $database = 'users';
            $table = 'employees';

            //1-CONNECT TO MYSQL USING PDO
            //Display an error message if the connection to the database failed
            try {
                $connection = new PDO("mysql:host=$hostname", $username, $password);
            }  
            catch (PDOException $error) { 
                die("Connection to DBMS & DB failed <br>".$error->getMessage());
            }
 
            //2-CREATE THE DATABASE IF IT DOESN'T EXIST YET
            //Display an error message if the creation of the database failed
            try {
                $sqlCode = "CREATE DATABASE IF NOT EXISTS $database;";
                $connection->query($sqlCode);
            }  
            catch (PDOException $error) {
                die("Creation of the DB failed <br>".$error->getMessage());
            }
            
            //3-SELECT THE DATABASE  
            //Display an error message if the selection of the database failed
            try {
                $sqlCode = "USE $database;";
                $connection->query($sqlCode);
            }  
            catch (PDOException $error) {
                die("Selection of the DB $database failed <br>".$error->getMessage());
            }

            //4-CREATE THE TABLE IF IT DOESN'T EXIST YET
            //Display an error message if the creation of the table failed
            try {
                $sqlCode = "CREATE TABLE IF NOT EXISTS $table(
                    id INT(5) PRIMARY KEY AUTO_INCREMENT,
                    firstname VARCHAR(35) NOT NULL,
                    lastname VARCHAR(35) NOT NULL,
                    email VARCHAR(35) NOT NULL
                    ) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;";
                $connection->query($sqlCode);
            }  
            catch (PDOException $error) {
                die("Creation of the Table $table failed <br>".$error->getMessage());
                
            }

            //5-INSERT DATA TO THE TABLE
            //Display an error message if the creation of the table failed
            try {
                $sqlCode = "INSERT INTO employees (firstname, lastname, email)
                    VALUES ('$theFirstName', '$theLastName', '$theEmail')";
                $connection->query($sqlCode);
            }  
            catch (PDOException $error) {
                die("Data insertion into the Table $table failed <br>".$error->getMessage());
            }

            //6-SELECT DATA FROM THE TABLE 
            //Display an error message if the creation of the table failed
            try {
                $sqlCode = "SELECT * FROM employees";
                $result = $connection->query($sqlCode);
            }  
            catch (PDOException $error) {
                die("Data selection from the Table $table failed <br>".$error->getMessage()); 
            }

            //7-Display the data selected from the table
            echo "<table>";
            echo "<tr><th>ID</th><th>First Name</th><th>Last Name</th><th>Email</th></tr>";
            while($each_row = $result->fetch(PDO::FETCH_ASSOC)) {
                echo "<tr>";
                echo "<td>" . $each_row['id'] . "</td>";
                echo "<td>" . $each_row['firstname'] . "</td>";
                echo "<td>" . $each_row['lastname'] . "</td>";
                echo "<td>" . $each_row['email'] . "</td>";
                echo "</tr>";
            }

            //8-DISCONNECT TO MYSQL 
            unset($connection);

?>
