<?php

function createDatabaseAndTable($dbName, $tableName) {
    //SQL query
    $sql['createDB'] = "CREATE DATABASE IF NOT EXISTS $dbName";
    $sql['createTable'] = "CREATE TABLE IF NOT EXISTS $tableName(
        id INT(5) PRIMARY KEY AUTO_INCREMENT,
        firstname VARCHAR(35) NOT NULL,
        lastname VARCHAR(35) NOT NULL,
        email VARCHAR(35) NOT NULL
        ) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;";
    $sql['descTable'] = "DESC $tableName;";

    //1-CONNECT TO MYSQL
    connectToMySQL(HOST, USER, PASS);
    //2-EXECUTE THE QUERY TO CREATE THE DATABASE IF IT DOESN'T EXIST YET
    executeQuery($sql['createDB']);
    //3-SELECT THE DATABASE
    selectDatabase($dbName);
    //4-EXECUTE THE QUERY TO CREATE THE TABLE IF IT DOESN'T EXIST YET
    executeQuery($sql['createTable']);
    //5-EXECUTE THE QUERY TO DESCRIBE THE TABLE
    executeQuery($sql['descTable']);
    //6-CLOSE THE CONNECTION TO MYSQL
    closeMySQL();
}


function insertToTable($dbName, $tableName, $theFirstName, $theLastName, $theEmail) {
    //SQL 
    $sql['descTable'] = "DESC $tableName;";
    $sql['insertAllColumns'] = "INSERT INTO employees (firstname, lastname, email)
        VALUES ('$theFirstName', '$theLastName', '$theEmail');";
    
    //1-CONNECT TO MYSQL
    connectToMySQL(HOST, USER, PASS);
    //2-SELECT THE DATABASE
    selectDatabase($dbName);
    //3-EXECUTE THE QUERY TO DESCRIBE THE TABLE
    executeQuery($sql['descTable']);
    //4-EXECUTE THE QUERY TO INSERT INTO THE TABLE
    executeQuery($sql['insertAllColumns']);
    //5-CLOSE THE CONNECTION TO MYSQL
    closeMySQL();
}

function displayTwoDimAssocArray($array){
    echo "<table>";
    echo "<tr><th>ID</th><th>First Name</th><th>Last Name</th><th>Email</th></tr>";
    foreach($array as $section => $items){
        echo "<tr>";
        foreach($items as $key => $value){
            echo "<td>$value</td>";
        }
        echo "</tr>";
    }
    echo "</table>";
}

function selectAndDisplayFromTable($dbName, $tableName) {
    //SQL 
    $sql['descTable'] = "DESC $tableName;";
    $sql['selectAllColumns'] = "SELECT * FROM $tableName;";

    //1-CONNECT TO MYSQL
    connectToMySQL(HOST, USER, PASS);
    //2-SELECT THE DATABASE
    selectDatabase($dbName);
    //3-EXECUTE THE QUERY TO DESCRIBE THE TABLE
    executeQuery($sql['descTable']);
    //4-EXECUTE THE QUERY TO SELECT FROM THE TABLE
    $dataFound = executeQuery($sql['selectAllColumns']);
    //5-CLOSE THE CONNECTION TO MYSQL
    closeMySQL();
    //6-DISPLAY THE DATA SELECTED
    displayTwoDimAssocArray($dataFound);
}