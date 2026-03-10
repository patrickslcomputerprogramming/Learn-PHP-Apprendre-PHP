<?php

/**
 *
 *LAB 11 MySQL avec MySQLi ou PDO 
 *Patrick Saint-Louis, 2026
*/
?>
<!DOCTYPE html>
<html>

<head>
  <title>Question</title>
  <link rel="stylesheet" href="style.css">
</head>

<body>
  <div class="container">
    <h1 class="blueText">Formulaire d'inscription</h1>
    <hr>
    <!--Formulaire-->
    <form id="form1" method="post" action="controller.php">
      <table>
        <tr>
          <th><label for=input1>Prénom</label></th>
          <td><input id=input1 type="text" name="prenom" required="required"></td>
        </tr>
        <tr>
          <th><label for=input2>Nom</label></th>
          <td><input id=input2 type="text" name="nom" required="required"></td>
        </tr>
        <tr>
          <th><label for=input4>Courriel</label></th>
          <td><input id=input4 type="email" name="courriel" required="required"></td>
        </tr>
        <tr class="submit">
          <td></td>
          <td><input id="submit1" type="submit" name="envoyer" value="S'INSCRIRE" /></td>
        </tr>
      </table>
    </form>
  </div>
</body>

</html>