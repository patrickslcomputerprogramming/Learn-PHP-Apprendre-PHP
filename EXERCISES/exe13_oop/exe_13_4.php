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
    public function __call($name, $arguments)
    {
        $output = 'Error found in the method name. Try again!';
        
        if ($name ==='sum')
            $output=array_sum($arguments);
        elseif ($name ==='product') 
            $output=array_product($arguments);
        elseif ($name ==='max') 
            $output = max($arguments);
        elseif ($name ==='min')
            $output= min($arguments);
        return $output;
    }
}

//Create an Object
$test1 = new Arithmetic;
//Invoke Methods
echo "1x2x3x4= ".$test1->product(1,2,3,4)."<br>";
echo "1+2+3+4= ".$test1->sum(1,2,3,4)."<br>";
echo "Max (1,2,3,4) = ".$test1->max(1,2,3,4)."<br>";
echo "Max (1,2,3,4) = ".$test1->MAX(1,2,3,4)."<br>";
