<?php
//Create a base Class
class User
{
    //Create Properties
    private $name, $password;

    //Create a constructor method 
    public function __construct($name, $password){
        $this->name = $name; 
        $this->password = $password;
    }

    //Create a Method
    protected function display()
    {
        echo "<p>Name: " . $this->name . "</p>";
        echo "<p>Pass: " . $this->password . "</p>";
    }
}

//Create a derived class (a subclass or an inherited Class)
class Subscriber extends User
{
    //Create Properties
    private $phone=null, $email=null;

    //Create a constructor method 
    public function __construct($name, $password, $phone, $email){
        $this->phone = $phone;
        $this->email = $email; 
        parent::__construct($name, $password);
    }

    //Create a Method
    public function display()
    {
	    parent::display();
        echo "<p>Phone: " . $this->phone . "</p>";
        echo "<p>Email: " . $this->email."</p>";
    }
}

//create an object of the subclass
$name="Jon Doe";
$password="XScha$36sl";
$phone='514-999-9999'; 
$email='jd@jd.com';

$oneSubscriber=new Subscriber($name, $password, $phone, $email);

//Call (instantiate) a method with the object created
var_dump($oneSubscriber->display());
