<?php
if (isset($_POST["ipt-envoyer"])) {
    //Accessible Si le fichier est accédé après la soumission du formulaire
    //Enregistrer les données soumises dans le formulaire
    $repertoire = $_POST["ipt-location-fichier"];
    $nom = $_POST["ipt-nom-fichier"];
    $texte = $_POST["txt-text-fichier"]; 
    $repertoireEtNom = $repertoire . "/" . $nom; 
    
    /*echo "<p>" . $repertoire."</p>";
    echo "<p>" . $nom."</p>";
    echo "<p>" . $texte."</p>";*/

    //Charger le fichier des fonctions
    require "fonctions.php";  
?>

<!DOCTYPE html>
<html>

<head>
    <title>Display Outputs</title>
    <meta charset="UTF-8">
</head>

<body>
    <?php
    //Afficher les résultats
    //Creer le fichier
    creerUnFichier($repertoireEtNom, msg());
    //Ajouter des données dans le fichier
    ajouterDonnéesDansUnFichier($repertoireEtNom, $texte, msg()); 
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
