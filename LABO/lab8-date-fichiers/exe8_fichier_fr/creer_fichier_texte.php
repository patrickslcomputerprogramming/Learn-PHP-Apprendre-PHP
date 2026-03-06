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
    <title>Affichage des résultats</title>
    <meta charset="UTF-8">
</head>

<body>
    
        <?php
            //Créer le fichier
            $resultatCreerFichier = creerUnFichier(fileNameLocation: $repertoireEtNom, message: msg());
        ?>
        <!-- Afficher les sorties concernant la création du fichier -->
        <p><?php echo $resultatCreerFichier; ?></p>
        <?php
            //S'il n'y a pas d'erreur, ajouter le contenu dans le fichier
            if (!str_contains(haystack: $resultatCreerFichier, needle: "erreur")){
                //Ajouter des données dans le fichier
                $resultatAjouterContenu = ajouterDonnéesDansUnFichier(fileNameLocation: $repertoireEtNom, data: $texte, message: msg()); 
        ?>
        <!-- Afficher les sorties concernant l'ajout de contenu dans le fichier -->
        <p><?php echo $resultatAjouterContenu; ?></p>
        <?php
            }
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
