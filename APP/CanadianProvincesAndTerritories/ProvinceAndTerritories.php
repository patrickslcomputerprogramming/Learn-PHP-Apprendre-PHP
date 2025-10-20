<?php
class ProvinceAndTerritories {
    protected $name;
    
    //Constructor method
    public function __construct($name) {
        $this->name = $name;
    }
    
    //Method to save the data
    protected function allIdentificationData(): array {
        return [
            'Alberta' => ['name'=> 'Alberta', 'postalAbbreviation'=> 'AB', 'coordinates'=> '54.5000° N, 114.0000° W', 'confederationDate'=> '1905-09-01'],
            'British Columbia' => ['name'=> 'British Columbia', 'postalAbbreviation'=> 'BC', 'coordinates'=> '53.7267° N, 127.6476° W', 'confederationDate'=> '1871-07-20'],
            'Manitoba' => ['name'=> 'Manitoba', 'postalAbbreviation'=> 'MB', 'coordinates'=> '53.7609° N, 98.8139° W', 'confederationDate'=> '1870-07-15'],
            'New Brunswick' => ['name'=> 'New Brunswick', 'postalAbbreviation'=> 'NB', 'coordinates'=> '46.5653° N, 66.4619° W', 'confederationDate'=> '1867-07-01'],
            'Newfoundland and Labrador' => ['name'=> 'Newfoundland and Labrador', 'postalAbbreviation'=> 'NL', 'coordinates'=> '53.1355° N, 57.6604° W', 'confederationDate'=> '1949-03-31'],
            'Nova Scotia' => ['name'=> 'Nova Scotia', 'postalAbbreviation'=> 'NS', 'coordinates'=> '44.6816° N, 63.7443° W', 'confederationDate'=> '1867-07-01'],
            'Ontario' => ['name'=> 'Ontario', 'postalAbbreviation'=> 'ON', 'coordinates'=> '51.2538° N, 85.3232° W', 'confederationDate'=> '1867-07-01'],
            'Prince Edward Island' => ['name'=> 'Prince Edward Island', 'postalAbbreviation'=> 'PE', 'coordinates'=> '46.5107° N, 63.4168° W', 'confederationDate'=> '1873-07-01'],
            'Quebec' => ['name'=> 'Quebec', 'postalAbbreviation'=> 'QC', 'coordinates'=> '52.9399° N, 73.5491° W', 'confederationDate'=> '1867-07-01'],
            'Saskatchewan' => ['name'=> 'Saskatchewan', 'postalAbbreviation'=> 'SK', 'coordinates'=> '52.9399° N, 106.4509° W', 'confederationDate'=> '1905-09-01'],
            'Northwest Territories' => ['name'=> 'Northwest Territories', 'postalAbbreviation'=> 'NT', 'coordinates'=> '64.8255° N, 124.8457° W', 'confederationDate'=> '1870-07-15'],
            'Nunavut' => ['name'=> 'Nunavut', 'postalAbbreviation'=> 'NU', 'coordinates'=> '70.2998° N, 83.1076° W', 'confederationDate'=> '1999-04-01'],
            'Yukon' => ['name'=> 'Yukon', 'postalAbbreviation'=> 'YT', 'coordinates'=> '64.2823° N, 135.0000° W', 'confederationDate'=> '1898-06-13']
        ];
    }
    
    //Method to access the data
    public function getIdentificationData():array { 
        return $this->allIdentificationData()[$this->name]; 
    }
    
    //Destructor method
    public function __destruct() {
        // Cleanup if needed
    }
}
