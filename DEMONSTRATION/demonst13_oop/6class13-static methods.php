<?php
/**
 * 6-STATIC METHODS
*/


//Create a Class
class Messages { 
    //Create a Method
    public static function all_messages() { 
        $msg=array(
            "welcome"=>"Bon matin! Welcome!",
            "register"=>"You are sucessfully registered",
            "login"=>"You are sucessfully login",
            "logout"=>"You are sucessfully logout",
            "username"=>"You entered a wrong username",
            "password"=>"You entered a wrong password",
            "page"=>"You cannot access this page",
            "input"=>"Your form input cannot be empty",
        );
        return $msg; 
    } 

    //Create a Constructor Method
    public function __construct() { 
        echo "<p>". self::all_messages()["welcome"] ."</p>";
    }
} 

//Create a Class
class Login {
    //Create a Method 
    public function displayOutputs(){
        echo "<p>".Messages::all_messages()["username"]."</p>";
        echo "<p>".Messages::all_messages()["page"]."</p>";
    }
} 

//Create a Class
class Alert extends Messages {
    //Create a Method 
    public function displayOutputs(){
        echo "<p>".parent::all_messages()["username"]." in the login form</p>";
    }
} 

$userInput=1;

if ($userInput==''){
    Messages::all_messages()["input"];
}
else{
    //Instantiate Objects
    $obj1 = new Messages; 
    $obj2 = new Login; 
    $obj3 = new Alert;
    //Invoke Methods
    $obj2->displayOutputs(); 
    $obj3->displayOutputs(); 
}