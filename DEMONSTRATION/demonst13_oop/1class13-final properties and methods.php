<?php
/**
 * 1-FINAL METHODS AND CLASSES 
 * TO PREVENT PARENT CLASSES METHODS TO BE OVERRIDEN BY CHILD CLASSES 
 * AND PREVENT A CLASS TO BECOME A PARENT CLASS 
*/

/*
//Final Method
//Create a Class
class User
{
    //Create Properties
    public $name="AAA";
    public $password="BBB";

    //Create a Method
    public final function display()
    {
        echo "<p>Name: " . $this->name . "</p>";
        echo "<p>Pass: " . $this->password . "</p>";
    }
}

//Create an inherited Class
class Subscriber extends User
{
    //Create Properties
    public $phone="BBB"; 
    public $email = "DDD";

    //Create a Method
    public function display2()
    {
        echo "<p>Name: " . $this->name . "</p>";
        echo "<p>Pass: " . $this->password . "</p>";
        echo "<p>Phone: " . $this->phone . "</p>";
        echo "<p>Email: " . $this->email."</p>";
    }
}

$obj1=new User();
$obj2=new Subscriber();
echo"<p>".$obj1->display()."<p>";
echo"<p>".$obj2->display()."<p>";
*/

//Final class
final class User
{
    //Create Properties
    public $name, $password;

    //Create a Method
    public final function display(){
        echo "<p>Name: " . $this->name . "</p>";
        echo "<p>Pass: " . $this->password . "</p>";
    }
}

class Subscriber extends User
{
    //Create Properties
    public $phone="BBB"; 
    public $email = "DDD";

    //Create a Method
    public function display2()
    {
        echo "<p>Name: " . $this->name . "</p>";
        echo "<p>Pass: " . $this->password . "</p>";
        echo "<p>Phone: " . $this->phone . "</p>";
        echo "<p>Email: " . $this->email."</p>";
    }
}