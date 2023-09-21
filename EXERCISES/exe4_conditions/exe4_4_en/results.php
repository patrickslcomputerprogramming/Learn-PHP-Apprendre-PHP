<?php
  /**
  *show-results.php
  *EXERCISE 4 NUMBER 4
  *FORM HANDLING RESULT
  *Patrick Saint-Louis, 2023
  */

  //Refer to the current session if it is already started
  session_start(); 
  //If a session does not start yet redirect to the homepage
  if (!(isset($_SESSION['total'])))  
      header('Location: index.php');
?>

<!DOCTYPE html>
<html>  
  <head>
    <title>Calculateur</title>
    <link rel="stylesheet" href="css/style.css">
  </head>
  <body>	
      <header class="layout-header">
          <h1>
              <span class="logo"> PHP </span>
              <span class="form"> Purchase Calculator</span>
              <span class="formhandling"> </span>
          </h1>
          <hr/>
      </header>

      <div class="container">			
          <h2>Result</h2>
          <?php 
              //Display outputs 
              echo"<h2 class='outputs'>
                <span class='property'>Article : </span>" . 
                $_SESSION['article'] . 
              "</h2>";

              echo"<h2 class='outputs'>
                <span class='property'>Unit Price : </span>" . 
                $_SESSION['price'] . 
              ' $ca</h2>';

              echo"<h2 class='outputs'>
              <span class='property'>Quantity : </span>" . 
              $_SESSION['quantity'] . 
              " units</h2>";

              echo"<h2 class='outputs'>
              <span class='property'>Sub-total : </span>" . 
              $_SESSION['subtotal'] . 
              ' $ca</h2>';

              echo"<h2 class='outputs'>
              <span class='property'>TVQ : </span>" . 
              $_SESSION['tvq'] . 
              ' $ca</h2>';

              echo"<h2 class='outputs'>
              <span class='property'>TPS : </span>" . 
              $_SESSION['tps'] . 
              ' $ca</h2>';

              echo"<h2 class='outputs'>
              <span class='property'>Total : </span>" . 
              $_SESSION['total'] . 
              ' $ca</h2>';  
          ?>
          <button class="backlink"><a href="index.php">HOME</a></button>
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