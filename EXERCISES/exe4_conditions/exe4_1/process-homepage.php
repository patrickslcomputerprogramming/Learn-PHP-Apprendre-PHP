<?php
/**
*process-homepage.php
*EXERCISE 3 NUMBER 1
*FORM HANDLING
*Patrick Saint-Louis, 2023
*/

//If the form is submitted
if (isset($_POST['send'])) {
   
    //Assign to PHP variables data collected from the form   
    $user_number = $_POST["user_data"]; 

    //Identify digit or number
    if ($user_number>-10 && $user_number<10)
        $digitNumber='chiffre';
    else
        $digitNumber='nombre';

    //Identify positive, negative, or null
    if ($user_number>0)
        $result="Positif";
    elseif ($user_number==0)
        $result="Nul";
    else
        $result="Négatif";

    //Save data to share and display in $_SESSION
    session_start();
    $_SESSION['name']="exercice3_1";
    $_SESSION['digitNumber']=$digitNumber;
    $_SESSION['result']=$result;
    $_SESSION['user_number']=$user_number;

    //Redirect to the result page
    header('Location: results.php');  
}
//If you try to access this file when the form is not submitted yet
//Redirect to the Home Page
else{
    //Redirect to the result page
    header('Location: index.php'); 
}
?>

