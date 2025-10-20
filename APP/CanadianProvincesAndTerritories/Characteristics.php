<?php
require_once 'ProvinceAndTerritories.php';

class Characteristics extends ProvinceAndTerritories {
    //Constructor method
    public function __construct($name) {
        parent::__construct(name: $name);
    }
    
    //Method to save the data
    protected static function AllCharacteristicsData(): array {
        return     [
            'Alberta' => ['capital' => 'Edmonton', 'largestCity' => 'Calgary', 'officialLanguages' => ['English'], 'timeZone' => 'UTC-7', 'totalArea' => 661848, 'landArea' => 642317, 'waterArea' => 19531, 'population' => 4413146],
            'British Columbia' => ['capital' => 'Victoria', 'largestCity' => 'Vancouver', 'officialLanguages' => ['English'], 'timeZone' => 'UTC-8', 'totalArea' => 944735, 'landArea' => 925186, 'waterArea' => 19549, 'population' => 5110917],
            'Manitoba' => ['capital' => 'Winnipeg', 'largestCity' => 'Winnipeg', 'officialLanguages' => ['English'], 'timeZone' => 'UTC-6', 'totalArea' => 647797, 'landArea' => 553556, 'waterArea' => 94241, 'population' => 1384515],
            'New Brunswick' => ['capital' => 'Fredericton', 'largestCity' => 'Moncton', 'officialLanguages' => ['English', 'French'], 'timeZone' => 'UTC-4', 'totalArea' => 72908, 'landArea' => 71450, 'waterArea' => 1458, 'population' => 789225],
            'Newfoundland and Labrador' => ['capital' => 'St. John\'s', 'largestCity' => 'St. John\'s', 'officialLanguages' => ['English'], 'timeZone' => 'UTC-3:30', 'totalArea' => 405212, 'landArea' => 373872, 'waterArea' => 31340, 'population' => 522453],
            'Nova Scotia' => ['capital' => 'Halifax', 'largestCity' => 'Halifax', 'officialLanguages' => ['English'], 'timeZone' => 'UTC-4', 'totalArea' => 55284, 'landArea' => 52829, 'waterArea' => 2455, 'population' => 992055],
            'Ontario' => ['capital' => 'Toronto', 'largestCity' => 'Toronto', 'officialLanguages' => ['English'], 'timeZone' => 'UTC-5', 'totalArea' => 1076395, 'landArea' => 917741, 'waterArea' => 158654, 'population' => 14734014],
            'Prince Edward Island' => ['capital' => 'Charlottetown', 'largestCity' => 'Charlottetown', 'officialLanguages' => ['English'], 'timeZone' => 'UTC-4', 'totalArea' => 5660, 'landArea' => 5660, 'waterArea' => 0, 'population' => 164318],
            'Quebec' => ['capital' => 'Quebec City', 'largestCity' => 'Montreal', 'officialLanguages' => ['French'], 'timeZone' => 'UTC-5', 'totalArea' => 1542056, 'landArea' => 1365128, 'waterArea' => 176928, 'population' => 8574571],
            'Saskatchewan' => ['capital' => 'Regina', 'largestCity' => 'Saskatoon', 'officialLanguages' => ['English'], 'timeZone' => 'UTC-6', 'totalArea' => 651036, 'landArea' => 591670, 'waterArea' => 59366, 'population' => 1177884],
            'Northwest Territories' => ['capital' => 'Yellowknife', 'largestCity' => 'Yellowknife', 'officialLanguages' => ['English', 'French', 'Chipewyan', 'Cree', 'Gwichʼin', 'Inuinnaqtun', 'Inuktitut', 'Inuvialuktun', 'North Slavey', 'South Slavey', 'Tłı̨chǫ'], 'timeZone' => 'UTC-7', 'totalArea' => 1346106, 'landArea' => 1183085, 'waterArea' => 163021, 'population' => 41070],
            'Nunavut' => ['capital' => 'Iqaluit', 'largestCity' => 'Iqaluit', 'officialLanguages' => ['English', 'French', 'Inuinnaqtun', 'Inuktitut'], 'timeZone' => 'UTC-5', 'totalArea' => 2093190, 'landArea' => 1936113, 'waterArea' => 157077, 'population' => 36858],
            'Yukon' => ['capital' => 'Whitehorse', 'largestCity' => 'Whitehorse', 'officialLanguages' => ['English', 'French'], 'timeZone' => 'UTC-7', 'totalArea' => 482443, 'landArea' => 474391, 'waterArea' => 8052, 'population' => 42528]
        ];
        
    }

    //Method to access the data
    public function getCharacteristicsData():array { 
        return $this->AllCharacteristicsData()[$this->name]; 
    }
    
    //Destructor method
    public function __destruct() {
        // Cleanup if needed
    }  
}
