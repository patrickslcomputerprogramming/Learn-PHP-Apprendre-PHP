<?php
if (isset($_POST["btn_soumettre"])) {
    //Accessible Si le fichier est accédé après la soumission du formulaire
    //Enregistrer les données soumises dans le formulaire
    //Save form data
    $fname = $_POST['prenom'];
    $lname = $_POST['nom'];
    $birthyear = $_POST['naissance'];

    //Charger le fichier des fonctions
    require "Utilisateur.php";

    //Créer une occurence (objet) de la classe
    //Create an object (a class occurence)
    $personne = new Utilisateur ($fname, $lname, $birthyear);
    //Instancier une méthode pour stocker les donnees calculees
    //Instantiate or call a method
    $profil = $personne->calculerProfil();
?>

<!DOCTYPE html>
<html>

<head>
    <title>Réponse|Response</title>
    <meta charset="UTF-8">
    <style>
      .bluetext {
        color: blue;
      }
    </style>
</head>

<body>
    <h1 class="bluetext">Profil de l'utilisateur créé|User Profiel created</h1>
    <?php
    //Afficher les résultats
    foreach( $profil as $key => $value ) {
        echo "<h2>".$key." : ".$value."</h2>";
    }
    ?>

    <!--Lien de retour à la page d'accueil -->
    <button><a href="index.html">FORMULAIRE|FORM</a></button>
</body>
</html>

<?php
} else {
    //Accessible si le fichier est accédé avant la soumission du formulaire
    //Rediriger à la page d'accueil
    //Redirect to the home page
    header('Location: index.html'); 
}
?>

