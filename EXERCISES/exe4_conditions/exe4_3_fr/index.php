<?php
//exercise4a_3.php
//EXERCISE 4 NUMBER 3
//FORM & FORM HANDLING
//Patrick Saint-Louis, 2023
if (!isset($_POST['send'])) {
?>

<!DOCTYPE html>
<html>  
  <head>
    <title>Question</title>
  </head>
  <body>			
    <h1 class="bluetext">Entrez un nom de jour<br/>J'afficherai son numéro dans la semaine</h1>
    <hr>
    <!--Form--> 
    <form id="form1" method="post" action="<?php echo $_SERVER['SCRIPT_NAME']; ?>" > 
      <label>
        Nom de Jour (ex. Lundi, Mardi)<br />
        <input type="text" name="userWeekday" placeholder="" required="required"> 
      </label>		
      <input type="submit" name="send" value="SEND" />
    </form> 
  </body>
</html>

<?php
}

//Form Handling
//Go below only after a user pressed the input button name="send" 
else {
?>

  <!DOCTYPE html>
  <html>  
  <head>
    <title>Réponse</title>
  </head>
  <body>			
    <h1>Vous avez entré un nom de jour<br/>Voilà son numéro dans la semaine</h1>
    <hr>

<?php
    //Assign the data collected from the form to variable
    $user_input = $_POST["userWeekday"]; 
    echo"<p>Vous avez entré <b>$user_input</b>.</p>";
    //Convert to lowercase letters
    $user_input_lower=strtolower($user_input);
    //Identify the message to display using a switch 
    switch ($user_input_lower){
    	case 'lundi' :
        	echo "<p>C’est le <b>premier</b> jour de la semaine.</p><br />";
        	break;
    	case 'mardi':
        	echo "<p>C’est le <b>deuxième</b> jour de la semaine.</p><br />";
        	break;
    	case 'mercredi':
        	echo "<p>C’est le <b>troisième</b> jour de la semaine.</p><br />";
        	break;
        case 'jeudi' :
            echo "<p>C’est le <b>quatrième</b> jour de la semaine.</p><br />";
            break;
        case 'vendredi':
            echo "<p>C’est le <b>cinquième</b> jour de la semaine.</p><br />";
            break;
        case 'samedi':
            echo "<p>C’est le <b>sixième</b> jour de la semaine.</p><br />";
            break;
        case 'dimanche':
            echo "<p>C’est le <b>septième</b> jour de la semaine.</p><br />";
            break;
    	  default:
        	echo "<p>Ce n’est pas un jour de semaine.</p><br />";
	}
  
    
?>
  <a href="index.php">Essayez encore!</a>
  </body>
</html>

<?php
} 
?>












