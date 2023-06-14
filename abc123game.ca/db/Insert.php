<?php

class Insert extends Database {
    //Properties
    private $actionKey; 
    private $firstName, $lastName, $userName, $registrationTime;
    private $passCode, $registrationOrder; 
    private $scoreTime, $finalResult, $livesUsed;

    //Constructor Method 
    public function __construct($key,
    $fn='', $ln='', $un='', $rt='', 
    $pc='',$ro='', 
    $st='', $fr='', $lu=''){
        $this->actionKey = $key;
        $this->firstName = $fn;
        $this->lastName = $ln;
        $this->userName = $un;
        $this->registrationTime = $rt;
        $this->passCode = $pc;
        $this->registrationOrder = $ro;
        $this->scoreTime = $st;
        $this->finalResult = $fr;
        $this->livesUsed = $lu;  
        $this->insertToTAB(); 
    }

    //Method for records Insertion 
    private function InsertToTAB(){
        //1-Successful Connect to the DBMS 
        if ($this->connectToDBMS() === TRUE) {  
            //2-Successful Connect to the DB
            if ($this->connectToDB(DBNAME) === TRUE) { 
                //3-Successfull Table description
                if ($this->executeOneQuery($this->sqlCode()['validateTab']) === TRUE){
                    //4-Failed Table insert
                    if ($this->executeOneQuery($this->sqlCode()[$this->actionKey]) === FALSE){
                        die($this->messages()['error']['insertTAB']."<br/>".($this->lastErrMsg));
                    }   
                //3-Failed Table description
                } else {
                    die($this->messages()['error']['descTAB']."<br/>".($this->lastErrMsg));
                }
            //2-Failed Connect to the DB
            } else {
                die($this->messages()['error']['conDB']."<br/>".($this->lastErrMsg));
            }
        //1-Failed Connect to the DBMS
        } else {
            die($this->messages()['error']['conDBMS']."<br/>".($this->lastErrMsg));
        }
    }

    //Method for SQL Queries  
    private function sqlCode()
    {
        //SQL query
        $sqlCode['insertIdentity']=
            "INSERT INTO player(fName, lName, userName, registrationTime)
            VALUES('$this->firstName', '$this->lastName', '$this->userName', $this->registrationTime);";
        
        $sqlCode['insertCredentials']=
            "INSERT INTO authenticator(passCode,registrationOrder)
            VALUES('$this->passCode', $this->registrationOrder);";
                       
        $sqlCode['insertGameScore']=
            "INSERT INTO score(scoreTime, result , livesUsed, registrationOrder)
            VALUES('$this->scoreTime', '$this->finalResult', '$this->livesUsed', '$this->registrationOrder');";
                
        if($this->actionKey==='insertIdentity')
            $sqlCode['validateTab'] = "DESC player;";
        else if ($this->actionKey==='insertCredentials')
            $sqlCode['validateTab'] = "DESC authenticator;";
        else if ($this->actionKey==='insertGameScore')
            $sqlCode['validateTab'] = "DESC score;";

        //Return an array of queries
        return $sqlCode;
    }
}