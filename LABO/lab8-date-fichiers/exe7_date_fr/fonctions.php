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
