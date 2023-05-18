<?php 
  /*
  ENGLISH HERE  
  FRANCAIS EN DESSOUS
  */

  // Basic Syntax
  // This is a one-line c++ style comment
  echo "Hello Quebec"; // Don't forget to add the semi colon at the end of each line
  
  # This is a one-line shell-style comment 
  echo "<br/>"; # I used the html tag br to add a line break
  
  /* This is a multi line comment
  You don't have to indicate the datatype of a variable when you declare it
  The datatype of a variable depends on the value you assign to it */


  //Each PHP command ends with a semicolon
  echo "Each PHP command ends with a semicolon";
  echo "<br/>";

  //Escaping characters
  $escapin1 = 'PHP\'s syntax is very easy to learn';
  $escapin2 = "PHP said : \"I'm the best programming language\".";
  echo $escapin1."<br/>".$escapin2."<br/>";

  //A $ symbol is mandatory in the front of all PHP variables
  echo "A $ symbol is mandatory in the front of all PHP variables";
  echo "<br/>";

  // Differences between single quote and double quotes
  // Using double quotes allows you to combine literal string and variable values
  // Using single quotes allows you to have only literal string
  $likethis = 2;
  $notice1 = "Do not forget to write your variable like this: $likethis";
  $notice2 = 'Do not forget to write your variable like this: $likethis ';
  echo $notice1;
  echo "<br/>";
  echo $notice2;

  echo "<br/>";

  // User-Defined Constant TPS and TVQ
  define("TPS",0.05);
  define("TVQ",0.09975);
  $unit_price=2.5;
  $quantity=40;
  $subtotal=$unit_price*$quantity;
  $total=$subtotal+($subtotal*TPS)+($subtotal*TVQ);
  echo "Due : ". $total . "$";
  echo "<br/>";

  // Predefined Constant
  echo "This code is the line number  " . __LINE__ 
  . "<br/>of the php file named:  " . __FILE__ 
  . "<br/>saved in the directory:  ". __DIR__ ;

  echo "<br/>";

  // Printf
  // s for string, d for decimal, and X for hexadecimal
  printf("My name is %s. My ID is the number %d that is written %X in hexadecimal",'Patrick', 10, 10);

?>

<!-- PHP embedded within HTML -->
<!DOCTYPE html>
<html>
  <head>
    <title>PHP in HTML</title>
  </head>
  <body>
    <?php
      echo "Hello, I'm PHP inside HTML!"; 
    ?>
  </body>
</html>

<!-- HTML embedded within PHP -->
<?php
  echo "<h1>Hello again Quebec, now I'm Heading 1</h1>";
  echo "<br/>"; 

  echo "<ul>"; 
		echo "<li><a href=\"#\">List Item 1</a></li>\n"; 
		echo "<li><a href=\"#\">List Item 2</a></li>\n"; 
    echo "<li><a href=\"#\">List Item 3</a></li>\n"; 
    echo "<li><a href=\"#\">List Item 4</a></li>\n"; 
	echo "</ul>"; 

  echo "<br/>"; 

  $number1=1;
  $number2=2;
  $number3=3;
  $number4=4;

  echo "<ul>"; 
    echo "<li><a href=\"#\">List Item $number1 </a></li>\n"; 
    echo "<li><a href=\"#\">List Item $number2 </a></li>\n"; 
    echo "<li><a href=\"#\">List Item $number3 </a></li>\n"; 
    echo "<li><a href=\"#\">List Item $number4 </a></li>\n"; 
  echo "</ul>"; 

?>


<?php
  $var_bool = false;          // a bool
  $var_str  = "lorem ipsum";  // a string
  $var_int = 100;             // an int

  // Built-in function gettype()
  // To display the type of $var_bool, $var_str, and $var_int 
  echo gettype($var_bool);
  echo "<br/>";
  echo gettype($var_str);
  echo "<br/>";
  echo gettype($var_int);
  echo "<br/>";

  
  // Built-in function var_dump()
  // To display the location, type, and value of $var_int
  var_dump($var_int);       
  

  // Built-in function is_int()
  // If $var_int is an integer, display it followed by a text
  if (is_int($var_int)) {
    echo "$var_int is an Integer"; 
  }
  
  echo "<br/>";

  // Built-in function is_string()
  // If $var_bool is a string, display it followed by a text
  // $var_bool is a boolean nothing will be displayed
  if (is_string($var_bool)) {
    echo "$var_bool is a String";
  }

  echo "<br/>";

