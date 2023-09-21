<?php
/**
*process-homepage.php
*EXERCISE 4 NUMBER 2 min
*FORM HANDLING
*Patrick Saint-Louis, 2023
*/

//If the form is submitted
if (isset($_POST['send'])) {
?>
 
<!DOCTYPE html>
<html>  
  <head>
    <meta charset="UTF-8">
    <title>Calculateur</title>
  </head>
  <body>		

    <?php       
        //Assign to PHP variables data collected from the form   
        $nbr1 = $_POST["num1"]; 
        $nbr2 = $_POST["num2"];
    
        //Conditionnal and calculations
        echo ($nbr1!=$nbr2) ? 
            "<h1>The gap between $nbr1 and $nbr2 is ".abs($nbr1-$nbr2)."</h1>" : 
            "<h1>ERROR! $nbr1 and $nbr2 are the same number. There's no gap between them.</h1>";
        
        //Back hyperlink
        echo '<button class="backlink"><a href="index.html">HOME</a></button>';
    ?>

    </body>
</html>

<?php 
} 
//If you try to access this file when the form is not submitted yet
//Redirect to the Home Page
else{
    //Redirect to the result page
    header('Location: index.php'); 
}
?>

