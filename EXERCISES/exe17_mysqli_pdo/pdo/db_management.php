<?php

//-----------------------------------------------------------------
//-------- FEATURE 1: CREATE THE DATABASE AND TABLE STRUCTURE -----
//-----------------------------------------------------------------

//1-CONNECT TO THE DATABASE MANAGEMENT SYSTEM (DBMS) MYSQL 
try {
    $connection = new PDO("mysql:host=".HOSTNAME, USERNAME, PASSWORD);
} catch (PDOException $error) {
    //If the connection failed, display error message and stop the script
    die("Connection to MySQL failed! <br>" . $error);
}

//2-CREATE THE DATABASE STRUCTURE IF IT DOESN'T EXIST YET
try {
    $connection->exec(file_get_contents("db_structure.sql"));
} catch (PDOException $error) {
    //If the creation failed, display error message and stop the script
    die("Creation of Database and Tables failed! <br>" . $error);
}

//3-DISCONNECT FROM THE DATABASE MANAGEMENT SYSTEM (DBMS) MYSQL
try {
    unset($connection);
} catch (PDOException $error) {
    //If the disconnection failed, display error message and stop the script
    die("Disconnection from MySQL failed!<br/>" . $error);
}


//-----------------------------------------------------------------
//-------- FEATURE 2: INSERT 1 RECORD -----------------------------
//-------- SELECT and DISPLAY ALL RECORD --------------------------
//-----------------------------------------------------------------

//1-CONNECT TO THE DATABASE MANAGEMENT SYSTEM (DBMS) MYSQL 
try {
    $connection = new PDO("mysql:host=".HOSTNAME, USERNAME, PASSWORD);
} catch (PDOException $error) {
    //If the connection failed, display error message and stop the script
    die("Connection to MySQL failed! <br>" . $error);
}

//2-SELECT THE DATABASE
try {
    $sqlCode = "USE users";
    $connection->query($sqlCode);
} catch (mysqli_sql_exception $error) {
    //If the selection failed, display error message and stop the script
    die("Connection to the Database failed!<br/> " . $error);
}

//3-CHECK IF THE TABLE EXISTS 
try {
    $sqlCode = "DESC employees";
    $connection->query($sqlCode);
} catch (mysqli_sql_exception $error) {
    //If the description failed, display error message and stop the script
    die("Description of the Table failed!<br/> " . $error);
}

//4-INSERT A RECORD INTO THE TABLE 
try {
    $sqlCode = "INSERT INTO employees (firstname, lastname, email) 
                VALUES ('$theFirstName', '$theLastName', '$theEmail')";
    $connection->query($sqlCode);
} catch (mysqli_sql_exception $error) {
    //If the insertion failed, display error message and stop the script
    die("Data insertion into the Table failed!<br>" . $error);
}

//5-SELECT ALL THE EXISTING RECORDS INTO THE TABLE AND DISPLAY THEM
try {
    $sqlCode = "SELECT * FROM employees";
    $selectRecords = $connection->query($sqlCode);
    //Use a loop to display the records one by one in a HTML table
    echo "<table>";
    echo "<tr><th>ID</th><th>First Name</th><th>Last Name</th><th>Email</th></tr>";
    while($each_row = $selectRecords->fetch(PDO::FETCH_ASSOC)) {
        echo "<tr>";
        echo "<td>" . $each_row['id'] . "</td>";
        echo "<td>" . $each_row['firstname'] . "</td>";
        echo "<td>" . $each_row['lastname'] . "</td>";
        echo "<td>" . $each_row['email'] . "</td>";
        echo "</tr>";
    }
    echo "</table>";
} catch (mysqli_sql_exception $error) {
    //If the selection failed, display error message and stop the script
    die("Data selection from the Table failed!<br/>" . $error);
}

//6-DISCONNECT FROM THE DATABASE MANAGEMENT SYSTEM (DBMS) MYSQL
try {
    unset($connection);
} catch (mysqli_sql_exception $error) {
    //If the disconnection failed, display error message and stop the script
    die("Disconnection from MySQL failed!<br/>" . $error);
}

