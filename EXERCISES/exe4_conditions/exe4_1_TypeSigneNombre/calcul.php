<?php
/**
*process-homepage.php
*EXERCISE 3 NUMBER 1
*FORM HANDLING
*Patrick Saint-Louis, 2023
*/

//If the form is submitted
if (isset($_POST['send'])) {
   
    //Start a new session
    session_start();

    //Assign to PHP variables data collected from the form   
    $user_number = $_POST["user_data"]; 

    //If data received is empty or include alphanumeric characters
    if ($user_number != 0 && empty($user_number) || preg_match("/[a-z]/", $user_number))
    {
        //Save data to share and display in $_SESSION 
        $_SESSION['erreur']="Erreur! Vous n'avez pas entré un nombre!";
        //Redirect to the form page to display the error and the form
        header('Location: index.php'); 
    }
    else
    {
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
        $_SESSION['digitNumber']=$digitNumber;
        $_SESSION['result']=$result;
        $_SESSION['user_number']=$user_number;

        //Redirect to the result page
        header('Location: resultat.php'); 
    } 
}
//If you try to access this file when the form is not submitted yet
//Redirect to the Home Page
else{
    //Redirect to the form page
    header('Location: index.php'); 
}
?>

