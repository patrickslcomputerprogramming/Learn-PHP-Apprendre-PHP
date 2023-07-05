<?php
/**
 *demonstration exercise14.php
 *Insert and Select data from MySQL using MySQLi
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
    <h1 class="blueText">Formulaire d'Enregistrement</h1>
    <hr>
    <!--Form-->
    <form id="form1" method="post" action="main.php">
      <table>
        <tr>
          <th><label for=input1>Prénom</label></th>
          <td><input id=input1 type="text" name="fname" required="required"></td>
        </tr>
        <tr>
          <th><label for=input2>Nom</label></th>
          <td><input id=input2 type="text" name="lname" required="required"></td>
        </tr>
        <tr>
          <th><label for=input4>Email</label></th>
          <td><input id=input4 type="email" name="email" required="required"></td>
        </tr>
        <tr class="submit">
          <td></td>
          <td><input id="submit1" type="submit" name="send" value="ENVOYER" /></td>
        </tr>
      </table>
    </form>
  </div>
</body>

</html>
