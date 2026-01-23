<?php

/**
 *calcul.php
 *Lab 4 Exercice 1 
 *Structures de controle conditionnelles - Session PHP - Gestion de formulaire
 *Patrick Saint-Louis, 2026
 */

//Si le formulaire dans index.php est soumis, calculer
if (isset($_POST['ipt-submit-form1'])) {

    //Démarrer une nouvelle session PHP et créer $_SESSION
    session_start();

    //Assigner les données reçu du formulaire   
    $donnée_entrée = $_POST["ipt-text-entrée-form1"];

    //Si aucune donnée n'est reçue  
    if ($donnée_entrée != 0 && empty($donnée_entrée)) {
        //Enregistrer le message d'erreur à afficher dans resultat.php 
        $_SESSION['erreur-donnée-absente'] = "Une erreur s'est produite! Vous avez soumis le formulaire avec un champ vide!";
    } else {
        //Enregistrer les résultats à afficher dans resultat.php 
        $_SESSION['donnée_entrée'] = $donnée_entrée;
        //Si la donnée reçue contient une valeur alphanumérique
        if (preg_match(pattern: "/[a-z]/", subject: $donnée_entrée)) {
            //Enregistrer le message d'erreur à afficher dans resultat.php 
            $_SESSION['erreur-donnée-incorrecte'] = "Une erreur s'est produite! " . $donnée_entrée . " n'est pas une donnée numérique!";
        } else {
            //Si la donnée reçue contient une valeur numérique 
            //Calculer le type (Chiffre ou Nombre)
            $type_donnée = ($donnée_entrée > -10 && $donnée_entrée < 10) ? 'Chiffre' : 'Nombre';

            //Calculer le signe (Positif, Negatif ou Nul)
            if ($donnée_entrée > 0)
                $signe_donnée = "Positif";
            elseif ($donnée_entrée == 0)
                $signe_donnée = "Nul";
            else
                $signe_donnée = "Négatif";

            //Enregistrer les résultats à afficher dans resultat.php 
            $_SESSION['type_donnée'] = $type_donnée;
            $_SESSION['signe_donnée'] = $signe_donnée;
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
