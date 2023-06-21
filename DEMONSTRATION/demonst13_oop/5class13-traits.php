<?php
/** 
*4-TRAITS
*/
//Create a trait
trait correct_messages { 
    //Create a Method
    public function messageOK() { 
        $crtMsg=array(
            "register"=>"You are sucessfully registered",
            "login"=>"You are sucessfully login",
            "logout"=>"You are sucessfully logout",
        );
        return $crtMsg; 
    } 
} 

//Create a trait
trait incorrect_messages { 
    //Create a Method
    public function messageNotOK() { 
        $inCrtMsg=array(
            "username"=>"You entered a wrong username",
            "password"=>"You entered a wrong password",
            "page"=>"You cannot access this page",
        );
        return $inCrtMsg; 
    } 
} 

//Create a Class
class Login {
    //Create a Method 
    use incorrect_messages; 
    public function displayOutputs(){
        echo "<p>".$this->messageNotOK()["username"]."</p>";
    }
} 

//Create a Class
class Logout { 
    use correct_messages, incorrect_messages; 
    //Create a Method 
    public function displayOutputs(){
        echo "<p>".$this->messageOK()["login"]."</p>";
        echo "<p>".$this->messageNotOK()["page"]."</p>";
    }
} 

//Instantiate Objects
$obj1 = new Login(); 
$obj2 = new Logout(); 

//Invoke Methods
$obj1->displayOutputs(); 
$obj2->displayOutputs();