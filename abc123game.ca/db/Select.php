<?php

class Select extends Database {
    private $actionKey, $userName, $registrationOrder; 

    //Constructor Method 
    public function __construct($key, $un='', $ro=''){
        $this->actionKey = $key; 
        $this->userName = $un;
        $this->registrationOrder = $ro; 
    }

    //Method for data Retrieve
    public function selectFromTAB(){
        //1-Successful Connect to the DBMS 
        if ($this->connectToDBMS() === TRUE) {  
            //2-Successful Connect to the DB
            if ($this->connectToDB(DBNAME) === TRUE) { 
                //3-Successfull Table description
                if ($this->executeOneQuery($this->sqlCode()['validateTab']) === TRUE){
                    //4-Successfull Table select
                    if ($this->executeOneQuery($this->sqlCode()[$this->actionKey]) === TRUE){
                        //5-Successfull Selected Data Recording 
                        $this->saveSelectedData();
                        return $this->selectedRows; 
                    //4-Failed Table select
                    } else {
                        die($this->messages()['error']['selectTAB']."<br/>".($this->lastErrMsg));
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
        $sqlCode['selectAllUn'] = 
            "SELECT userName FROM player 
            ORDER BY registrationOrder;";
        
        $sqlCode['selectKey'] = 
            "SELECT registrationOrder FROM player 
            WHERE userName='$this->userName';";

        $sqlCode['selectCode'] = 
            "SELECT passCode FROM authenticator 
            WHERE registrationOrder='$this->registrationOrder';";
                          
        if($this->actionKey==='selectAllUn' || $this->actionKey==='selectKey')
            $sqlCode['validateTab'] = "DESC player;";
        else if ($this->actionKey==='selectCode')
            $sqlCode['validateTab'] = "DESC authenticator;";
        
        //Return an array of queries
        return $sqlCode;
    }
}