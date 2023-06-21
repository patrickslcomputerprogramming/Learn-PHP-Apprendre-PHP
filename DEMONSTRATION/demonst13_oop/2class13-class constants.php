<?php
/** 
 *2-CLASS CONSTANTS
*/

//Create a Class
class User
{
    //Create Properties and Constant and Assign values
    public $name, $password;
    public const WELCOME_MSG = "Welcome to your App!";

    //Create a Method
    public final function display(){
        echo "<p>".self::WELCOME_MSG."</p>";
        echo "<p>Name: " . $this->name . "</p>";
        echo "<p>Pass: " . $this->password . "</p>";
    }
}


echo User::WELCOME_MSG;

echo"<p>Objet: objectUser  Class: User</p>"; 
//Object of the class User
$objectUser = new User;
$objectUser->name = "Dave";
$objectUser->password = "thepass";
$objectUser->display();



