<?php
/**
*process-index.php
*FORM HANDLING-Form4
*Patrick Saint-Louis, 2024
*/

//<input id="i2" type="submit" name="form-sender" value="SEND" />
//If the form is submitted by clicking the input of type submit
//The data save for this input will be set and not NULL
//Check this with isset() 
if (isset($_POST['form-sender'])) {
    //If the system goes there the data save for the input of type submit is set and not NULL
    //Retrieve and assign the data collected from the input of type text 
    //<input id="i1" type="text" name="user-identity"/>  
    $fullName = $_POST["user-identity"]; 
    
    //Display the data retrieved
    echo "<p>".$fullName."</p>";

    //Show a link to come back to the form
    echo'<p><a href="index.html">BACK TO THE FORM</a></p>';
}

