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
            $fName = $_POST['fname'];
            $lName = $_POST['lname'];
            $email = $_POST['email'];

            //Load files
            require_once "ManipulateDB.php";
            require_once "CreateDBandTable.php";
            require_once "InsertRowToTable.php";
            require_once "SelectRowFromTable.php";
            require_once "login_info.php";
            require_once "database_info.php";

            //Create objects 
            $object1 = new CreateDBandTable();
            $object2 = new InsertRowToTable($fName, $lName, $email);
            $object3 = new SelectRowFromTable();
            //Instantiate methods
            $object1->creatDBnTAB();
            $object2->insertToTAB();
            $object3->selectFromTAB();

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