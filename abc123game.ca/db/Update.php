<?php

class Update extends Database {
    //Properties
    private $actionKey; 
    private $passCode, $registrationOrder;

    //Constructor Method 
    public function __construct($key, $pc, $ro){
        $this->actionKey = $key;
        $this->passCode = $pc;
        $this->registrationOrder = $ro;
        $this->insertToTAB(); 
    }

    //Method for Table Column Update 
    private function InsertToTAB(){
        //1-Successful Connect to the DBMS 
        if ($this->connectToDBMS() === TRUE) {  
            //2-Successful Connect to the DB
            if ($this->connectToDB(DBNAME) === TRUE) { 
                //3-Successfull Table description
                if ($this->executeOneQuery($this->sqlCode()['validateTab']) === TRUE){
                    //4-Failed Table Column Update
                    if ($this->executeOneQuery($this->sqlCode()[$this->actionKey]) === FALSE){
                        die($this->messages()['error']['updateCOL']."<br/>".($this->lastErrMsg));
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
        $sqlCode['updateCode']=
            "UPDATE authenticator 
            SET passCode='$this->passCode' 
            WHERE registrationOrder=$this->registrationOrder;";
    
                
        if($this->actionKey==='updateCode')
            $sqlCode['validateTab'] = "DESC authenticator;";

        //Return an array of queries
        return $sqlCode;
    }
}