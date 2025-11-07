<?php
 
try {
    //-----------------------------------------------------------------
    //-------- FEATURE 1: CREATE THE DATABASE AND TABLE STRUCTURE -----
    //-------- DATA DEFINITION ---
    //-----------------------------------------------------------------
    //1-CONNECT TO THE DATABASE MANAGEMENT SYSTEM (DBMS) MYSQL
    $connection = new PDO(dsn: "mysql:host=".HOSTNAME, username: USERNAME, password: PASSWORD);
    //2-CREATE THE DATABASE STRUCTURE IF IT DOESN'T EXIST YET USING THE CODE IN AN EXTERNAL FILE
    $connection->exec(statement: file_get_contents(filename: "db_structure.sql"));
    //3-DISCONNECT FROM THE DATABASE MANAGEMENT SYSTEM (DBMS) MYSQL
    unset($connection);
    //-----------------------------------------------------------------
    //-------- FEATURE 2: INSERT 1 RECORD -----------------------------
    //-------- DATA UPDATE --------------------------
    //-----------------------------------------------------------------
    //1-CONNECT TO THE DATABASE MANAGEMENT SYSTEM (DBMS) MYSQL 
    $connection = new PDO(dsn: "mysql:host=".HOSTNAME, username: USERNAME, password: PASSWORD);
    //2-SELECT THE DATABASE
    $sqlCode = "USE users";
    $connection->query(query: $sqlCode);
    //3-CHECK IF THE TABLE EXISTS 
    $sqlCode = "DESC employees";
    $connection->query(query: $sqlCode);
    //4-INSERT A RECORD INTO THE TABLE    
    /*
    //Regular statement
    $sqlCode = "INSERT INTO employees (firstname, lastname, email) VALUES ('$theFirstName', '$theLastName', '$theEmail')";
    $connection->query($sqlCode);
    */
    //Prepared statement
    $sqlCode = "INSERT INTO employees (firstname, lastname, email) VALUES (?, ?, ?)";        
    $prepStat = $connection->prepare($sqlCode);
    //$prepStat->bind_param('sss', $theFirstName, $theLastName, $theEmail); //s for string ; d for double ; i for int...
    $prepStat->execute(params: [$theFirstName, $theLastName, $theEmail]);
    //echo $prepStat->affected_rows;
    //5-DISCONNECT FROM THE DATABASE MANAGEMENT SYSTEM (DBMS) MYSQL
    //Close the prepared statement object 
    unset($prepStat);
    //Close the mysql object
    unset($connection);
    //-----------------------------------------------------------------
    //-------- FEATURE 3: SELECT ALL RECORDS ---------------
    //-------- DATA RETRIEVAL --------------------------
    //-------- DISPLAY THE RECORDS SELECTED --------------------------
    //-----------------------------------------------------------------
    //1-CONNECT TO THE DATABASE MANAGEMENT SYSTEM (DBMS) MYSQL 
    $connection = new PDO(dsn: "mysql:host=".HOSTNAME, username: USERNAME, password: PASSWORD);
    //2-SELECT THE DATABASE
    $sqlCode = "USE users";
    $connection->query(query: $sqlCode);
    //3-CHECK IF THE TABLE EXISTS 
    $sqlCode = "DESC employees";
    $connection->query(query: $sqlCode);
    //4-SELECT ALL THE EXISTING RECORDS INTO THE TABLE AND DISPLAY THEM
    $sqlCode = "SELECT * FROM employees";
    $selectRecords = $connection->prepare($sqlCode);
    $selectRecords->execute();
    //Calculate the number of records (or rows) available
    $number_of_rows = $selectRecords->rowCount();
    //Use a loop to display the records one by one in a HTML table
    echo "<table>";
    echo "<tr><th>ID</th><th>First Name</th><th>Last Name</th><th>Email</th></tr>";
    for ($j = 0; $j < $number_of_rows; ++$j) {
        echo "<tr>";
        //Assign the records of each row to an associative array
        $each_row = $selectRecords->fetch(PDO::FETCH_ASSOC);
        //Display each the record corresponding to each column
        echo "<td>" . $each_row['id'] . "</td>";
        echo "<td>" . $each_row['firstname'] . "</td>";
        echo "<td>" . $each_row['lastname'] . "</td>";
        echo "<td>" . $each_row['email'] . "</td>";
        echo "</tr>";
    }
    echo "</table>";
    //5-DISCONNECT FROM THE RESULT SET AND THE DATABASE DATABASE MANAGEMENT SYSTEM (DBMS) MYSQL
    unset($selectRecords);
    unset($connection);
} catch (PDOexception $error) {
    //if there an error 
    $msg_erreur['Customized'] = "Something went wrong! Try again!";
    $msg_erreur['Error Message'] = $error->getMessage();
    $msg_erreur['Error File Name'] = $error->getFile();
    $msg_erreur['Error Line Number'] = $error->getLine();
    echo "<table>";
    foreach ($msg_erreur as $key => $value){
        echo "<tr>";
        echo "<td>" . $key . "</td>" ;
        echo "<td>" . $value . "</td>" ;
        echo "</tr>";
    }
    echo "</tr></table>";
}
