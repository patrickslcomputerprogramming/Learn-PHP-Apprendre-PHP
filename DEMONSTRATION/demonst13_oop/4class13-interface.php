<?php
// create a parent Class 
interface Template {    
    public function message() : array; 
    public function displayOutputs(): void;
    
} 

// Create child Classes 
class Sum implements Template { 

    protected $setOfNumbers, $sum;

    public function __construct($nbr) { 
        $this->setOfNumbers = $nbr; 
    } 

    protected function getSum(): void{
        $this->sum = array_sum($this->setOfNumbers);
    }
    
    public function message(): array { 
        return array('sum'=>"The sum of the numbers is equal to: "); 
    } 

    public function displayOutputs(): void{
        $this->getSum();
        echo "<p>".$this->message()['sum'].$this->sum."</p>";
    }

}

// Create child Classes 
class Product implements Template { 

    protected $setOfNumbers, $product;

    public function __construct($nbr) { 
        $this->setOfNumbers = $nbr; 
    } 

    private function getProduct(): void{
        $this->product = array_product($this->setOfNumbers);
    }
    
    public function message(): array { 
        return array('product'=>"The product of the numbers is equal to: "); 
    } 

    public function displayOutputs(): void{
        $this->getProduct();
        echo "<p>".$this->message()['product'].$this->product."</p>";
    }

}

// Create child Classes 
class Average extends Sum implements Template {
    public $average;
    public function message(): array { 
        return array('average'=>"The average of the numbers is equal to: "); 
    } 

    private function getAverage(): void{
        $this->getSum();
        $this->average = $this->sum / count($this->setOfNumbers);
    }

    public function displayOutputs(): void{
        $this->getAverage();
        echo "<p>".$this->message()['average'].$this->average."</p>";
    }

}

// Instantiate objects 
$currentUserSum= new Sum(array(1,2,3,4,5));
$currentUserProduct= new Product(array(1,2,3,4,5));
$currentUserAverage= new Average(array(1,2,3,4,5));

// Invoke methods
$currentUserSum->displayOutputs();
$currentUserProduct->displayOutputs();
$currentUserAverage->displayOutputs();