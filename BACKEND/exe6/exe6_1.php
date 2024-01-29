<?php
//1-Declare variables and Assign values
//Input data for test
$randomNbr = rand(0,7);
if ($randomNbr > 0) {
    $possibleValues = [
        "TV cable",
        "Mobile phone",
        "Wired phone",
        "Cable Internet",
        "Fiber Internet",
        "Home Alarm",
        "Smart Home"
    ];
    for ($i = 0; $i < $randomNbr; ++$i)
        $userInput[] = $possibleValues[$i];
}

//2-Validate input data 
if (isset($userInput)) {
    echo "<ol>";
    //3-Calculate output data
    foreach ($userInput as $item) {
        //4-Display output data
        echo "<li>$item</li>";
    }
    echo "</ol>";
} else {
    //4-Display output data
    echo "<p>You forgot to select at least 1 service</p>";
}

