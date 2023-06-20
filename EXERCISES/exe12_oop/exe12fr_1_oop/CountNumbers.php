<?php
/**
 *exe12_1.php
 *EXERCISE 12 NUMBER 1
 *FORM & FORM HANDLING
 *Patrick Saint-Louis, 2023
*/
class CountNumbers
{
    protected $numbers;

    public function __construct($setOfNumbers)
    {
        $this->numbers = $setOfNumbers;
    }
    protected function theCount()
    {
        return count($this->numbers);
    }

    protected function theMax()
    {
        return max($this->numbers);
    }

    protected function theMin()
    {
        return min($this->numbers);
    }

    public function displayOutputs1()
    {
        echo "<p>Nombres entrés: ";
        echo "<table><tr>";
        foreach ($this->numbers as $index) {
            echo "<td>$index</td>";
        }
        echo "</tr></table>";
        echo "</p>";
        echo "<p>Nombre de nombres: " . $this->theCount() . "</p>";
        echo "<p>Nombre Maximum: " . $this->theMax() . "</p>";
        echo "<p>Nombre Minimum: " . $this->theMin() . "</p>";
    }

}