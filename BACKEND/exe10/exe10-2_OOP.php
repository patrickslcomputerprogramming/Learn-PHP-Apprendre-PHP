<?php

//Create a class to calculate the current date and time
class GetCurrentDateTime {
    //Declare private properties
    private $userContinent;
    private $userCity;
    private $correctTimezone;
    private $wrongTimezone;

    //Constructor method that initializes the arguments
    public function __construct($continent = 'America', $city = 'Montreal') {
        $this->userContinent = $continent;
        $this->userCity = $city;
    }

    //Declare a private method that checks if the timezone is valid
    private function isTimezone() {
        $timezone = $this->userContinent."/".$this->userCity;        
        if (in_array($timezone, timezone_identifiers_list())) 
            $this->correctTimezone = $timezone;
        else
            $this->wrongTimezone = $timezone;
    }

    //Declare a private method that calculates the current date and time
    private function setDateTime() {
        //Set the default timezone
        date_default_timezone_set($this->correctTimezone);
        //Calculate the current date and time
        $currentDateTime = new DateTime();
        return $currentDateTime->format("l F d, Y - H:i:s");
    }

    //Declare a public method that displays the date and time
    public function displayDateTime() {
        $this->isTimezone();
        if ($this->correctTimezone) {
            echo "<p>";
            echo "Current date and time in ".$this->correctTimezone.": ";
            echo $this->setDateTime();
            echo "</p>";
        } else {
            echo $this->wrongTimezone. " is an Invalid timezone. Try again!";
        }
    }
}

// Create an object that passes correct arguments
$myTimeZone1 = new GetCurrentDateTime('America', 'Vancouver');
$myTimeZone1->displayDateTime();

// Create an object that passes only one chosen argument
$myTimeZone2 = new GetCurrentDateTime(city: 'New_York');
$myTimeZone2->displayDateTime();

// Create an object that passes incorrect arguments
$myTimeZone3 = new GetCurrentDateTime('Africa', 'Vancouver');
$myTimeZone3->displayDateTime();
