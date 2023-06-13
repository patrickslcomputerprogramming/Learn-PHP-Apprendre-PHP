<?php
/**
 *exe8_3.php
 *EXERCISE 8 NUMBER 3
 *FORM & FORM HANDLING
 *Patrick Saint-Louis, 2023
*/
if (!isset($_POST['send'])) {
?>

<!DOCTYPE html>
<html>  
  <head>
    <title>Question</title>
    <style>
      .bluetext{color:blue;}
    </style>
  </head>
  <body>			
    <h1>Factorial Calculation</h1>
    <hr>
    <!--Form--> 
    <form id="form1" method="post" action="<?php echo $_SERVER['SCRIPT_NAME']; ?>" > 
      <!--Form fields to input data-->
      <label for="input1">Enter a positive number</label> 
      <input id="input2" type="number" name="userNbr" size="5" required="required"> 
      <input id="submitbutton1" type="submit" name="send" value="SEND" />
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
    <title>Answer</title>
    <style>
      .redtext{color:red;}
    </style>
  </head>
  <body>			
    <h1>Factorial Calculation Result</h1>
    <hr>

<?php
    //Assign the data collected from the form to variables
    $userInput = $_POST["userNbr"]; 
    
    //Create recursive function with ? statement to calculate factorial 
    function factorial($a)
    {
        return ($a == 1 || $a == 0) ? 1 : $a * factorial($a - 1);
    }
    
    //Create messages
    $messages=array(
            'err'=>'Please, enter a positive number, greater or equal to 0',
            'result'=>"Factorial of $userInput is: "
            );
    
    //Check with conditionals and call functions to display outputs
    if ($userInput>=0){
        echo "<p>". $messages['result'] . factorial($userInput) . "</p>";
    }else{
        echo '<p class="redtext">'. $messages['err'] . '</p>';
    } 
?>

    <a href="<?php echo $_SERVER['SCRIPT_NAME']; ?>">Try again!</a>
  </body>
</html>

<?php
} 
?>












