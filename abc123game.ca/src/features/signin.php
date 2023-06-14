<?php
/**
*
*
*
*/

//If the form is submitted
//Access the logic in this file
if (isset($_POST['sender'])) {

    //Load required files
    require_once "../../config.php";
    require_once "../../db/Database.php";
    require_once "../../db/Create.php";
    require_once "../../db/Select.php";
    require_once('../functions/connexion-functions.php');

    //Create the database structure
    $objCreation = new Create;

    //Messages
    //Error messages 
    $m['empty'] = "Username and/or Password cannot be empty.";   
    //Group messages by category 
    $msg['error'] = $m;

    //Create a session to save and share data via $_SESSION
    session_start();
    $_SESSION['identity']='newuser';

    //Collect the data submitted via the form
    $userUn=sanitizeInput($_POST['uname']);
    $userPc=sanitizeInput($_POST['pcode']);

    //Declare variables
    $arraySelected='';
    
    //If any of the data collected are empty
    if ($userUn==="" || $userPc===""){
        $_SESSION['errorMsg']=$msg['error']['empty'];
        $_SESSION['userUn']=$userUn;
        header('Location: ../../public/form/signin-form.php'); 
    }
    else{
        //If username is not valid (i.e. size, first character, all characters)
        if (($_SESSION['errorMsg']=validateUsername($userUn))!==""){
            $_SESSION['userUn']=$userUn;
            header('Location: ../../public/form/signin-form.php'); 
        }
        else{
            //If password is not valid (i.e. size)
            if (($_SESSION['errorMsg']=validatePasscode($userPc))!==""){
                $_SESSION['userUn']=$userUn;
                header('Location: ../../public/form/signin-form.php'); 
            } 
            else{      
                //If username does not exists in the DB
                if (($_SESSION['errorMsg']=findOrderByUsername($userUn))!==TRUE){
                    $_SESSION['userUn']=$userUn;
                    header('Location: ../../public/form/signin-form.php'); 
                }
                else{
                    //If passcode does not exist for this username in the DB
                    if (($_SESSION['errorMsg']=findCodeByOrder(findOneDataFromArray($arraySelected)))!==TRUE){
                        $_SESSION['userUn']=$userUn;  
                        header('Location: ../../public/form/signin-form.php');
                    }
                    else{
                        //If passcode is not identical with the one for this username in the DB
                        if (($_SESSION['errorMsg']=compareCode($userPc, findOneDataFromArray($arraySelected)))!==TRUE){
                            $_SESSION['userUn']=$userUn;
                            header('Location: ../../public/form/signin-form.php');
                        }
                        //If username and password are correct
                        else{
                            echo"WELCOME!!!";
                        }
                    }
                }
            }
        }
    }
}
//If the form is not submitted yet 
//Do not access the logic in this file but redirect to the Home Page
else{
    header('Location: ../../index.php'); 
}
?>