<?php
if (isset($_POST["send-button"])) {
    //Accessible Si le fichier est accédé après la soumission du formulaire
    //Enregistrer les données soumises dans le formulaire
    $userContinent = $_POST["user-continent"];
    $userCity = $_POST["user-city"];

    //Charger le fichier des fonctions
    require_once "CalculerDateHeure.php";

    //Définir le format d'affichage de la date
    $format_dh = "l F d, Y - H:i:s";

    //Créer une occurence (objet) de la classe
    $calculateur = new CalculerDateHeure($userContinent, $userCity, $format_dh);

    //Instancier une méthode pour afficher la date ou un message d'erreur    
    $msg = $calculateur -> calculerResultat();
?>

<!DOCTYPE html>
<html>

<head>
    <title>Affichage des résultats</title>
    <meta charset="UTF-8">
</head>

<body>
    <?php
    //Afficher les résultats
    echo "<p> Continent: " . $userContinent . "</p>";
    echo "<p> Ville|City: " . $userCity . "</p>";
    echo "<p><strong>" . $msg . "</strong></p>";
    ?>

    <!--Lien de retour à la page d'accueil -->
    <button><a href="index.html">FORMULAIRE|FORM</a></button>
</body>
</html>

<?php
} else {
    //Accessible si le fichier est accédé avant la soumission du formulaire
    //Rediriger à la page d'accueil
    header('Location: index.html'); 
}
?>
