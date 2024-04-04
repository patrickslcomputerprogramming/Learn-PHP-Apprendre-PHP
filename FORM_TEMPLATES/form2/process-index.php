<?php
/**
*process-index.php
*FORM HANDLING-Form2
*Patrick Saint-Louis, 2023
*/

//If the form is submitted
if (isset($_POST['send'])) {
    //Assign the data collected from the the input field form name="fname"  
    $firstName = $_POST["fname"]; 
    $lastName = $_POST["lname"]; 

    //Assign the error messages related to the input fields
    $emptyMsg="Cannot be empty!";
    $numberMsg="First letter cannot be 0-9!";

    //If the information collected via the form is correct 
    //Save them and redirect to the result page with the information
    if (!(empty($firstName) || 
    empty($lastName)  || 
    preg_match("/[^a-zA-Z]/", $firstName[0]) ||
    preg_match("/[^a-zA-Z]/", $lastName[0]))) {
         //Display the data saved in the php variables 
         echo"<h2><span class='display-name'>First Name | Prénom : </span>" . $firstName . "</h2>";
         echo"<h2><span class='display-name'>Last Name | Nom : </span>" . $lastName . "</h2>";
         echo'<h2 <span class="form">Welcome! </span> | <span class="formhandling">Bienvenue!</span></h2>';
         echo'<a href="index.html">HOME | ACCUEIL</a><br/>'; 
    }
    //If the information collected via the form is incorrect 
    //Save them and redirect to the home page with error messages
    else{
        if (empty($firstName) && empty($lastName)){
            echo "Firstname $emptyMsg <br/>";
            echo "Lastname $emptyMsg<br/>";
            echo'<a href="index.html">HOME | ACCUEIL</a>';
        }
        else if (preg_match("/[^a-zA-Z]/", $firstName[0]) && preg_match("/[^a-zA-Z]/", $lastName[0])){
            echo "Firstname $numberMsg<br/>";
            echo "Lastname $numberMsg<br/>";
            echo'<a href="index.html">HOME | ACCUEIL</a>';
        }
        else if (empty($firstName) && preg_match("/[^a-zA-Z]/", $lastName[0])){
            echo "Firstname $emptyMsg<br/>";
            echo "Lastname $numberMsg<br/>";
            echo'<a href="index.html">HOME | ACCUEIL</a>';
        }
        else if (preg_match("/[^a-zA-Z]/", $firstName[0]) && empty($lastName)){
            echo "Firstname $numberMsg<br/>";
            echo "Lastname $emptyMsg<br/>";
            echo'<a href="index.html">HOME | ACCUEIL</a>';    
        }
        else if (empty($firstName)){
            echo "Firstname $emptyMsg<br/>";
            echo'<a href="index.html">HOME | ACCUEIL</a>';
        }
        else if (empty($lastName)){
            echo "Lastname $emptyMsg<br/>";
            echo'<a href="index.html">HOME | ACCUEIL</a>';
        }    
        else if (preg_match("/[^a-zA-Z]/", $firstName[0])){
            echo "Firstname $numberMsg<br/>";
            echo'<a href="index.html">HOME | ACCUEIL</a>';
        }
        else if (preg_match("/[^a-zA-Z]/", $lastName[0])){
            echo "Lastname $numberMsg<br/>";
            echo'<a href="index.html">HOME | ACCUEIL</a>';
        }
    }  
}
//If you try to access this file when the form is not submitted yet
//Redirect to the Home Page
else{
    //Redirect to the result page
    header('Location: index.html'); 
}
?>

