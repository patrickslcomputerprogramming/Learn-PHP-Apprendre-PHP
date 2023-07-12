<?php
class ManipulateDB
{
    //Declare the properties
    private $firstname, $lastname, $email;
    private $connection; 
    protected $sqlExec, $lastErrMsg;

    //Declare the method constructor
    public function __construct($fn, $ln, $em)
    {
        $this->firstname = $fn;
        $this->lastname = $ln;
        $this->email = $em;
    }

    //Declare the method to save the messages
    protected function messages()
    {
        //Error messages 
        $m['dbms'] = "<p>Connection to MySQL failed!<br/>$this->lastErrMsg</p>";
        $m['db'] = "<p>Connection to the DB failed!<br/>$this->lastErrMsg</p>";
        $m['creatDb'] = "<p>Creation of the DB failed!<br/>$this->lastErrMsg</p>";
        $m['creatTab'] = "<p>Creation of the Table failed!<br/>$this->lastErrMsg</p>";
        $m['insertTab'] = "<p>Data insertion to the Table failed!<br/>$this->lastErrMsg</p>";
        $m['selectTab'] = "<p>Data selection from the Table failed!<br/>$this->lastErrMsg</p>";
        $m['desTab'] = "<p>Table structure description failed!<br/>$this->lastErrMsg</p>";
        //Try again messages
        $b['tryAgain'] = "<a href=\"index.php\"><input type=\"submit\" value=\"Try again!\"></a>";
        //Group messages by category 
        $msg['error'] = $m;
        $msg['link'] = $b;
        return $msg;
    }

    //Declare the method to save the SQL Code to be executed
    protected function sqlCode()
    {
        $dbName = DBNAME;
        $tabName = TABNAME;
        //Create queries
        $sqlCode['creatDb'] = "CREATE DATABASE IF NOT EXISTS $dbName;";
        $sqlCode['creatTab'] = "CREATE TABLE IF NOT EXISTS $tabName(
            id INT PRIMARY KEY AUTO_INCREMENT,
            firstname VARCHAR(35) NOT NULL,
            lastname VARCHAR(35) NOT NULL,
            email VARCHAR(35) NOT NULL
            ) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;";
        $sqlCode['descTab'] = "DESC employees;";
        $sqlCode['selectTab'] = "SELECT * FROM employees;";
        $sqlCode['insertTab']="INSERT INTO employees (firstname, lastname, email) 
                    VALUES ('$this->firstname', '$this->lastname', '$this->email');";
        //Return an array of queries
        return $sqlCode;
    }

    //Declare the method to connect to the DBMS
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

    //Declare the method to connect to the DB
    protected function connectToDB()
    {
        //If connection to the Database failed save the system error message 
        if (mysqli_select_db($this->connection, DBNAME) === FALSE) {
            $this->lastErrMsg = $this->connection->error;
            return FALSE;
        } else {
            return TRUE;
        }
    }

    //Declare the method to execute the SQL Code 
    protected function executeSql($code)
    {
        //Execute the query
        $invokeQuery = $this->connection->query($code);
        //If data insertion to the table failed save the system error message  
        if ($invokeQuery === FALSE) {
            $this->lastErrMsg = $this->connection->error;
            return FALSE;
        } else
            $this->sqlExec = $invokeQuery;
        return TRUE;
    }

    //Declare the method to display selected data 
    protected function displaySelectData(){
        //Calculate the number of rows available
        $number_of_rows = $this->sqlExec->num_rows;
        //Use a loop to display the rows one by one
        echo "<table>";
        echo "<tr><td>ID</td><td>First Name</td><td>Last Name</td><td>Email</td></tr>";
        for ($j = 0; $j < $number_of_rows; ++$j) {
            echo "<tr>";
            //Assign the records of each row to an associative array
            $each_row = $this->sqlExec->fetch_array(MYSQLI_ASSOC);
            //Display each the record corresponding to each column
            foreach ($each_row as $item)
                echo "<td>" . $item . "</td>";
            echo "</tr>";
        }   
        echo "</table>";
    }
    

    //Declare the method to disconnect from the DBMS
    public function __destruct()
    {
        //Close automatically the connection from MySQL when it is opened at the end          
        if ($this->connection === TRUE) {
            $this->connection->close();
        }
    }
}