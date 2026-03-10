<?php

/**
 *
 *LAB 11 MySQL avec MySQLi ou PDO 
 *Patrick Saint-Louis, 2026
 */
?>
<!DOCTYPE html>
<html>

<head>
    <title>Réponse</title>
    <link rel="stylesheet" href="style.css">
</head>

<body>
    <div class="container">
        <h1 class="blueText">Liste des inscriptions</h1>
        <hr />
        <?php
        //Assigner les données collectées du formulaire
        $lePrenom = $_POST['prenom'];
        $leNom = $_POST['nom'];
        $leCourriel = $_POST['courriel'];

        //Informations de connexion 
        define('HOSTNAME', 'localhost');
        define('USERNAME', 'root');
        define('PASSWORD', '');

        //Charger le contenu des fonctions définies par l'utilisateur pour interagir avec MySQL
        //Sélectionner le fichier PDO ou le fichier MySQLi
        require_once "db_management_pdo.php";
        //require_once "db_management_mysqli.php";

        ?>
        <div id="back">
            <a href="index.php"><input type="submit" value="Réessayer !"></a>
        </div>
</body>

</html>