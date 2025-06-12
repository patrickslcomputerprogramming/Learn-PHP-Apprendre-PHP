<?php
if (isset($_POST["btn_soumettre"])) {
    //Accessible Si le fichier est accédé après la soumission du formulaire
    //Enregistrer les données soumises dans le formulaire
    $fname = $_POST['prenom'];
    $lname = $_POST['nom'];
    $birthyear = $_POST['naissance'];

    //Charger le fichier des fonctions
    require "Utilisateur.php";

    //Créer une occurence (objet) de la classe
    $personne = new Utilisateur ($fname, $lname, $birthyear);
    //Instancier une méthode pour stocker les donnees calculees    
    $profil = $personne->calculerProfil();
?>

<!DOCTYPE html>
<html>

<head>
    <title>Réponse</title>
    <meta charset="UTF-8">
    <style>
      .bluetext {
        color: blue;
      }
    </style>
</head>

<body>
    <h1 class="bluetext">Profil de l'utilisateur créé</h1>
    <?php
    //Afficher les résultats
    foreach( $profil as $key => $value ) {
        echo "<h2>".$key." : ".$value."</h2>";
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
