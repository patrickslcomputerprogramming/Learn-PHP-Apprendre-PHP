<?php
class InsertRowToTable extends ManipulateDB
{
    public function insertToTAB()
    {
        //1-Connect to the DBMS
        if ($this->connectToDBMS() === TRUE) {
                //2-Connect to the DB
                if ($this->connectToDB() === TRUE) {
                    //3-Check that the Table exists 
                    if ($this->executeSql($this->sqlCode()['descTab']) === TRUE) {
                        //4-Insert data to the Table
                        //Cannot Insert data to the Table
                        if ($this->executeSql($this->sqlCode()['insertTab']) === FALSE) {
                            echo $this->messages()['link']['tryAgain'];
                            die($this->messages()['error']['insertTab']);
                        }
                    }
                    //Cannot Check that the Table exists
                    else{
                        echo $this->messages()['link']['tryAgain'];
                        die($this->messages()['error']['desTab']);
                    }
                }
                //Cannot Connect to the DB
                else {
                    echo $this->messages()['link']['tryAgain'];
                    die($this->messages()['error']['insertTab']);
                }        
        }
        //Cannot Connect to the DBMS
        else {
            die($this->messages()['error']['dbms']);
        }
    }
}