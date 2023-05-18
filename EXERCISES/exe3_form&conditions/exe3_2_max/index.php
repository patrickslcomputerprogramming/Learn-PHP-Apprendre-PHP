<?php
/**
*index.php
*EXERCISE 2 NUMBER 2
*FORM 
*Patrick Saint-Louis, 2023
*/

//Refer to the current session if it is already started
session_start(); 

?>

<!DOCTYPE html>
<html>  
  <head>
    <title>Calculateur</title>
    <link rel="stylesheet" href="css/style.css">
    <script src='js/vendor/jquery-3.6.4.js'></script>
    <script src='js/main.js'></script>
  </head>
  <body>

    <header class="layout-header">
        <h1>
            <span class="logo"> PHP </span>
            <span class="form"> Calculateur d'Achat</span>
            <span class="formhandling"> </span>
        </h1>
        <hr/>
    </header>
    
    <div class="container">			
        <!--Form--> 
        <form id="form1" method="post" action="process-homepage.php" > 
            <fieldset>
                <legend>Calculateur d'Achat</legend>
                <h2 class="restrictions">Remplissez tous les champs</h2>
                
                <!--Form fields to input data-->
                <label for="article">Article</label> 
                <input id="article" type="text" name="article_name" placeholder="Pomme"
                    value="<?php echo isset($_SESSION['article']) ? $_SESSION['article'] : ''; ?>" />
                <!--Error message --> 
                <input id="error" type="text" readonly disabled 
                    value="<?php echo isset($_SESSION['err_article']) ? $_SESSION['err_article'] : ''; ?>" /> 
                
                <label for="price">Prix Unitaire</label>
                <input id="price" type="number" min="0.01" step="0.01" name="unit_price" placeholder="0-9"
                    value="<?php echo isset($_SESSION['price']) ? $_SESSION['price'] : ''; ?>" /> 
                <!--Error message -->
                <input id="error" type="text" readonly disabled 
                    value="<?php echo isset($_SESSION['err_price']) ? $_SESSION['err_price'] : ''; ?>" />
                
                <label for="quantity">Quantité</label>
                <input id="quantity" type="number" min="0.01" step="0.01" name="article_quantity" placeholder="0-9"
                    value="<?php echo isset($_SESSION['quantity']) ? $_SESSION['quantity'] : ''; ?>" /> 
                <!--Error message -->
                <input id="error" type="text" readonly disabled 
                    value="<?php echo isset($_SESSION['err_quantity']) ? $_SESSION['err_quantity'] : ''; ?>" />

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












