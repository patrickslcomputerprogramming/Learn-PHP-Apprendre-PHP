<?php
/**
*index.php
*FORM 
*Patrick Saint-Louis, 2023
*/

//Refer to the current session if it is already started
session_start(); 

?>

<!DOCTYPE html>
<html>  
  <head>
    <title>PHP Form Template</title>
    <link rel="stylesheet" href="css/style.css">
    <script src='js/vendor/jquery-3.6.4.js'></script>
    <script src='js/main.js'></script>
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
        <!--Form--> 
        <form id="form1" method="post" action="process-homepage.php" > 
            <fieldset>
                <legend>Fill-in the fields | Remplissez les champs</legend>
                <p class="restrictions">*: cannot be not empty | ne peut être vide - starts with A-Z | commence par A-Z</p>
                <!--Form fields to input data-->
                <label for="inputfname">*First Name | Prénom</label> 
                <input id="inputfname" type="text" name="fname" placeholder="John" 
                    value="<?php echo isset($_SESSION['user_fname']) ? $_SESSION['user_fname'] : ''; ?>" />
                <!--Error message for first name or nothing (null) when there's no error-->
                <input id="error" type="text" readonly disabled 
                    value="<?php echo isset($_SESSION['user_fname']) ? $_SESSION['error_firstname'] : ''; ?>" /> 
                <label for="inputlname">*Last Name | Nom</label>
                <input id="inputlname" type="text" name="lname" placeholder="Doe"
                    value="<?php echo isset($_SESSION['user_lname']) ? $_SESSION['user_lname'] : ''; ?>" /> 
                <!--Error message for first name or nothing (null) when there's no error-->
                <input id="error" type="text" readonly disabled 
                    value="<?php echo isset($_SESSION['user_lname']) ? $_SESSION['error_lastname'] : ''; ?>" />
                <!--Submit button to send form data-->		
                <input id="submitbutton1" type="submit" name="send" value="SEND | ENVOYER" />
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












