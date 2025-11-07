<?php
/**
 *exe12_1.php
 *EXERCISE 12 NUMBER 1
 *FORM & FORM HANDLING
 *Patrick Saint-Louis, 2023
*/
//A.A base class
class CountNumbers
{
    protected $numbers;

    //1.A "constructor" method that takes an array of integers as an argument and assigns it to a property named “$all_numbers”.
    public function __construct($setOfNumbers)
    {
        $this->numbers = $setOfNumbers;
    }

    //2.A method that calculates and returns the number of integers included in the array stored in the property. 
    protected function theCount(): int
    {
        return count($this->numbers);
    }

    //3.A method that identifies and returns the integer of the array stored in the property with the largest (maximum) value.   
    private function theMax(): float|int
    {
        return max($this->numbers);
    }

    //4.A method that identifies and returns the integer of the array stored in the property with the lowest (minimum) value. 
    private function theMin(): float|int
    {
        return min($this->numbers);
    }

    //5.A method that uses the property and previous methods to display the information they calculated.  
    protected function displayOutputs(): void
    {
        //Display this base class outputs
        echo "<p>Numbers entered: ";
        echo "<table><tr>";
        foreach ($this->numbers as $index) {
            echo "<td>$index</td>";
        }
        echo "</tr></table>";
        echo "</p>";
        echo "<p>Number of numbers: " . $this->theCount() . "</p>";
        echo "<p>Maximum number: " . $this->theMax() . "</p>";
        echo "<p>Minimum number: " . $this->theMin() . "</p>";
    }
}