<?php
/**
 *demonstration class14.php
 *Insert and Select data from MySQL using MySQLi
 */
//Form Handling
//Go below only after a user pressed the input button name="send" of index.php 
if (isset($_POST['send'])) {
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
           

            /*
            0-CREATE A DATABASE AND INSERT ROWS TO IT
            */
            /*
            CREATE DATABASE users;
            CREATE TABLE employees(
            id INT(5) PRIMARY KEY AUTO_INCREMENT,
            firstname VARCHAR(35) NOT NULL,
            lastname VARCHAR(35) NOT NULL,
            email VARCHAR(35) NOT NULL
            );
            INSERT INTO employees (firstname, lastname, email)
            VALUES ("fname1","lname1","fl1@fl1.fl1");
            INSERT INTO employees (firstname, lastname, email)
            VALUES ("fname2","lname2","fl2@fl2.fl2");
            INSERT INTO employees (firstname, lastname, email)
            VALUES ("fname3","lname3","fl3@fl3.fl3");
            INSERT INTO employees (firstname, lastname, email)
            VALUES ("fname4","lname4","fl4@fl4.fl4");
            */
           
            /*
            1-CONNECT TO THE DBMS MySQL using MySQLi
            */

            //Login info 
            $hostname = 'localhost';
            $username = 'root';
            $password = '';
            $database = 'users';

            //mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);

            //Attempt to connect to MySQL using MySQLi
            $connection = new mysqli($hostname, $username, $password);
            //If connection to the MySQL failed display an error message
            if ($connection->connect_error)
                die("Connection to MySQL failed! <br>" . mysqli_connect_error());

            //If connection to MySQL succeed continue 
/*
2-CONNECT TO THE DATABASE
*/else {
                //Attempt to connect to the Database
                $check_connect_to_db = mysqli_select_db($connection, $database);
                //If connection to the Database failed create the database
                if ($check_connect_to_db === FALSE) {
                    //SQL query
                    $sql_create_db = "CREATE DATABASE $database";
                    //Execute the query
                    $create_db = $connection->query($sql_create_db);
                    //If the Database creation failed display an error message  
                    if ($create_db === FALSE)
                        die("Attempt to create the DB failed!<br/>" . $connection->error);
                    //If the Database creation succeed connect to it
                    else {
                        $check_connect_to_db = mysqli_select_db($connection, $database);
                        //If connection to the database created failed display an error message
                        if ($check_connect_to_db === FALSE)
                            die("Connection to the DB failed!<br/> " . $connection->error);
                    }
                }
            }

            /*
            3-CONNECT TO THE TABLE
            */
            //If connection to the database succeed check that the tables needed exist 
            $sql_desc_table = "DESC employees";
            $check_table_exists = $connection->query($sql_desc_table);
            //If the tables needed do not exist attempt to create them
            if ($check_table_exists === FALSE) {
                //SQL query
                $sql_create_table = "CREATE TABLE employees(
                        id INT(5) PRIMARY KEY AUTO_INCREMENT,
                        firstname VARCHAR(35) NOT NULL,
                        lastname VARCHAR(35) NOT NULL,
                        email VARCHAR(35) NOT NULL
                        ) CHARACTER SET utf8 COLLATE utf8_general_ci;";
                //Execute the query
                $create_table = $connection->query($sql_create_table);
                //If table creation failed display an error message
                if ($create_table === FALSE)
                    die("Creation of the Table employees failed!<br>" . $connection->error);
            }
            /*
            4-INSERT A RECORD TO THE TABLE
            */
                //SQL query
                $sql_insert_query = "INSERT INTO employees (firstname, lastname, email)
                                VALUES ('$theFirstName', '$theLastName', '$theEmail')";
                //Execute the query
                $insert_query = $connection->query($sql_insert_query);
                //If data insertion to the table failed display an error message 
                if ($insert_query === FALSE)
                    die("Data insertion to the Table failed!<br>" . $connection->error);
                    
                    
            /*
            5-SELECT AND DISPLAY RECORDS FROM THE TABLE
            */
            //SQL query
            $sql_select_query = "SELECT * FROM employees";
            //Execute the query
            $select_query = $connection->query($sql_select_query);
            //If data selection failed, display an error message
            if ($select_query === FALSE)
                die("Data selection from the Table failed!<br/>" . $connection->error);
            else {
                //If data selection succeed calculate the number of rows available
                $number_of_rows = $select_query->num_rows;
                //Use a loop to display the rows one by one
                echo "<table>";
                echo "<tr><th>ID</th><th>First Name</th><th>Last Name</th><th>Email</th></tr>";
                for ($j = 0; $j < $number_of_rows; ++$j) {
                    echo "<tr>";
                    //Assign the records of each row to an associative array
                    $each_row = $select_query->fetch_array(MYSQLI_ASSOC);
                    //Display each the record corresponding to each column
                    echo "<td>" . $each_row['id'] . "</td>";
                    echo "<td>" . $each_row['firstname'] . "</td>";
                    echo "<td>" . $each_row['lastname'] . "</td>";
                    echo "<td>" . $each_row['email'] . "</td>";
                    echo "</tr>";
                }
                echo "</table>";

                /*
                6-CLOSE THE CONNECTION TO THE DBMS
                */
                $connection->close();
            }
}
?>
        <div id="back">
            <a href="index.php"><input type="submit" value="Try again!"></a>
        </div>
    </div>
</body>

</html>