<?php
/**
*index.php
*EXERCISE 4 NUMBER 4
*FORM 
*Patrick Saint-Louis, 2023
*/

destroy_session();
function destroy_session(){
    //Refer to the current session if it is already started
    session_start();
    //Close the current session
    session_destroy();
    //Redirect to the home page like for the first time
    header('Location: index.php');
}