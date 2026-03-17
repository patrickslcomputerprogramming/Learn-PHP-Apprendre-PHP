<?php

//Stocker le nombre reçu de XMLHTTPRequest
$nbr = $_REQUEST["user_data"];

//Fonction pour calculer si une valeur numérique est un chiffre ou un nombre
function est_chiffre_ou_nombre($n){
    return ($n>-10 && $n<10) ? "chiffre" : "nombre";
}

//Fonction pour calculer si une valeur numérique est positive ou un négative
function est_positif_ou_negatif($n){
    return ($n>=0) ? "positif" : "négatif";
}

//Fonction pour calculer si une valeur numérique est paire ou impaire
function est_pair_ou_impair($n){
    return ($n%2===0) ? "pair" : "impair";
}

//Afficher pour envoyer la réponse à XMLHTTPRequest
echo $nbr . " est un " . est_chiffre_ou_nombre($nbr) . " " 
    . est_positif_ou_negatif($nbr) . " " 
    . est_pair_ou_impair($nbr);
