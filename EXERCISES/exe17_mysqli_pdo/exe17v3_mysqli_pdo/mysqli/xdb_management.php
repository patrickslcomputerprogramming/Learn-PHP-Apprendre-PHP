<?php

//SPECIFIC USER-DEFINED FUNCTIONS

//-----------------------------------------------------------------
//-------- FEATURE 1: CREATE THE DATABASE AND TABLE STRUCTURE -----
//-------- DATA DEFINITION ---
//-----------------------------------------------------------------
function createDatabaseStructure(){
    //1-CONNECT TO THE DATABASE MANAGEMENT SYSTEM (DBMS) MYSQL
    $connection=connectToMySQL();
    //2-CREATE THE DATABASE STRUCTURE IF IT DOESN'T EXIST YET
    runQueryWithoutResultSet ($connection, file_get_contents("db_structure.sql"));
    //3-DISCONNECT FROM THE DATABASE MANAGEMENT SYSTEM (DBMS) MYSQL
    disconnectToMySQLwithMySQLi($connection);
}

//-----------------------------------------------------------------
//-------- FEATURE 2: INSERT 1 RECORD -----------------------------
//-------- DATA UPDATE --------------------------
//-----------------------------------------------------------------
function insertARecord($theFirstName, $theLastName, $theEmail){
    //1-CONNECT TO THE DATABASE MANAGEMENT SYSTEM (DBMS) MYSQL
    $connection=connectToMySQL();
    //2-SELECT THE DATABASE
    $sqlCode = "USE users";
    runQueryWithoutResultSet ($connection, $sqlCode);
    //3-INSERT A RECORD INTO THE TABLE 
    $sqlCode = "INSERT INTO employees (firstname, lastname, email) 
                    VALUES ('$theFirstName', '$theLastName', '$theEmail')";
    runQueryWithoutResultSet ($connection, $sqlCode);
    //4-DISCONNECT FROM THE DATABASE MANAGEMENT SYSTEM (DBMS) MYSQL
    disconnectToMySQLwithMySQLi($connection);
}

//-----------------------------------------------------------------
//-------- FEATURE 3: SELECT ALL RECORDS ---------------
//-------- DATA RETRIEVAL --------------------------
//-------- DISPLAY THE RECORDS SELECTED --------------------------
//-----------------------------------------------------------------
function selectAllRecords(){
    //1-CONNECT TO THE DATABASE MANAGEMENT SYSTEM (DBMS) MYSQL
    $connection=connectToMySQL();
    //2-SELECT THE DATABASE
    $sqlCode = "USE users";
    runQueryWithoutResultSet ($connection, $sqlCode);
    //4-SELECT ALL THE EXISTING RECORDS INTO THE TABLE AND DISPLAY THEM 
    $sqlCode = "SELECT * FROM employees";
    runQueryAndDisplayResultSet($connection, $sqlCode);
    //4-DISCONNECT FROM THE DATABASE MANAGEMENT SYSTEM (DBMS) MYSQL
    disconnectToMySQLwithMySQLi($connection);
}


//GENERAL USER-DEFINED FUNCTIONS

/** Create an object of MySQLi to connect to MySQL.
* @param: 
* @return: MySQLi object. 
*/ 
function connectToMySQL(){
    try {
        $connection = new mysqli(hostname:HOSTNAME, username:USERNAME, password:PASSWORD);
        return $connection;
    } catch (mysqli_sql_exception $error) {
        //If the connection failed, display error message and stop the script
        die("Connection to MySQL failed! <br>" . $error);
    }
}

/** Execute 1 or multiple queries on MySQL 
* That do not return a result set.
* @param: MySQLi object.
* @param: sql query.
* @return:  
*/
function runQueryWithoutResultSet (object $connection, string $sqlCode){
    try {
        //$createStructure = $connection->multi_query(file_get_contents("db_structure.sql"));
        $connection->multi_query($sqlCode);
    } catch (mysqli_sql_exception $error) {
        //If the creation failed, display error message and stop the script
        die("Creation of Database and Tables failed! <br>" . $error);
    }
}

/** Create an object of MySQLi to connect to MySQL. 
* @param: MySQLi object.
* @return:  
*/
function disconnectToMySQLwithMySQLi(object $connection){
    try {
        $connection->close();
    } catch (mysqli_sql_exception $error) {
        //If the disconnection failed, display error message and stop the script
        die("Disconnection from MySQL failed!<br/>" . $error);
    }
}

/** Execute 1 query on MySQL 
* That returns a result set and display this result set.
* @param: MySQLi object.
* @param: sql query.
* @return:  
*/
function runQueryAndDisplayResultSet(object $connection, string $sqlCode){
    try {      
        $selectRecords = $connection->query($sqlCode);
        //Calculate the number of records (or rows) available
        $number_of_rows = $selectRecords->num_rows;
        //Use a loop to display the records one by one in a HTML table
        echo "<table>";
        echo "<tr><th>ID</th><th>First Name</th><th>Last Name</th><th>Email</th></tr>";
        for ($j = 0; $j < $number_of_rows; ++$j) {
            echo "<tr>";
            //Assign the records of each row to an associative array
            $each_row = $selectRecords->fetch_array(MYSQLI_ASSOC);
            //Display each the record corresponding to each column
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
}


