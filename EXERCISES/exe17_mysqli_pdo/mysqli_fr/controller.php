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
        //Activate exception 
        //Activer les exceptions
        mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);

        //Assign data collected from the form
        //Assigner les données collectées via le formulaire
        $theFirstName = $_POST['prenom'];
        $theLastName = $_POST['nom'];
        $theEmail = $_POST['email'];

        //Login info 
        //Information de connexion
        define('HOSTNAME', 'localhost');
        define('USERNAME', 'root');
        define('PASSWORD', '');

        //Load the content of the user-defined functions used to interact with MySQL
        //Charger le contenu d'un fichier
        require_once "db_management.php";

        ?>
        <!-- Link to return to the form - Lien de retour au formulaire -->
        <div id="back">
            <a href="index.php"><input type="submit" value="Essayez encore!"></a>
        </div>
</body>

</html>
