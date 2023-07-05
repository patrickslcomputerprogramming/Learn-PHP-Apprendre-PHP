<?php
/**
 *demonstration class14.php
 *Insert and Select data from MySQL using MySQLi
 */
//Form Handling
//Go below only after a user pressed the input button name="send" of index.php 
if (isset($_POST['send'])) {
    ?>
    <!DOCTYPE html>
    <html>

    <head>
        <title>Answer</title>
        <link rel="stylesheet" href="style.css">
    </head>

    <body>
        <div class="container">
            <h1 class="blueText">Registration List</h1>
            <hr />
            <?php
            //Assign data collected from the form
            $theFirstName= $_POST['fname'];  
            $theLastName= $_POST['lname'];
            $theEmail= $_POST['email'];
            $userData=array($theFirstName, $theLastName, $theEmail);
            
            //Load files
            require_once "createDBandTable.php";
            require_once "insertToTable.php";
            require_once "selectFromTable.php";
            require_once "functions.php";
            require_once "login_info.php";

            createDBandTable(
                $hostname, 
                $username, 
                $password, 
                $database, 
            );
            
            insertToTable(
                $hostname, 
                $username, 
                $password, 
                $database, 
                $theFirstName, 
                $theLastName,
                $theEmail
            );
            selectFromTable(
                $hostname, 
                $username, 
                $password, 
                $database, 
                $theFirstName, 
                $theLastName,
                $theEmail
            );

            /*
            $messages=messages();

            if (connectToDBMS($hostname, $username, $password)===FALSE){
                echo"<a href=\"index.php\"><input type=\"submit\" value=\"Try again!\"></a>";
                die($messages['error']['ErrDBMS'] . mySQLiError(''));   
            }
            else{
                $connection = connectToDBMS($hostname, $username, $password);
                //Connect to the database;
                connectToDB($connection, $database);
                //Check whether connection to the database failed
                if (connectToDB($connection, $database) === FALSE) {
                    echo"<a href=\"index.php\"><input type=\"submit\" value=\"Try again!\"></a>";
                    die($messages['error']['ErrDB'] . mySQLiError(''));  
                }
            } 
            executeSqlQuery($connection, sqlInsertCommand($userData)['InsertInEmpl']);
            if (executeSqlQuery($connection, sqlInsertCommand($userData)['InsertInEmpl']) === FALSE){    
                echo"<a href=\"index.php\"><input type=\"submit\" value=\"Try again!\"></a>";
                die($messages['error']['InsertToTab']. $connection->error); 
            }
          
            executeSqlQuery($connection, sqlCommands()['SelectInEmpl']);
            if (executeSqlQuery($connection, sqlCommands()['SelectInEmpl'])===FALSE){
                echo"<a href=\"index.php\"><input type=\"submit\" value=\"Try again!\"></a>";
                die($messages['error']['SelectFromTab'] . mySQLiError(''));
            }

            else {
                $SucceedQuery = executeSqlQuery($connection, sqlSelectCommand()['SelectInEmpl']);
                displaySelectData($SucceedQuery); 
            }
            disconnectToDBMS($connection);

            */
?>
        <div id="back">
            <a href="index.php"><input type="submit" value="Try again!"></a>
        </div>
    </div>
</body>

</html>
<?php
}
?>
