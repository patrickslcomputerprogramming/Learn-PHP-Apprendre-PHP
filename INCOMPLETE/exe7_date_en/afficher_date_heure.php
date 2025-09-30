<?php
if (isset($_POST["send-button"])) {
    //Accessible Si le fichier est accédé après la soumission du formulaire
    //Enregistrer les données soumises dans le formulaire
    $userContinent = $_POST["user-continent"];
    $userCity = $_POST["user-city"];

    //Charger le fichier des fonctions
    require "fonctions.php";

    //Créer un fuseau horaire (ex: "America/Montreal")
    $fh=creerFuseauHoraire($userContinent, $userCity);
    //Valider un fuseau horaire
    if (validerFuseauHoraire($fh)==true){
        //Calculer date et heure selon fuseau horaire
        $format_dh = "l F d, Y - H:i:s";
        $dh=calculerDateheure($fh, $format_dh);
        $msg= "Date and Time : " . $dh; 
    }else{
        $msg= "Something went wrong with the TimeZone. Try again!";
    }
?>

<!DOCTYPE html>
<html>

<head>
    <title>Display results</title>
    <meta charset="UTF-8">
</head>

<body>
    <?php
    //Afficher les résultats
    echo "<p> Continent: " . $userContinent . "</p>";
    echo "<p> City: " . $userCity . "</p>";
    echo "<p><strong>" . $msg . "</strong></p>";
    ?>

    <!--Lien de retour à la page d'accueil -->
    <button><a href="index.html">FORM</a></button>
</body>
</html>

<?php
} else {
    //Accessible si le fichier est accédé avant la soumission du formulaire
    //Rediriger à la page d'accueil
    header('Location: index.html'); 
}
?>
