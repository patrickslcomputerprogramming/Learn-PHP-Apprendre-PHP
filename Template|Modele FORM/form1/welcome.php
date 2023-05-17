<?php
/**
*welcome.php
*FORM HANDLING RESULT
*Patrick Saint-Louis, 2023
*/

//Refer to the current session if it is already started
session_start(); 
//If a session does not start yet redirect to the homepage
if (!(isset($_SESSION['user_fname'])))  
    header('Location: index.php');
?>

<!DOCTYPE html>
<html>  
  <head>
    <title>HTML Form and PHP Form Handling</title>
    <link rel="stylesheet" href="css/style.css">
  </head>
  <body>	
      <header class="layout-header">
          <h2>
              <span class="logo"> PHP </span>
              <span class="form"> Form Template</span>
              <span class="formhandling"> Modele de Form</span>
          </h2>
          <hr/>
      </header>

      <div class="container">			
          <h3>Results | Résultats</h3>
          <?php
              //Display the data saved in the php variables 
              echo"<h2><span class='display-name'>First Name | Prénom : </span>" . $_SESSION['user_fname'] . "</h2>";
              echo"<h2><span class='display-name'>Last Name | Nom : </span>" . $_SESSION['user_lname'] . "</h2>";
              echo'<h2 <span class="form">Welcome! </span> | <span class="formhandling">Bienvenue!</span></h2>';    
          ?>
          <button class="backlink"><a href="index.php">HOME | ACCUEIL</a></button>
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