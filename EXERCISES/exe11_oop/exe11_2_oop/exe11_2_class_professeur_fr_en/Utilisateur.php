<?php

//Créer une classe avec méthode constructeur
class Utilisateur
{
  //Déclarer des propriétés
  private $prenom, $nom, $anneeNaissance;
  private $prenomFormate, $nomFormate;
  private $age;
  

  //Déclarer une méthode Constructeur
  //Cette methode est automatiquement appeler quand on crée un objet
  public function __construct($prenom, $nom, $anneeNaissance){
      //Affecter les propriétés avec les arguments reçus
      $this->prenom = $prenom;
      $this->nom =  $nom;
      $this->anneeNaissance = $anneeNaissance;
  }

  //Méthode pour convertir la première lettre d'un mot en majuscule et les autres en minuscule
  private function formaterMot($mot){
      //Calculer longueur mot
      $nbre_caracteres = strlen($mot);
      //Créer et initialiser une variable pour stocker le mot formatté
      $mot_formatte = "";
      //Lire chaque lettre du mot pour le mettre en majuscule ou miniscule dans le mot formatté
      for ($i=0; $i<$nbre_caracteres; $i++) {
          //Mettre premiere lettre, ou lettre apres un espace vide ou un - en majuscule
          if ($i==0 || $mot[($i-1)]== " " || $mot[($i-1)]== "-"){
              $mot_formatte = $mot_formatte . strtoupper($mot[$i]);
          } 
          //Mettre tout autre lettre en minuscule
          else {
              $mot_formatte = $mot_formatte . strtolower($mot[$i]);
          }
      }
      return $mot_formatte;
  }

  //Méthode pour calculer age 
  private function calculerAge(){
    $anneeActuelle = getdate()["year"];
    $this->age = $anneeActuelle - $this->anneeNaissance;
  }

  //Méthode pour affiche les informations fournies et calculées
  public function calculerProfil(){
      //Formatter prenom et nom 
      $this->prenomFormate = $this->formaterMot($this->prenom);
      $this->nomFormate = $this->formaterMot($this->nom);
      //Calculer age
      $this->calculerAge();
      //Créer un tableau avec les donnees calculees
      $resultat["Prenom|Firstname"] = $this->prenomFormate;
      $resultat["Nom|Lastname"] = $this->nomFormate;
      $resultat["Annee de Naissance|Birthyear"] = $this->anneeNaissance;
      $resultat["Age"] = $this->age;
      //Retourner le tableau contenant les résultats
      return $resultat;
  }
}

