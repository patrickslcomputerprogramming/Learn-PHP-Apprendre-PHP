<?php 
//FRENCH BELOW
//EXERCISE 1
//Create a class without a Constructor Method 
//Declare a Class
class Students
{
  //Declare public Properties
  public $firstname;
  public $lastname;

  //Declare a private method that calculates the fisrtname
  private function setFirstname(){
    return ucFirst(strtolower($this->firstname));
  }

  //Declare a public method that gives access to the firstname
  public function getFirstname(){
    return $this->setFirstname();
  }

  //Declare a private method that calculates the lastname
  private function setLastname(){
      return ucFirst(strtolower($this->lastname));
  }
  
  //Déclarer a public method that gives access to the lastname
  public function getLastname(){
      return $this->setLastname();
  }

  //Declare a private method that calculates a random ID
  private function setID()
  {
    $id=rand();
    return $id; 
  }
 
  //Declare a public method that gives access to the random ID
  public function getID()
  {
    return $this->setID(); 
  }
}

//Instantiate Objets
$student1 = new Students;
$student2 = new Students;
$student3 = new Students;

//Access public Properties
$student1 ->firstname = 'Patrick';
$student1 ->lastname = 'Saint-Louis';

$student2 ->firstname = 'Rasmus';
$student2 ->lastname ='Lerdorf'; 

$student3 ->firstname ='Albert';
$student3 ->lastname = 'Einstein'; 

//Access public Properties
echo "STUDENT #1 : " . $student1 ->firstname . " " . $student1 ->lastname . "<br/>";
echo "STUDENT #2 : " . $student2 ->firstname . " " . $student2 ->lastname . "<br/>";
echo "STUDENT #3 : " . $student3 ->firstname . " " . $student3 ->lastname . "<br/>";

//Access public Methods
echo "STUDENT #1 : " . $student1 ->getFirstname() . " " 
                     . $student1 ->getLastname() . " "
                     . $student1 ->getID() . "<br/>";

echo "STUDENT #2 : " . $student2 ->getFirstname() . " " 
                     . $student2 ->getLastname() . " "
                     . $student2 ->getID() . "<br/>";

echo "STUDENT #3 : " . $student3 ->getFirstname() . " " 
                     . $student3 ->getLastname() . " "
                     . $student3 ->getID() . "<br/>";                




//EXERCISE 2
//Create a class with a Constructor Method 
//Declare a Class
class Students
{
  //Declare private Properties
  private $firstname;
  private $lastname;

  //Declare a Constructor Method
  public function __construct($fn, $ln){
      $this->firstname = $fn;
      $this->lastname = $ln;
  }

  //Declare a private method that calculates the fisrtname
  private function setFirstname(){
    return ucFirst(strtolower($this->firstname));
  }

  //Declare a public method that gives access to the firstname
  public function getFirstname(){
    return $this->setFirstname();
  }

  //Declare a private method that calculates the lastname
  private function setLastname(){
      return ucFirst(strtolower($this->lastname));
  }
  
  //Déclarer a public method that gives access to the lastname
  public function getLastname(){
      return $this->setLastname();
  }

  //Declare a private method that calculates a random ID
  private function setID()
  {
    $id=rand();
    return $id; 
  }
 
  //Declare a public method that gives access to the random ID
  public function getID()
  {
    return $this->setID(); 
  }
}

//Instantiate Objets
$student1 = new Students('Patrick','Saint-Louis');
$student2 = new Students('Rasmus', 'Lerdorf');
$student3 = new Students('Albert', 'Einstein');

//Access public Methods
echo "STUDENT #1 : " . $student1 ->getFirstname() . " " 
                     . $student1 ->getLastname() . " "
                     . $student1 ->getID() . "<br/>";

echo "STUDENT #2 : " . $student2 ->getFirstname() . " " 
                     . $student2 ->getLastname() . " "
                     . $student2 ->getID() . "<br/>";

echo "STUDENT #3 : " . $student3 ->getFirstname() . " " 
                     . $student3 ->getLastname() . " "
                     . $student3 ->getID() . "<br/>";  


//EXERCISE 3

//Declare a Class
class Students
{
  //Declare private Properties
  private $firstname;
  private $lastname;

  //Declare a Constructor Method
  public function __construct($fn, $ln){
      $this->firstname = $fn;
      $this->lastname = $ln;
  }

  //Declare a private method that calculates the fisrtname
  private function setFirstname(){
    return ucFirst(strtolower($this->firstname));
  }

  //Declare a protected method that gives access to the firstname
  public function getFirstname(){
    return $this->setFirstname();
  }

  //Declare a private method that calculates the lastname
  private function setLastname(){
      return ucFirst(strtolower($this->lastname));
  }
  
  //Déclarer a protected method that gives access to the lastname
  public function getLastname(){
      return $this->setLastname();
  }

  //Declare a private method that calculates a random ID
  private function setID()
  {
    $id=rand();
    return $id; 
  }
 
  //Declare a protected method that gives access to the random ID
  public function getID()
  {
    return $this->setID(); 
  }
}


//Create a sub class of Students  
//A sub class is a "child" class and Students is its "parent" class
class DisplayStudents extends Students
{
  //Declare a public Method to display output of Students
  public function displayOutputs(){
      echo $this ->getFirstname() . " " .
           $this ->getLastname() . " " .
           $this ->getID();
  }
}

//Instantiate Objets
$student1 = new DisplayStudents('Patrick','Saint-Louis');
$student2 = new DisplayStudents('Rasmus', 'Lerdorf');
$student3 = new DisplayStudents('Albert', 'Einstein');

//Access public Methods
echo "STUDENT #1 : "; 
$student1 ->displayOutputs();
echo "<br/>";

echo "STUDENT #2 : "; 
$student2 ->displayOutputs();
echo "<br/>";

echo "STUDENT #3 : "; 
$student3 ->displayOutputs();
echo "<br/>";



// -----------------------------------------
// FRENCH --------------------
// -----------------------------------------


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


