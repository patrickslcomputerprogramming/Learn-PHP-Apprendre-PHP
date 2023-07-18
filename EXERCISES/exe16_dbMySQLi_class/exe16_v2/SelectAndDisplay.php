<?php
/**
 *
 *EXERCISE 16 VERSION 2
 *Patrick Saint-Louis, 2023
*/
class SelectAndDisplay extends Database {

    private $dbName;
    private $tableName;

    //Constructor method 
    public function __construct($db, $table){
        $this->dbName = $db;
        $this->tableName = $table;
        $this->selectAndDisplayFromTable();
    }

    //SQL query method
    private function sql(){
        $sql['descTable'] = "DESC " . $this->tableName;
        $sql['selectAllColumns'] = "SELECT * FROM " . $this->tableName;
        return $sql;
    }

    //display method
    private function displayTwoDimAssocArray($array){
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

    //main method
    private function selectAndDisplayFromTable(){
        //Assign sql query
        $sql = $this->sql();
        //1-CONNECT TO MYSQL
        $this->connectToMySQL(HOST, USER, PASS);
        //2-SELECT THE DATABASE
        $this->selectDatabase($this->dbName);
        //3-EXECUTE THE QUERY TO DESCRIBE THE TABLE
        $this->executeQuery($sql['descTable']);
        //4-EXECUTE THE QUERY TO SELECT FROM THE TABLE
        $dataFound = $this->executeQuery($sql['selectAllColumns']);
        //5-DISPLAY THE DATA SELECTED
        $this->displayTwoDimAssocArray($dataFound);
    }

    public function __destruct(){
        //6-CLOSE THE CONNECTION TO MYSQL
        $this->closeMySQL();
    }
}