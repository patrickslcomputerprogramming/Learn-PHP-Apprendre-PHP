<?php
/**
 *exe12_1.php
 *EXERCISE 12 NUMBER 1
 *FORM & FORM HANDLING
 *Patrick Saint-Louis, 2023
*/
class CompareNumbers extends CombineNumbers
{

    private function theAverage()
    {
        return $this->theSum() / $this->theCount();
    }

    public function displayOutputs3(): void
    {
        echo "<p>Average of numbers: " . $this->theAverage() . "</p>";
    }

}