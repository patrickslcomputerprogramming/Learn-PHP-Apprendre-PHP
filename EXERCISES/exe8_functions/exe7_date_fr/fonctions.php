<?php

//Créer un fuseau horaire (ex: "America/Montreal")
function creerFuseauHoraire($continent, $ville)
{
    $fuseauHoraire = $continent . '/' . $ville;
    return $fuseauHoraire;
}

//Valider un fuseau horaire
function validerFuseauHoraire($fuseauHoraire)
{
    if (in_array($fuseauHoraire, timezone_identifiers_list()))
        return true;
    else
        return false;
}

//Calculer date et heure selon fuseau horaire
function calculerDateheure($fuseauHoraire, $formatAffichage)
{
    //Configurer le fuseau horaire
    date_default_timezone_set($fuseauHoraire);
    //Calculer date et heure 
    $objetDatTim = new DateTime;
    $currentDateTime = $objetDatTim->format($formatAffichage);
    return $currentDateTime;
}
