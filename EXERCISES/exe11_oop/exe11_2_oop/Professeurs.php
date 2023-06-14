<?php

//Créer une classe avec méthode constructeur
class Professeurs
{
  //Déclarer des propriétés private
  private $prenom, $nom, $dateNaissance, $eMail, $phone;

  //Déclarer une méthode Constructeur
  //Cette methode est automatiquement appeler quand on crée un objet
  public function __construct($pm, $nm, $dn, $el, $pe){
      $this->prenom = $pm;
      $this->nom = $nm;
      $this->dateNaissance = $dn;
      $this->eMail = $el;
      $this->phone = $pe;
  }

  //Déclarer une méthode private qui retourne $prenom
  private function setPrenom(){
    return $this->prenom;
  }

  //Déclarer une méthode private qui retourne setPrenom()
  private function getPrenom(){
    return $this->setPrenom();
  }
 
  //Déclarer une méthode private qui retourne $nom
  private function setNom(){
    return $this->nom;
  }

  //Déclarer une méthode private qui retourne setNom()
  public function getNom(){
    return $this->setNom();
  }

  //Déclarer une méthode private qui retourne $eMail
  private function setEMail(){
    return $this->eMail;
  }

  //Déclarer une méthode private qui retourne setNom()
  private function getEMail(){
    return $this->setEMail();
  }

  //Déclarer une méthode private qui retourne $phone
  private function setPhone(){
    return $this->phone;
  }

  //Déclarer une méthode private qui retourne setPhone()
  private function getPhone(){
    return $this->setPhone();
  }

  //Déclarer une méthode private qui calcule et retourne l'age
  private function setAge()
  {
    return getdate()['year'] - ($this->dateNaissance); 
  }
 
  //Déclarer une méthode private qui retourne setNumero()
  private function getAge()
  {
    return $this->setAge(); 
  }

  //Déclarer une méthode public qui affiche les infos fournies par les autres méthodes
  public function profil(){
    echo "<p>Prenom: ".$this->getPrenom()."</p>";
    echo "<p>Nom: ".$this->getNom()."</p>";
    echo "<p>Email: ".$this->getEMail()."</p>";
    echo "<p>Téléphone: ".$this->getPhone()."</p>";
    echo "<p>Age: ".$this->getAge()." ans</p>";
  }

  //Déclarer une méthode Constructeur
  //Cette methode est automatiquement appeler quand on finit d'accéder aux ressources de la classe
  public function __destruct(){
    unset($this->prenom);
    unset($this->nom); 
    unset($this->dateNaissance);
    unset($this->eMail);
    unset($this->phone);
    //echo"$this->prenom";
  }

}

