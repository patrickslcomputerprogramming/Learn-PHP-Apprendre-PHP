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
            <h1 class="blueText">Liste d'Enregistrement</h1>
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

            //Call functions
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
                       
         ?>
        <div id="back">
            <a href="index.php"><input type="submit" value="ACCUEIL"></a>
        </div>
    </div>
</body>

</html>
<?php
}
?>
