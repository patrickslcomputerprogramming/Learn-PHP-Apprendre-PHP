<?php

/**
 *calcul.php
 *Lab 4 Exercice 2 
 *Structures de controle conditionnelles - Session PHP - Gestion de formulaire
 *Patrick Saint-Louis, 2026
 */

//Si le formulaire dans index.php est soumis, calculer
if (isset($_GET['ipt4-submit-form1'])) {

    //Démarrer une nouvelle session PHP et créer $_SESSION
    session_start();

    //Assigner les données reçu du formulaire 
    $cote1_triangle = $_GET["ipt1-cote1-form1"];
    $cote2_triangle = $_GET["ipt2-cote2-form1"];
    $cote3_triangle = $_GET["ipt3-cote3-form1"];

    //Créer un message d’erreur si un ou plusieurs champs sont vides 
    if (empty($cote1_triangle) || empty($cote2_triangle) || empty($cote3_triangle)) {
        $messageErreur = "Erreur! Il faut rentrer une valeur pour :";
        if (empty($cote1_triangle))
            $messageErreur = $messageErreur . " - Côté 1";
        if (empty($cote2_triangle))
            $messageErreur = $messageErreur . " - Côté 2";
        if (empty($cote3_triangle))
            $messageErreur = $messageErreur . " - Côté 3";

        //Enregistrer le message d'erreur à afficher dans resultat.php 
        $_SESSION['erreur-champ-vide'] = $messageErreur;
    } else {
        //Longueur des côté du triangle
        $_SESSION['longueur-cotes-triangle'] = "Côté 1 = " . $cote1_triangle;
        $_SESSION['longueur-cotes-triangle'] = $_SESSION['longueur-cotes-triangle'] . "   " . "Côté 2 = " . $cote2_triangle;
        $_SESSION['longueur-cotes-triangle'] = $_SESSION['longueur-cotes-triangle'] . "   " . "Côté 3 = " . $cote3_triangle;
        //Calculer le type du triangle
        if ($cote1_triangle === $cote2_triangle && $cote2_triangle === $cote3_triangle) {
            $_SESSION['type-triangle'] = "Votre triangle est équilateral et ressemble à celui affichée ci-dessous.";
            $_SESSION['image-triangle'] = "img/Triangle.Equilateral.svg";
        } elseif ($cote1_triangle === $cote3_triangle || $cote1_triangle === $cote2_triangle || $cote2_triangle === $cote3_triangle) {
            $_SESSION['type-triangle'] = "Votre triangle est isocèle et ressemble à celui affichée ci-dessous.";
            $_SESSION['image-triangle'] = "img/Triangle.Isosceles.svg";
        } else {
            $_SESSION['type-triangle'] = "Votre triangle est scalène et ressemble à celui affichée ci-dessous.";
            $_SESSION['image-triangle'] = "img/Triangle.Scalene.svg";
        }
    }

    //Redirriger le navigateur vers resultat.php
    header(header: 'Location: resultat.php');
    exit();
}
//Si le formulaire dans index.php n'est pas soumis, redirriger le navigateur vers index.php
else {
    header(header: 'Location: index.php');
    exit();
}
