<!--class3afr_response.php-->
<! DOCTYPE html>
<html>
    <head>
        <title>HTML Form and PHP Form Handling</title>
        <style>
            .form{color:bleu;}
            .formhandling{color:red;}
            .display-name{color:green;}
        </style>
    </head>
    <body>
        <h1>Formulaire HTML et Gestion des entr&eacute;es de formulaire PHP</h1>
        <h2>Afficher <span class="form">Formulaire</span> d'abord et <span class="formhandling">Gestion entr&eacute;e de formulaire</span> ensuite, dans 2 pages diff&eacute;rentes</h2>
        <hr>
        <h3>Vous avez entr&eacute; votre nom, je vais l&apos;afficher</h3>
        <?php
            //Gestion des formulaires
            //Allez ci-dessous seulement après qu’un utilisateur a appuyé sur le bouton d’entrée name="send "
            if (isset($_POST['send'])) {
            //Affecter à la variable php $firstname les données collectées à partir de la forme de formulaire de champ d’entrée name="fname "
            $firstName = $_POST["fname"]; 
            //Affecter à la variable php $firstname les données collectées à partir de la forme de champ d’entrée name="lname "
            $lastName = $_POST["lname"];  // index pour trouver les valeurs soumises dans le formulaire de champ d’entrée name="quantity "
            //Afficher les données enregistrées dans les variables php 
            echo"<h2 class=\"display-name\">Votre nom est : $firstName $lastName.</h2> ";
            echo"<h2 class=\"display-name\">F&eacute;licitations, il est beau!</h2> ";    
            }
        ?>
        <a href="http://localhost/dw3/demonstrations/class3afr.html"> RETOUR AU FORMULAIRE</a>
    </body>
</html> 
