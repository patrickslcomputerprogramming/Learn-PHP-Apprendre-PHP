<?php

/**
 *exe6_1fr.php
 *EXERCISE 6 NUMBER 1
 *FORM & FORM HANDLING
 *Patrick Saint-Louis, 2023
 */

//Form : Go below when the form is not submitted yet 
if (!(isset($_POST['sub']))) {
?>

   <!DOCTYPE html>
   <html>

   <head>
      <title>Question</title>
      <link rel="stylesheet" href="style.css">
   </head>

   <body>
      <div class="container">
      <h1 class="bluetext">Formulaire de Commande</h1>
         <form action="<?php echo $_SERVER['SCRIPT_NAME']; ?>" method="post">  
            <table border="1">
               <tr>
                  <td colspan="2">Selectionnez vos Services:</td>
               </tr>
               <tr>
                  <td><label for="i1">TV cable<label></td>
                  <td><input id="i1" type="checkbox" name="techno[]" value="TV cable"></td>
               </tr>
               <tr>
                  <td>Mobile phone</td>
                  <td><input type="checkbox" name="techno[]" value="Mobile phone"></td>
               </tr>
               <tr>
                  <td>Wired phone</td>
                  <td><input type="checkbox" name="techno[]" value="Wired phone"></td>
               </tr>
               <tr>
                  <td>Cable Internet</td>
                  <td><input type="checkbox" name="techno[]" value="Cable Internet"></td>
               </tr>
               <tr>
                  <td>Fiber Internet</td>
                  <td><input type="checkbox" name="techno[]" value="Fiber Internet"></td>
               </tr>
               <tr>
                  <td>Home Alarm</td>
                  <td><input type="checkbox" name="techno[]" value="Home Alarm"></td>
               </tr>
               <tr>
                  <td>Smart Home</td>
                  <td><input type="checkbox" name="techno[]" value="Smart Home"></td>
               </tr>
               <tr>
                  <td colspan="2" align="center"><input type="submit" value="SEND" name="sub"></td>
               </tr>
            </table>
      </form>
      </div>
   </body>

   </html>

<?php
}
//Form Handling: Go below only when the form is submitted
else {
?>
   <!DOCTYPE html>
   <html>

   <head>
      <title>Answer</title>
      <link rel="stylesheet" href="style.css">
   </head>

   <body>
      <div class="container">
         <h1 class="redtext">Vous avez selectionné les services suivants:</h1>
         <hr>
         <?php

         if (isset($_POST['techno'])) {
            $checkboxList = $_POST['techno'];

            echo "<ol>";
            foreach ($checkboxList as $item) {
               echo "<li>$item</li>";
            }
            echo "</ol>";
         } else {
            echo "<p>Aucune selection! Sélectionnez au moins 1 service</p>";
         }
         ?>

         <a href="<?php echo $_SERVER['SCRIPT_NAME']; ?>">Essayez encore!</a>
      </div>
   </body>

   </html>
<?php
}

?>