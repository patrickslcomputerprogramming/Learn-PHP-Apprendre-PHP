<?php

/**
 *
 *EXERCISE 15 VERSION 2
 *Patrick Saint-Louis, 2023
 */
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
        $theFirstName = $_POST['fname'];
        $theLastName = $_POST['lname'];
        $theEmail = $_POST['email'];

        //Login info 
        define('HOSTNAME', 'localhost');
        define('USERNAME', 'root');
        define('PASSWORD', '');

        //Load the content of the user-defined functions used to interact with MySQL
        require_once "db_management.php";

        ?>
        <div id="back">
            <a href="index.php"><input type="submit" value="Try again!"></a>
        </div>
</body>

</html>