<?php
/**
*index.php
*FORM 
*Patrick Saint-Louis, 2025
*/

//If session already start refer to the current session
session_start();


?>

<!DOCTYPE html>
<html>  
  <head>
    <title>Comparateur</title>
    <link rel="stylesheet" href="css/style.css">
    <script src='js/vendor/jquery-3.6.4.js'></script>
    <script src='js/main.js'></script>
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
        <!--Error Message-->
        <?php
            //Afficher le message d'erreur
            if (isset($_SESSION['erreur'])){
                echo "<strong><p style = 'color: red'>" . $_SESSION['erreur'] . "</strong></p>";
            }
        ?>		
        <!--Form--> 
        <form id="form1" method="post" action="calcul.php" > 
            <fieldset>
                <legend>Comparateur</legend>
                <h2 class="restrictions">Saisissez un : </h2>
                
                <!--Form fields to input data-->
                <label for="input1">Chiffre ou Nombre</label> 
                <input id="input1" type="number" name="user_data" required/>

                <!--Submit button to send form data-->		
                <input id="submitbutton1" type="submit" name="send" value="ENVOYER" />
            </fieldset>
        </form> 
    </div>
    
    <footer class="layout-footer">
        <hr/>
        <p class="footer">&copy;<?php echo getdate()['year']; ?> All rights reserved.</p>
    </footer>

    <script>
        inputbackground();
    </script>

  </body>
</html>












