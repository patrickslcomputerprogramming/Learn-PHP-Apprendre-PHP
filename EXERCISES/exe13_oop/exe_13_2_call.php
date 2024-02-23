<?php
/**
 *exe13_2_call_oop.php
 *EXERCISE 13 NUMBER 2
 *SCRIPT
 *Patrick Saint-Louis, 2023
*/


//__call() SPECIAL METHODS
class Arithmetic
{
    private $x, $y, $z;
    public function __construct($x, $y, $z)
    {
        $this->x = $x;
        $this->y = $y;
        $this->z = $z;
    }
    public function product()
    {
        return "$this->x x $this->y x $this->z = ".$this->x * $this->y * $this->z;
    }
    public function __call($name, $arguments)
    {
        return "<p>A Method with name: '$name' does not exist yet!</p>";
    }
}

//Create an Object
$test1 = new Arithmetic(1,2,3);
//Invoke Methods
echo $test1->product();
echo $test1->sum();


