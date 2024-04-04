<?php
/**
*process-index.php
*FORM HANDLING-Form2
*Patrick Saint-Louis, 2023
*/

//Check whether the form is submitted or not
if (isset($_POST['send'])) {
    //Assign the data collected from the the input field form name="fname"  
    $firstName = $_POST["fname"]; 
    $lastName = $_POST["lname"]; 

    //Display the value collected from the form
    echo"<p>Value collected from the INPUT TYPE TEXT First Name : $firstName</p>";
    echo"<p>Value collected from the INPUT TYPE TEXT Last Name : $lastName</p>";
    echo"<p>Value collected from the INPUT TYPE SUBMIT First Name : " . $_POST['send'] . "<p>";
}
//If you try to access this file when the form is not submitted yet
//Redirect to the Home Page
else{
    //Redirect to the result page
    header('Location: index.html'); 
}
?>

