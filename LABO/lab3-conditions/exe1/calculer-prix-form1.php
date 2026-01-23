<?php
//Calcul
//Si le formulaire est soumis
if (isset($_POST['bouton_soumettre_form1'])) {
    //Variables : entrée
    $nom_article_form1 = $_POST['nom_article_form1'];
    $prix_unitaire_form1 = $_POST['prix_unitaire_form1'];
    $quantite_article_form1 = $_POST['quantite_article_form1'];

    //Afficher un message d’erreur si un ou plusieurs champs sont vides 
    if (
        empty($nom_article_form1)
        || (empty($prix_unitaire_form1) && $prix_unitaire_form1 != 0)
        || (empty($quantite_article_form1) && $quantite_article_form1 != 0)
    ) {
        $messageErreur = "Erreur! Le ou les champs suivants ne peuvent être vides:";
        if (empty($nom_article_form1))
            $messageErreur = $messageErreur . "<br> - Nom de l'article";
        if (empty($prix_unitaire_form1) && $prix_unitaire_form1 != 0)
            $messageErreur = $messageErreur . "<br> - Prix unitaire de l'article";
        if (empty($quantite_article_form1) && $quantite_article_form1 != 0)
            $messageErreur = $messageErreur . "<br> - Quantité de l'article";
    }
    //Calculer les prix si tous les champs sont remplis 
    else {
        //Constantes
        define(constant_name: "TAUX_TPS", value: 5 / 100);
        define(constant_name: "TAUX_TVQ", value: 9.975 / 100);

        //Calculer
        $sousTotal = $prix_unitaire_form1 * $quantite_article_form1;
        $tps = $sousTotal * TAUX_TPS;
        $tvq = $sousTotal * TAUX_TVQ;
        $total = $sousTotal + $tps + $tvq;

        //Formater: garder uniquement 2 chiffres après la virgule
        $sousTotal = round(num: $sousTotal, precision: 2);
        $tps = round(num: $tps, precision: 2);
        $tvq = round(num: $tvq, precision: 2);
        $total = round(num: $total, precision: 2);
    }
}
//Si le formulaire n’est pas soumis
else {
    //Rediriger vers la page contenant le formulaire index.html
    header('Location: index.html');
}
?>

<!--Afficher-->
<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lab3-Exe1-Calculateur de Prix</title>
    <style>
        body {
            width: 70%;
            border-radius: 6px;
            margin: 5px auto 5px auto;
            padding: 2% 2% 2% 2%;
            border: 1px solid black;
            text-align: center;
        }
    </style>
</head>

<body>
    <?php
    if (isset($messageErreur)) {
        echo "<h1>" . $messageErreur . "</h1>";
    } else {
        //Display outputs 
        echo "<h1> Résultats d'Achat </h1>";
        echo "<h2> Nom Article   : " . $nom_article_form1        . "</h2>";
        echo "<h2> Prix unitaire : " . $prix_unitaire_form1      . ' $ca</h2>';
        echo "<h2> Quantité      : " . $quantite_article_form1   . " unités </h2>";
        echo "<h2> Sous-total    : " . $sousTotal                . ' $ca</h2>';
        echo "<h2> TVQ           : " . $tvq                      . ' $ca</h2>';
        echo "<h2> TPS           : " . $tps                      . ' $ca</h2>';
        echo "<h2> Total         : " . $total                    . ' $ca</h2>';
    }
    ?>

    <!-- Lien de retour vers la page d'accueil -->
    <button class="backlink"><a href="index.html">ACCUEIL</a></button>
</body>

</html>