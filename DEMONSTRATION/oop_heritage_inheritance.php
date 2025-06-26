<?php
//Exercice 1
echo "CLASSE Etudiant<br/>";

// Déclaration d'une classe
class Etudiants
{
    // Déclaration des propriétés privées
    private $prenom;
    private $nom;

    // Déclaration du constructeur
    public function __construct($pr, $nm)
    {
        $this->prenom = $pr;
        $this->nom = $nm;
    }

    // Déclaration d'une méthode privée qui formate le prénom
    private function definirPrenom()
    {
        return ucfirst(strtolower($this->prenom));
    }

    // Déclaration d'une méthode publique qui donne accès au prénom
    public function obtenirPrenom()
    {
        return $this->definirPrenom();
    }

    // Déclaration d'une méthode privée qui formate le nom
    private function definirNom()
    {
        return ucfirst(strtolower($this->nom));
    }

    // Déclaration d'une méthode publique qui donne accès au nom
    public function obtenirNom()
    {
        return $this->definirNom();
    }

    // Déclaration d'une méthode privée qui génère un ID aléatoire
    private function definirID()
    {
        $id = rand();
        return $id;
    }

    // Déclaration d'une méthode publique qui donne accès à l'ID
    public function obtenirID()
    {
        return $this->definirID();
    }

    // Méthode protected pour formater les informations de l'étudiant
    protected function nomComplet()
    {
        return ($this->prenom . ", ". $this->nom);
    }

    // Déclaration du destructeur
    public function __destruct()
    {
        echo "Objet Etudiant détruit :" . $this->prenom . " " . $this->nom . "<br>";
    }
}

//Creez un objet et appelle toutes les methodes accessibles 
//En passant d'abord l'argument nom, puis prénom (introduite en PHP 8.0)
// Création de l'objet avec les arguments : nom, prénom
$prenom_recu1 =  "Jean";
$nom_recu1 = "Dupont";
$etudiant = new Etudiants(nm: $nom_recu1, pr: $prenom_recu1);

// Appel des méthodes accessibles publiquement
echo "Nom : " . $etudiant->obtenirNom() . "<br>";
echo "Prénom : " . $etudiant->obtenirPrenom() . "<br>";
//echo "Nom Complet : " . $etudiant->nomComplet() . "<br>"; 
echo "ID : " . $etudiant->obtenirID() . "<br>";

//************************************************************** */
//Exercice 2
echo "<br/>SOUS CLASSE SiEtudiantPeutVoter: NOM<br/>";

// Sous-classe qui étend la classe Etudiants
class SiEtudiantPeutVoter extends Etudiants
{
    private $age;

    // Nouveau constructeur qui accepte un 3e argument (l'âge)
    public function __construct($pr, $nm, $ag=18)
    {
        // Appel au constructeur parent (Etudiants)
        parent::__construct($pr, $nm);
        $this->age = $ag;
    }

    // Méthode pour obtenir l'âge
    public function obtenirAge()
    {
        return $this->age;
    }

    // Méthode pour vérifier si l'étudiant peut voter (âge >= 18)
    public function peutVoter()
    {
        //Appelle d'une méthode protégée
        echo $this->nomComplet();
        if ($this->age >= 18) {
            return " peut voter au Québec.";
        } else {
            return " ne peut pas voter au Québec. Il/elle n'a pas encore 18 ans.";
        }
    }

    // Méthode de nettoyage du destructeur (si nécessaire)
    public function __destruct()
    {
        echo "Objet SiEtudiantPeutVoter détruit : Age: {$this->age}.<br>";
    }
}


// Création d'un objet de la sous-classe avec nom, prénom, et âge
$prenom_recu2 = "John";
$nom_recu2 = "Doe";
$age_recu2 = 17;

// Utilisation des arguments nommés pour créer un étudiant avec un âge
$droitVote = new SiEtudiantPeutVoter(nm: $nom_recu2, pr: $prenom_recu2, ag: $age_recu2);

// Appel des méthodes accessibles
echo "Nom : " . $droitVote->obtenirNom() . "<br>";
echo "Prénom : " . $droitVote->obtenirPrenom() . "<br>";
echo "Age : " . $droitVote->obtenirAge() . "<br>";
//echo "Nom Complet : " . $droitVote->nomComplet() . "<br>";
echo "ID : " . $droitVote->obtenirID() . "<br>";

// Vérification si l'étudiant peut voter
echo $droitVote->peutVoter() . "<br>";

//************************************************************** */
//Exercice 3
echo "<br/>SOUS CLASSE SiEtudiantPeutVoter: OUI<br/>";
$prenom_recu3 = "Jane";
$nom_recu3 = "Doe";
$age_recu3 = 20;

// Utilisation des arguments nommés pour créer un étudiant avec un âge
$droitVote = new SiEtudiantPeutVoter(nm: $nom_recu3, pr: $prenom_recu3, ag: $age_recu3);

// Appel des méthodes accessibles
echo "Nom : " . $droitVote->obtenirNom() . "<br>";
echo "Prénom : " . $droitVote->obtenirPrenom() . "<br>";
echo "Age : " . $droitVote->obtenirAge() . "<br>";
//echo "Nom Complet : " . $droitVote->nomComplet() . "<br>";
echo "ID : " . $droitVote->obtenirID() . "<br>";

// Vérification si l'étudiant peut voter
echo $droitVote->peutVoter() . "<br>";


//************************************************************** */
//Exercice 4
echo "<br/>SOUS CLASSE SiEtudiantPeutVoter: Argument age par défaut <br/>";
$prenom_recu4 = "John";
$nom_recu4 = "Dupont";


// Utilisation des arguments nommés pour créer un étudiant avec un âge
$droitVote = new SiEtudiantPeutVoter(pr: $prenom_recu4, nm: $nom_recu4);

// Appel des méthodes accessibles
echo "Nom : " . $droitVote->obtenirNom() . "<br>";
echo "Prénom : " . $droitVote->obtenirPrenom() . "<br>";
echo "Age : " . $droitVote->obtenirAge() . "<br>";
//echo "Nom Complet : " . $droitVote->nomComplet() . "<br>";
echo "ID : " . $droitVote->obtenirID() . "<br>";

// Vérification si l'étudiant peut voter
echo $droitVote->peutVoter() . "<br>";