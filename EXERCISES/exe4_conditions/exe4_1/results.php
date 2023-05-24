<?php
  /**
  *show-results.php
  *EXERCISE 3 NUMBER 1
  *FORM HANDLING RESULT
  *Patrick Saint-Louis, 2023
  */

  //Refer to the current session if it is already started
  session_start(); 
  //If a session does not start yet redirect to the homepage
  if (!(isset($_SESSION['name'])))  
      header('Location: index.php');
?>

<!DOCTYPE html>
<html>  
  <head>
    <title>Comparateur</title>
    <link rel="stylesheet" href="css/style.css">
  </head>
  <body>	
      <header class="layout-header">
          <h1>
            <span class="logo"> PHP </span>
            <span class="form"> Comparateur à 0</span>
            <span class="formhandling"> </span>
          </h1>
          <hr/>
      </header>

      <div class="container">			
          <h2>Résultats de la comparaison</h2>
          <?php 
              //Assign values to variables
              $digitNumber=$_SESSION['digitNumber'];
              $result=$_SESSION['result'];
              $user_number=$_SESSION['user_number'];

              //Display outputs 
              echo"<p>Vous avez entré le $digitNumber <b>$user_number</b>.</p>";
              echo"<p><b>$user_number</b> est un $digitNumber <b>$result</b> </p>";
          ?>
          <button class="backlink"><a href="index.php">ACCUEIL</a></button>
      </div>
      <footer class="layout-footer">
        <hr/>
        <p class="footer">&copy;<?php echo getdate()['year']; ?> All rights reserved.</p>
      </footer>
  </body>
</html>

<?php
  //Close the current session
  session_destroy(); 
?>