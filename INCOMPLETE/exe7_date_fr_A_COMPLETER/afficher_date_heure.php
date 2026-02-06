<?php
if (isset($_POST["send-button"])) {
    //Accessible Si le fichier est accédé après la soumission du formulaire
    //Enregistrer les données soumises dans le formulaire
    $continent = $_POST["user-continent"];
    $ville = $_POST["user-city"];

    //Charger le fichier des fonctions
    require_once "fonctions.php";

    //Fonction de synthèse pour implémenter la fonctionnalité
    function afficherDateEtHeure($continent, $ville): string
    {
        //Créer un fuseau horaire (ex: "America/Montreal")
        $fh = creerFuseauHoraire(continent: $continent, ville: $ville);
        //Valider le fuseau horaire
        if (validerFuseauHoraire(fuseauHoraire: $fh) == true) {
            //Calculer date et heure selon le fuseau horaire
            $format_dh = "l F d, Y - H:i:s";
            $dh = calculerDateheure(fuseauHoraire: $fh, formatAffichage: $format_dh);
            $msg = "Date et Heure : " . $dh;
        } else {
            $msg = "Erreur détectée dans le Fuseau Horaire. Essayez encore!";
        }
        return $msg;
    }
?>

    <!DOCTYPE html>
    <html>

    <head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lab8-Exe1-Calculateur de date-Calcul et Sorties</title>
    </head>

    <body>
        <?php
        //Afficher les résultats
        echo "<p> Continent: " . $continent . "</p>";
        echo "<p> City: " . $ville . "</p>";
        echo "<p><strong>" . afficherDateEtHeure(continent: $continent, ville: $ville) . "</strong></p>";
        ?>

        <!--Lien de retour à la page d'accueil -->
        <button><a href="index.html">FORMULAIRE</a></button>
    </body>

    </html>

<?php
} else {
    //Accessible si le fichier est accédé avant la soumission du formulaire
    //Rediriger à la page d'accueil
    header('Location: index.html');
}
?>
