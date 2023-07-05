<?php
function createDBandTable($hn, $un, $pw, $db)
{
    //1-Connect to the DBMS
    $con = connectToDBMS($hn, $un, $pw);
    //If connect to the DBMS failed, display try again and error, and stop
    if ($con === FALSE) {
        echo "<a href=\"index.php\"><input type=\"submit\" value=\"Try again!\"></a>";
        die(messages()['error']['ErrDBMS'] . mySQLiError(''));
    }
    //If connect to the DBMS succeeds
    else {
        //If connection to the DB failed
        //2-Create the DB
        if (connectToDB($con, $db) === FALSE) {
            //If create the DB failed, display try again and error, and stop
            if (executeSqlQuery($con, sqlCommands()['createDB']) === FALSE) {
                echo "<a href=\"index.php\"><input type=\"submit\" value=\"Try again!\"></a>";
                die(messages()['error']['CreateDB'] . mySQLiError(''));
            //If create the DB succeeds
            //Connect to the DB
            //If connection to the DB failed, display try again and error, and stop
            } else {
                if (connectToDB($con, $db) === FALSE) {
                    echo "<a href=\"index.php\"><input type=\"submit\" value=\"Try again!\"></a>";
                    die(messages()['error']['CreateTab'] . mySQLiError(''));
                }
            }

            //If describe the Table failed
            //3-Create the Table
            if (executeSqlQuery($con, sqlCommands()['descEmpl']) === FALSE) {
                //If create the Table failed, display try again and error, and stop
                if (executeSqlQuery($con, sqlCommands()['createTab']) === FALSE) {
                    echo "<a href=\"index.php\"><input type=\"submit\" value=\"Try again!\"></a>";
                    die(messages()['error']['CreateTab'] . mySQLiError(''));
                }
            }

        }
    //4-Disconnect to the DBMS
    disconnectToDBMS($con);
    }
}
