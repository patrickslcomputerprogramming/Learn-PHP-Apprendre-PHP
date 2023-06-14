<?php 

//Créer une classe sans méthode constructeur
//Déclarer la classe
class Etudiants
{
  //Déclarer des propriétés public
  public $prenom;
  public $nom;

  //Déclarer une méthode private qui retourne $prenom
  private function setPrenom(){
    return $this->prenom;
  }

  //Déclarer une méthode public qui retourne setPrenom()
  public function getPrenom(){
    return $this->setPrenom();
  }

  //Déclarer une méthode private qui retourne $nom
  private function setNom(){
    return $this->nom;
  }

  //Déclarer une méthode public qui retourne setNom()
  public function getNom(){
    return $this->setNom();
  }

  //Déclarer une méthode private qui calcule et retourne un numéro aléatoire
  private function setNumero()
  {
    $numero=rand();
    return $numero; 
  }
 
  //Déclarer une méthode public qui retourne setNumero()
  public function getNumero()
  {
    return $this->setNumero(); 
  }
}

//Instantier des objets
$etudiant1 = new Etudiants;
$etudiant2 = new Etudiants;
$etudiant3 = new Etudiants;

//Affecter des valeurs aux propriétés
$etudiant1->prenom = 'Patrick';
$etudiant1->nom = 'Saint-Louis';

$etudiant2->prenom = 'Rasmus';
$etudiant2->nom = 'Lerdor'; 

$etudiant3->prenom = 'Albert';
$etudiant3->nom = 'Einstein'; 


//Afficher les sorties des méthodes
echo"<pre>";

//Accédez aux propriétés public via l'objet  
echo"<p>Prénom  :".$etudiant1->prenom."</p>";
echo"<p>Nom     :".$etudiant1->nom."</p>";
echo"<p>Numero  :".$etudiant1->getNumero()."</p>";

echo"<hr/>";

//Accédez aux méthodes public via l'objet
echo"<p>Prénom  :".$etudiant2->getPrenom()."</p>";
echo"<p>Nom     :".$etudiant2->getNom()."</p>";
echo"<p>Numero  :".$etudiant2->getNumero()."</p>";

echo"<hr/>";

//Accédez aux méthodes public via l'objet
echo"<p>Prénom  :".$etudiant3->getPrenom()."</p>";
echo"<p>Nom     :".$etudiant3->getNom()."</p>";
echo"<p>Numero  :".$etudiant3->getNumero()."</p>";

echo"</pre>";

echo"<hr/>";





//Créer une classe avec méthode constructeur
class Eleves
{
  //Déclarer des propriétés private
  private $prenom;
  private $nom;

  //Déclarer une méthode Constructeur
  //Cette methode est automatiquement appeler quand on crée un objet
  public function __construct($firstNom, $lastNom){
      $this->prenom = $firstNom;
      $this->nom = $lastNom;
  }

  //Déclarer une méthode private qui retourne $prenom
  private function setPrenom(){
    return $this->prenom;
  }

  //Déclarer une méthode public qui retourne setPrenom()
  public function getPrenom(){
    return $this->setPrenom();
  }
 
  //Déclarer une méthode private qui retourne $nom
  private function setNom(){
    return $this->nom;
  }

  //Déclarer une méthode public qui retourne setNom()
  public function getNom(){
    return $this->setNom();
  }

   //Déclarer une méthode private qui calcule et retourne un numéro aléatoire
  private function setNumero()
  {
    $numero=rand();
    return $numero; 
  }
 
  //Déclarer une méthode public qui retourne setNumero()
  public function getNumero()
  {
    return $this->setNumero(); 
  }
}


//Instantier des objets
$eleve1 = new Eleves('Patrick', 'Saint-Louis');
$eleve2 = new Eleves('Rasmus', 'Lerdor');
$eleve3 = new Eleves ('Albert', 'Einstein');

 
//Afficher les sorties des méthodes
echo"<pre>";

//Accédez aux méthodes public via l'objet
echo"<p>Prénom  :".$eleve1->getPrenom()."</p>";
echo"<p>Nom     :".$eleve1->getNom()."</p>";
echo"<p>Numero  :".$eleve1->getNumero()."</p>";

echo"<hr/>";

//Accédez aux méthodes public via l'objet
echo"<p>Prénom  :".$eleve2->getPrenom()."</p>";
echo"<p>Nom     :".$eleve2->getNom()."</p>";
echo"<p>Numero  :".$eleve2->getNumero()."</p>";

echo"<hr/>";

//Accédez aux méthodes public via l'objet
echo"<p>Prénom  :".$eleve3->getPrenom()."</p>";
echo"<p>Nom     :".$eleve3->getNom()."</p>";
echo"<p>Numero  :".$eleve3->getNumero()."</p>";

echo"</pre>";


