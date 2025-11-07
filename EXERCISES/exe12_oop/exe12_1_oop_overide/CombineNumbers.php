<?php
/**
 *exe12_1.php
 *EXERCISE 12 NUMBER 1
 *FORM & FORM HANDLING
 *Patrick Saint-Louis, 2023
*/

//B. A derived class of CountNumbers
class CombineNumbers extends CountNumbers
{
    //1.A "constructor" method that takes an array of integers as an argument and assigns it to its parent "constructor" method. 
    //It’s optional to create this method, because automatically in PHP a subclass inherits the constructor method of its base class. 
    public function __construct($all_numbers) { 
        parent::__construct(setOfNumbers: $all_numbers);
    } 

    //2.A method that calculates and returns the sum (result of an addition) of the integers included in the property created in the base class.  
    protected function theSum(): float|int
    {
        $sum = 0;
        foreach ($this->numbers as $index) {
            $sum = $sum + $index;
        }
        return $sum;
    }

    //3.A method that calculates and returns the product (result of a multiplication) of the integers included in the property created in the base class.  
    protected function theProduct(): float|int
    {
        return array_product($this->numbers);
    }

    //4.A method that calls the previous methods in order to display the information they have calculated.  
    protected function displayOutputs(): void
    {
        //Display its base class outputs CountNumbers::displayOutputs()
        parent::displayOutputs();
        //Display this subclass output
        echo "<p>Sum of numbers: " . $this->theSum() . "</p>";
        echo "<p>Product of numbers: " . $this->theProduct() . "</p>";
    }
}