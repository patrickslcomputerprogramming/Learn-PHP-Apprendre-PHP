<?php
//If the XMLHTTPRequest javascript class sent a request 
if (isset($_REQUEST["rqst"])) {
    //Login info 
    define('HOST', 'localhost');
    define('USER', 'root');
    define('PASS', '');

    //DB Info
    $dbname = "infoqc";
    $tablename = "regions";
    $columname = "name";
    $result = array();
    $user_data = $_REQUEST["rqst"];

    //CREATE THE DATABASE IF IT DOESN'T EXIST YET
    try {

        //1-CONNECT TO THE DATABASE MANAGEMENT SYSTEM (DBMS) MYSQL 
        $connection = new PDO(dsn: "mysql:host=" . HOST, username: USER, password: PASS);
        //2-CREATE TGE DATABASE 
        $connection->exec(statement: file_get_contents("regions_administartives_qc.sql"));
        //3-DISCONNECT FROM THE RESULT SET AND THE DATABASE DATABASE MANAGEMENT SYSTEM (DBMS) MYSQL
        unset($connection);
    } catch (PDOException $errorPDO) {
        //if there an error 
        $msg_erreur['Customized'] = "Something went wrong! Try again!";
        $msg_erreur['Error Message'] = $errorPDO->getMessage();
        $msg_erreur['Error File Name'] = $errorPDO->getFile();
        $msg_erreur['Error Line Number'] = $errorPDO->getLine();
        echo "<table>";
        foreach ($msg_erreur as $key => $value) {
            echo "<tr>";
            echo "<td>" . $key . "</td>";
            echo "<td>" . $value . "</td>";
            echo "</tr>";
        }
        echo "</tr></table>";
    }

    //RETRIEVE DATA FROM THE DATABASE
    try {

        //1-CONNECT TO THE DATABASE MANAGEMENT SYSTEM (DBMS) MYSQL 
        $connection = new PDO(dsn: "mysql:host=" . HOST, username: USER, password: PASS);
        //2-SELECT THE DATABASE
        $queryString = "USE $dbname";
        $connection->query(query: $queryString);
        //3-CHECK IF THE TABLE EXISTS 
        $queryString = "DESC $tablename";
        $connection->query(query: $queryString);
        //4-SELECT ALL THE EXISTING RECORDS INTO THE TABLE AND DISPLAY THEM
        $queryString = "SELECT " . $columname . " FROM " . $tablename . " WHERE " . $columname . " LIKE '" . $user_data . "%'";
        $selectRecords = $connection->prepare($queryString);
        $selectRecords->execute();
        //Calculate the number of records (or rows) available
        $number_of_rows = $selectRecords->rowCount();
        $corresponding_region_names = [];
        //Use a loop to display the records one by one in a HTML table
        for ($j = 0; $j < $number_of_rows; ++$j) {
            $row = $selectRecords->fetch(PDO::FETCH_NUM);
            foreach ($row as $key => $value) {
                $corresponding_region_names[] = $value;
            }
        }
        //5-DISCONNECT FROM THE RESULT SET AND THE DATABASE DATABASE MANAGEMENT SYSTEM (DBMS) MYSQL
        unset($selectRecords);
        unset($connection);
    } catch (PDOException $errorPDO) {
        //if there an error 
        $msg_erreur['Customized'] = "Something went wrong! Try again!";
        $msg_erreur['Error Message'] = $errorPDO->getMessage();
        $msg_erreur['Error File Name'] = $errorPDO->getFile();
        $msg_erreur['Error Line Number'] = $errorPDO->getLine();
        echo "<table>";
        foreach ($msg_erreur as $key => $value) {
            echo "<tr>";
            echo "<td>" . $key . "</td>";
            echo "<td>" . $value . "</td>";
            echo "</tr>";
        }
        echo "</tr></table>";
    }


    //Display outputs (send a response to the XMLHTTPRequest JavaScript class request)
    unset($_REQUEST["rqst"]);
    echo count(value: $corresponding_region_names) == 0 ?  "" : implode(separator: ", ", array: $corresponding_region_names);
} 
//If the XMLHTTPRequest javascript class didn't sent a request 
else {
    //Redirect to the home page 
    header(header: "Location: index.php");
    exit();
}
