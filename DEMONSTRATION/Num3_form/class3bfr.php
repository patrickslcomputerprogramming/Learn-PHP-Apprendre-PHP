<!--class3bfr.php-->
<!DOCTYPE html>
<html>  
  <head>
    <title>Formulaire intégré HTML avec echo et \</title>
    <style>
      .form{color:blue;}
      .formhandling{color:red;}
      .display-name{color:green;}
    </style>
  </head>
  <body>
    <?php					
      echo "<h1>Formulaire intégré HTML avec echo et \</h1>";
      echo "<h2>Afficher le<span class=\"form\">Formulaire</span> et <span class=\"formhandling\">Gestion entr&eacute;e de formulaire</span> dans la meme page</h2>";
      echo "<hr>";
      echo "<h3>Entrez votre nom, je vais l&apos;afficher</h3>";
      //Form 
      echo "<form id=\"form1\" method=\"post\" action=\"class3bfr\" >"; //Beginning form tag
          // Form fields to input data
          echo "<label for=\"inputfname\">Entrez votre pr&eacute;nom</label>"; 
          echo "<br />";
          echo "<input id=\"inputfname\" type=\"text\" name=\"fname\" placeholder=\"votre pr&eacute;nom\" required=\"required\">"; 
          echo "<br />";
          echo "<label for=\"inputlname\">Entrez votre nom de famille</label>"; 
          echo "<br />";
          echo "<input id=\"inputlname\" type=\"text\" name=\"lname\" placeholder=\"votre nom\" required=\"required\">"; 
          echo "<br />";
          // Submit button to send form data		
          echo "<input id=\"submitbutton1\" type=\"submit\" name=\"send\" value=\"SEND IT\" />"; 
      echo "</form>"; //Closing form tag
      //Form Handling
      //Go below only after a user pressed the input button name="send" 
      if (isset($_POST['send'])) {
        //Assign to the php variable $firstname the data collected from the the input field form name="fname"  
        $firstName = $_POST["fname"]; 
        //Assign to the php variable $firstname the data collected from the the input field form name="lname"
        $lastName = $_POST["lname"]; // index to find the values submitted in the input field form name="quantity"
        //Display the data saved in the php variables 
        echo"<h2 class=\"display-name\">Votre nom est : $firstName $lastName.</h2>";
        echo"<h2 class=\"display-name\">F&eacute;licitations, il est beau!</h2>";    
      }
    ?>
  </body>
</html>












