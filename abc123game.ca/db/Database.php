<?php

class Database {
    //Properties
    private $connection, $sqlExec; 
    protected $lastErrMsg, $selectedRows;

    //Constructor Method 
    public function __construct(){

    }

    //Method for customized Messages
    protected function messages()
    {
        //Error messages 
        $m['conDBMS'] = "Connection to MySQL failed!";
        $m['creatEntity'] = "Creation of the DB, Table, or View failed!";
        $m['conDB'] = "Connection to the DB failed!";
        $m['insertTAB'] = "Data insertion to the Table failed!";
        $m['selectTAB'] = "Data selection from the Table failed!";
        $m['descTAB'] = "Table structure description failed!";
        $m['updateCOL']= "Table Column Update failed!";
        //Try again messages
        $l['tryAgain'] = "<a href=\"index.php\"><input type=\"submit\" value=\"Try again!\"></a>";
        //Group messages by category 
        $msg['error'] = $m;
        $msg['link'] = $l;
        return $msg;
    }
    
    //Method for DBMS Connection 
    protected function connectToDBMS()
    {
        //Attempt to connect to MySQL using MySQLi
        $con = new mysqli(HOST, USER, PASS);
        //If connection to the MySQL failed save the system error message 
        if ($con->connect_error) {
            $this->lastErrMsg = mysqli_connect_error();
            return FALSE;
        } else {
            $this->connection = $con;
            return TRUE;
        }
    }

    //Method for DB Connection 
    protected function connectToDB($dbname)
    {
        //Attempt to connect to MySQL using MySQLi
        $con = mysqli_select_db($this->connection, $dbname);
        //If connection to the Database failed save the system error message 
        if ($con === FALSE) {
            $this->lastErrMsg = $this->connection->error;
            return FALSE;
        } else {
            return TRUE;
        }
    }

    //Method for multiple SQL Query Execution 
    protected function executeMultiQuery($sqlcode)
    {
        //Attempt to execute the query
        $invokeQuery = ($this->connection)->multi_query($sqlcode);
        //If query execution failed save the system error message  
        if ($invokeQuery === FALSE) {
            $this->lastErrMsg = ($this->connection)->error;
            return FALSE;
        } else {
            $this->sqlExec = $invokeQuery;
            return TRUE;
        }
    }   

    //Method for one SQL Query Execution 
    protected function executeOneQuery($sqlcode)
    {
        //Attempt to execute the query
        $invokeQuery = ($this->connection)->query($sqlcode);
        //If query execution failed save the system error message  
        if ($invokeQuery === FALSE) {
            $this->lastErrMsg = ($this->connection)->error;
            return FALSE;
        } else {
            $this->sqlExec = $invokeQuery;
            return TRUE;
        }
    } 

    //Method for Selected Data Recording
    protected function saveSelectedData(){
        //Calculate the number of rows available
        $number_of_rows = ($this->sqlExec)->num_rows;
        if ($number_of_rows==0){
            $this->selectedRows=NULL;
        } else {
            //Use a loop to display the rows one by one
            $data=array();
            for ($i = 1; $i <= $number_of_rows; ++$i) {
                //Assign the records of each row to an associative array
                $each_row = $this->sqlExec->fetch_array(MYSQLI_ASSOC);
                //Display each the record corresponding to each column
                //Save all the records to a multidimensional associative array
                foreach ($each_row as $section => $item)
                    $data["row$i"]["$section"]=$item;    
            } 
            $this->selectedRows=$data;  
        }
    }

     //Destructor Method
     public function __destruct()
     {
         //Close automatically the DBMS connection           
         if (($this->connection)->connect_error !== NULL)
             $this->connection->close();
     }
}