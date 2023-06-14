<?php

//Function for sanitization of inputs
function sanitizeInput($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}

//Function for validation of username
function validateUsername($username) {
  if (strlen($username) < 8)
    return "Username must include at least 8 characters.";
  elseif (preg_match("/[^a-zA-Z]/", $username[0]))
    return "Username must start with a-z or A-Z.";
  elseif (preg_match("/[^a-zA-Z0-9]/", $username))
    return "Username must include only a-z, A-Z, and 0-9.";
  else
    return "";
}

//Function for validation of password
function validatePasscode($passcode) {
    if (strlen($passcode) < 8)
      return "Password must include at least 8 characters.";
    else
      return "";
}

//Function for 1 Registration Order selection by Username (return an array)
function findOrderByUsername($username) {
    //Declare global variables
    global $arraySelected;
    //Select registration order using username
    $obj = new Select('selectKey', $un=$username, $ro='');
    $registrationOrder=$obj->selectFromTAB();
    if ($registrationOrder===NULL)
        return "This username doesn't exist.";
    else {
        $arraySelected = $registrationOrder;
        return TRUE;   
    }  
}

//Function for 1 Password selection by Registration Order (return an array)
function findCodeByOrder($registrationOrder) {
    //Declare global variables
    global $arraySelected;
    //Select pass code using registration order
    $obj = new Select('selectCode', $un="", $ro="$registrationOrder");
    $code=$obj->selectFromTAB();
    if ($code===NULL)
        return "This username doesn't exist2.";
    else {
        $arraySelected = $code; 
        return TRUE;
    }
}

//Function for 1 database element extration (return 1 element) 
function findOneDataFromArray($array) {
    foreach($array as $section => $items)
    foreach($items as $key => $value)
        $oneData=$value;
    return $oneData;
}

//Function for Hash string to Clear string conversion
function compareCode($clearCode, $hashCode){
    global $dbRo;
    if (password_verify($clearCode, $hashCode)===TRUE)
        return "";
    else
        return "Incorrect Password. <a href='../../public/form/pw-update-form'>Forgot Password?</a>"; 
}
