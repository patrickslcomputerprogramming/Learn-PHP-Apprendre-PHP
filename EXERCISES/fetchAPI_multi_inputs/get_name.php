<?php
//Check whether the fetch API request is received or not
if (isset($_POST["user_fname"]) || isset($_POST["user_lname"])){
    //Save the data received from the request
    $lastname=$_POST["user_lname"];
    $firstname=$_POST["user_fname"];

    //Calculate the message to submit as e response
    $fullname = ["Full Name: ", $firstname, $lastname];
    $message=["Message: ","Both firstname and lastname cannot be empty."];

    if ((strlen($firstname)>0) && (strlen($lastname)>0)) {
        if ((preg_match("/[A-Z]/", $firstname[0])) && (preg_match("/[A-Z]/", $lastname[0]))) 
        $message=$fullname;
    }

    //Send the response
    echo json_encode($message);
}