<?php

class CalculerDateHeure{
    //Propriétés
    private $continent;
    private $ville;
    private $formatDate;
    private $fuseauHoraire;

    //Méthode constructeur
    public function __construct($continent, $ville, $formatDate){
        $this->continent = $continent;
        $this->ville = $ville;
        $this->formatDate = $formatDate;
    }    

    //Créer un fuseau horaire (ex: "America/Toronto")
    private function creerFuseauHoraire(): void
    {
        $this->fuseauHoraire = $this->continent . '/' . $this->ville; 
    }

    //Valider un fuseau horaire
    private function validerFuseauHoraire(): bool
    {
        if (in_array($this->fuseauHoraire, timezone_identifiers_list()))
            return true;
        else
            return false;
    }

    //Calculer date et heure selon fuseau horaire
    private function calculerDateheure(): string
    {
        //Configurer le fuseau horaire
        date_default_timezone_set($this->fuseauHoraire);
        //Calculer date et heure 
        $objetDatTim = new DateTime;
        $currentDateTime = $objetDatTim->format($this->formatDate);
        return $currentDateTime;
    }

    public function calculerResultat(): string{
        //Créer un fuseau horaire (ex: "America/Montreal")
        $this->creerFuseauHoraire();
        //Valider un fuseau horaire
        if ($this->validerFuseauHoraire()){
            //Calculer date et heure selon fuseau horaire
            $dh=$this->calculerDateheure();
            $msg= "Date et Heure | Date and Time : " . $dh; 
        }else{
            $msg= "Erreur détectée dans le Fuseau Horaire. Essayez encore!";
            $msg= $msg . "<br>Error in the TimeZone. Try again!";
        }
        return $msg;
    }
}