?>


<?php 

/* FRENCH VERSION
VERSION FRANCAISE */


echo"Chaque commande PHP se termine par un point-virgule";
echo"<br/>";


// Il s’agit d’un commentaire de style c++ d’une ligne
echo"Bonjour le Québec";  // N’oubliez pas d’ajouter un point-virgule à la fin de chaque ligne

# Il s’agit d’un commentaire de style shell d’une ligne 
echo"<br/>";  # J’ai utilisé la balise html br pour ajouter un saut de ligne

/* Il s’agit d’un commentaire multiligne
Vous n’avez pas besoin d’indiquer le type de données d’une variable lorsque vous le déclarez
Le type de données d’une variable dépend de la valeur que vous lui attribuez */

//Chaque variable commence par le symbole $ 
$subtotal=100;
$total=$subtotal+($subtotal*0.05)+($subtotal*0.09975);
echo"Somme due :". $total ."$ <br/>";
echo"Somme due : $total $ <br/>";
echo'Somme due : $total $ <br/>';

$likethis = 2;
$notice1 = "La valeur de la variable est : $likethis";
$notice2 = 'Le nom de la variable est : $likethis';
echo $notice1;
echo"<br/>";
echo $notice2;
echo"<br/>";


$var_bool = false;    // un booléen
$var_str = "lorem ipsum";  // une chaîne de caractères
$var_int = 100;    // un entier

//Fonction intégrée gettype()
//Pour afficher le type de $var_bool, $var_str et $var_int 
echo gettype($var_bool);
echo "<br/>";
echo gettype($var_str);
echo "<br/>";
echo gettype($var_int);
echo "<br/>";
  

//Fonction intégrée var_dump()
//Pour afficher l’emplacement, le type et la valeur de $var_int
var_dump($var_int);
echo "<br/>"; 
var_dump($var_str); 
  

//Fonction intégrée is_int()
//Si $var_int est un entier, affichez-le suivi d’un texte
if (is_int($var_int)) {
    echo "$var_int est un entier"; 
}
  
//Fonction intégrée is_string()
//Si $var_bool est une chaîne, affichez-la suivie d’un texte
//$var_bool est un booléen rien ne sera affiché
if (is_string($var_bool)) {
    echo "$var_bool is a String";
}

echo "<br/>";

printf("Mon nom est %s. Mon ID est le nombre %d qui s’écrit %X en hexadécimal",'Patrick', 10, 10);

echo "<br/>";

//Constante tps et tvq
define("TPS",0.05);
define("TVQ",0.09975);
$unit_price=2.5;
$quantity=40;
$subtotal=$unit_price*$quantity;
$total=$subtotal+($subtotal*TPS)+($subtotal*TVQ);
echo"Somme due :".$total."$";

echo "<br/>";

//Constante prédéfinie
echo "Affiche le numéro de ligne " .  __LINE__
. "<br/>Affiche le répertoire incluant le fichier: " .  __FILE__
. "<br/>Affiche le répertoire sans le fichier: ".  __DIR__ ;

echo "<br/>";
echo "<br/>";
?>

<!DOCTYPE html>
<html>
  <head>
    <title>PHP dans HTML</title>
  </head>
  <body>
    <?php
      echo " Bonjour, je suis PHP à l’intérieur html! "; 
    ?>
  </body>
</html>


<?php
  //Html intégré dans php
  echo "<h1> Bon matin à nouveau Québec, maintenant je suis Titre 1 </h1>";
  echo "<br/>"; 

  //Html intégré dans php
  echo "<ul>"; 
     echo "<li><a href=\"#\">List Item 1</a></li>\n"; 
     echo "<li><a href=\"#\">List Item 2</a></li>\n"; 
     echo "<li><a href=\"#\">List Item 3</a></li>\n"; 
     echo "<li><a href=\"#\">List Item 4</a></li>\n"; 
   echo "</ul>"; 

  //Html intégré dans php
  $numero1=1;
  $numero2=2;
  $numero3=3;
  $numero4=4;

echo "<ul>"; 
  echo "<li><a href=\"#\">List Item $numero1</a></li>\n"; 
  echo "<li><a href=\"#\">List Item $numero2</a></li>\n"; 
  echo "<li><a href=\"#\">List Item $numero3</a></li>\n"; 
  echo "<li><a href=\"#\">List Item $numero4</a></li>\n"; 
echo "</ul>";

echo"<br/><br/><br/>";


?>


