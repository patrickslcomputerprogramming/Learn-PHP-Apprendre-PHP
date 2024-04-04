<?php
/**
*process-homepage.php
*FORM HANDLING
*Patrick Saint-Louis, 2023
*/

//If the form is submitted
if (isset($_POST['send'])) {
    //Assign the data collected from the the input field form name="fname"  
    $firstName = $_POST["fname"]; 
    $lastName = $_POST["lname"]; 

    //Create a session to be able to save and share data via $_SESSION
    session_start();
    $_SESSION['user_fname']=$firstName;
    $_SESSION['user_lname']=$lastName;
    $_SESSION['error_firstname']='';
    $_SESSION['error_lastname']='';

    //Assign the error messages related to the input fields
    $emptyMsg="Cannot be empty!";
    $numberMsg="First letter cannot be 0-9!";

    //If the information collected via the form is correct 
    //Save them and redirect to the result page with the information
    if (!(empty($firstName) || 
    empty($lastName)  || 
    preg_match("/[^a-zA-Z]/", $firstName[0]) ||
    preg_match("/[^a-zA-Z]/", $lastName[0]))) {
        //Redirect to the result page
        header('Location: welcome.php');
    }
    //If the information collected via the form is incorrect 
    //Save them and redirect to the home page with error messages
    else{
        if (empty($firstName) && empty($lastName))
            $_SESSION['error_firstname']=$_SESSION['error_lastname']=$emptyMsg;
        else if (preg_match("/[^a-zA-Z]/", $firstName[0]) && preg_match("/[^a-zA-Z]/", $lastName[0]))
            $_SESSION['error_firstname']=$_SESSION['error_lastname']=$numberMsg;
        else if (empty($firstName) && preg_match("/[^a-zA-Z]/", $lastName[0])){
            $_SESSION['error_firstname']=$emptyMsg;
            $_SESSION['error_lastname']=$numberMsg;
        }
        else if (preg_match("/[^a-zA-Z]/", $firstName[0]) && empty($lastName)){
            $_SESSION['error_firstname']=$numberMsg;
            $_SESSION['error_lastname']=$emptyMsg;       
        }
        else if (empty($firstName))
            $_SESSION['error_firstname']=$emptyMsg;
        else if (empty($lastName))
            $_SESSION['error_lastname']=$emptyMsg;
        else if (preg_match("/[^a-zA-Z]/", $firstName[0]))
            $_SESSION['error_firstname']=$numberMsg; 
        else if (preg_match("/[^a-zA-Z]/", $lastName[0]))
            $_SESSION['error_lastname']=$numberMsg;
        
        //Redirect to the result page
        header('Location: index.php');
    }  
}
//If you try to access this file when the form is not submitted yet
//Redirect to the Home Page
else{
    //Redirect to the result page
    header('Location: index.php'); 
}
?>

