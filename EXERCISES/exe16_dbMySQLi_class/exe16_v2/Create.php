<?php
/**
 *
 *EXERCISE 16 VERSION 2
 *Patrick Saint-Louis, 2023
*/
class Create extends Database {

    private $dbName;
    private $tableName;

    //Constructor method 
    public function __construct($db, $table){
        $this->dbName = $db;
        $this->tableName = $table;
        $this->createDBComponents();
    }

    //SQL query method
    private function sql(){
        $sql=array();
        $sql['createDB'] = "CREATE DATABASE IF NOT EXISTS " . $this->dbName;
        $sql['createTable'] = "CREATE TABLE IF NOT EXISTS " . $this->tableName . " (
                id INT(5) PRIMARY KEY AUTO_INCREMENT,
                firstname VARCHAR(35) NOT NULL,
                lastname VARCHAR(35) NOT NULL,
                email VARCHAR(35) NOT NULL
                ) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;";
        $sql['descTable'] = "DESC " . $this->tableName;
        return $sql;
    }

    //main method
    private function createDBComponents(){
        //Assign sql query
        $sql = $this->sql();
        //1-CONNECT TO MYSQL
        $this->connectToMySQL(HOST, USER, PASS);
        //2-EXECUTE THE QUERY TO CREATE THE DATABASE IF IT DOESN'T EXIST YET
        $this->executeQuery($sql['createDB']);
        //3-SELECT THE DATABASE
        $this->selectDatabase($this->dbName);
        //4-EXECUTE THE QUERY TO CREATE THE TABLE IF IT DOESN'T EXIST YET
        $this->executeQuery($sql['createTable']);
        //5-EXECUTE THE QUERY TO DESCRIBE THE TABLE
        $this->executeQuery($sql['descTable']);
    }

    public function __destruct(){
        //6-CLOSE THE CONNECTION TO MYSQL
        $this->closeMySQL();
    }
}