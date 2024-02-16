
class CheckIntegerSign {
    private $userInt;
    private $intSign;

    public function __construct($integer) {
        $this->userInt = $integer;
    }

    private function isPositiveNegativeOrNull() {
        if ($this->userInt === 0) {
            $this->intSign = 'Null';
        } elseif ($this->userInt > 0) {
            $this->intSign = 'Positive';
        } else {
            $this->intSign = 'Negative';
        }
    }

    public function displayInfo() {
        $this->isPositiveNegativeOrNull();
        echo "<p>Number entered: ".$this->userInt."</p>";
        echo "<p>Sign: ". $this->intSign."</p>";
    }

    public function __destruct() {
        unset($this->userInt);
        unset($this->intSign);
    }
}

// Create an object named currentInteger
// Assigns -1, 0, and 1 to the argument of the constructor method. 
$currentInteger1 = new CheckIntegerSign(-1); 
$currentInteger1->displayInfo();

$currentInteger2 = new CheckIntegerSign(0); 
$currentInteger2->displayInfo();

$currentInteger3 = new CheckIntegerSign(1); 
$currentInteger3->displayInfo();
