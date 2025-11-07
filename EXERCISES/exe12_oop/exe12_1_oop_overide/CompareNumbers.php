<?php
/**
 *exe12_1.php
 *EXERCISE 12 NUMBER 1
 *FORM & FORM HANDLING
 *Patrick Saint-Louis, 2023
*/

//C. A derived class of CombineNumbers
class CompareNumbers extends CombineNumbers
{
    //1.A "constructor" method that takes an array of integers as an argument and assigns it to its parent "constructor" method. 
    //It’s optional to create this method, because automatically in PHP a subclass inherits the constructor method of its base class. 
    public function __construct($multple_numbers) { 
        parent::__construct(all_numbers:$multple_numbers);
    } 

    /*
    2.A method that calculates and returns the average of the integers (sum of the numbers divided by the quantity of numbers) 
    included in the property created in the base class. To calculate the average, use the number of integers 
    calculated in CountNumbers and the sum of the integers calculated in CombineNumbers 
    (mean = sum of integers / number of integers). 
    */
    private function theAverage(): float|int
    {
        return $this->theSum() / $this->theCount();
    }

    //A method that calls the previous method in order to display the information it calculated.
    public function displayOutputs(): void
    {
        //Display its base class outputs CombineNumbers::displayOutputs()
        parent::displayOutputs();
        //Display this subclass output
        echo "<p>Average of numbers: " . $this->theAverage() . "</p>";
    }

}