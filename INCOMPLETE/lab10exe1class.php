<?php
// Classe Clients
class Clients
{
    private $prenom, $nom, $adresse, $dateEmbauche;

    public function __construct($pr, $nm, $ad, $de){
        $this->prenom = $pr;
        $this->nom = $nm;
    }

    // Créer une méthode privée
    private function obtenirPrenom()
    {
        return $this->prenom;
    }

    // Créer une méthode privée
    private function obtenirAdresse()
    {
        return $this->adresse;
    }

    // Créer une méthode privée
    private function definirAnciennete()
    {
        $obj = new DateTime();
        $dateActuelle = $obj->format("Y");
    }

    // Créer une méthode privée
    private function obtenirAnciennete()
    {
        return $this->anciennete;
    }

    // Créer une méthode publique pour afficher les informations
    
    

    // Créer une méthode destructeur
    public function __destruct()
    {
        // Destruction de l'objet, nettoyage des propriétés
    }
}
