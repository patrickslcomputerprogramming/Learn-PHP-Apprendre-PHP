<?php

/**
 *exe11_2.php
 *EXERCISE 11 NUMBER 2
 *FORM & FORM HANDLING
 *Patrick Saint-Louis, 2023
 */
if (!isset($_POST['send'])) {
?>

  <!DOCTYPE html>
  <html>

  <head>
    <title>Question</title>
    <style>
      .bluetext {
        color: blue;
      }
    </style>
  </head>

  <body>
    <h1>Utilisation d'une Classe</h1>
    <hr>
    <!--Form-->
    <form id="form1" method="post" action="<?php echo $_SERVER['SCRIPT_NAME']; ?>">
      <!--Form fields to input data-->
      <label for="input1">Prénom</label><br/>
      <input id="input1" type="text" name="prenom" required><br/>
      <label for="input2">Nom</label><br/>
      <input id="input2" type="text" name="nom" required><br/>
      <label for="input3">Année de Naissance</label><br/>
      <input id="input3" type="number" name="naissance" required><br/>
      <label for="input4">Courriel</label><br/>
      <input id="input4" type="text" name="courriel" required><br/>
      <label for="input5">Téléphone</label><br/>
      <input id="input6" type="text" name="telephone" required><br/><br/>
      <input id="submitbutton1" type="submit" name="send" value="SEND" />
    </form>
  </body>

  </html>

<?php
}

//Form Handling
//Go below only after a user pressed the input button name="send" 
else {
?>

  <!DOCTYPE html>
  <html>

  <head>
    <title>Answer</title>
    <style>
      .redtext {
        color: red;
      }
    </style>
  </head>

  <body>
    <h1>Résultat Calcul Factoriel</h1>
    <hr>
    <?php

    //Load the content of an external file
    require_once "Professeurs.php";

    //Declarer les variables
    $fname = $_POST['prenom'];
    $lname = $_POST['nom'];
    $birthyear = $_POST['naissance'];
    $email = $_POST['courriel'];
    $phoneNumber = $_POST['telephone'];


    //Instantier des objets
    $professeurActuel = new Professeurs($fname, $lname, $birthyear, $email, $phoneNumber);

    //Afficher les sorties des méthodes
    $professeurActuel->profil();

    ?>

    <a href="<?php echo $_SERVER['SCRIPT_NAME']; ?>">Relancez le Script!</a>
  </body>

  </html>

<?php
}
?>