<?php
require_once 'Characteristics.php';

class Symbols extends Characteristics {
    private $motto;
    private $flagImage;
    private $coatOfArmsImage;
    
    public function __construct($name, $postalAbbreviation, $coordinates, $confederationDate,
                              $capital, $largestCity, $officialLanguages, $timeZone,
                              $totalArea, $landArea, $waterArea, $population, $geographicImage,
                              $motto, $flagImage, $coatOfArmsImage) {
        parent::__construct($name, $postalAbbreviation, $coordinates, $confederationDate,
                          $capital, $largestCity, $officialLanguages, $timeZone,
                          $totalArea, $landArea, $waterArea, $population, $geographicImage);
        $this->motto = $motto;
        $this->flagImage = $flagImage;
        $this->coatOfArmsImage = $coatOfArmsImage;
    }
    
    public function getMotto() { return $this->motto; }
    public function getFlagImage() { return $this->flagImage; }
    public function getCoatOfArmsImage() { return $this->coatOfArmsImage; }
    
    public static function getAllSymbolsData() {
        return [
            'Alberta' => new Symbols('Alberta', 'AB', '54.5000° N, 114.0000° W', '1905-09-01',
                'Edmonton', 'Calgary', ['English'], 'UTC-7', 661848, 642317, 19531, 4413146, 
                'https://upload.wikimedia.org/wikipedia/commons/thumb/f/f5/Alberta.svg/500px-Alberta.svg.png',
                'Fortis et Liber', 
                'https://upload.wikimedia.org/wikipedia/commons/thumb/f/f5/Flag_of_Alberta.svg/500px-Flag_of_Alberta.svg.png',
                'https://upload.wikimedia.org/wikipedia/commons/thumb/e/ec/Coat_of_arms_of_Alberta.svg/500px-Coat_of_arms_of_Alberta.svg.png'),
            
            'British Columbia' => new Symbols('British Columbia', 'BC', '53.7267° N, 127.6476° W', '1871-07-20',
                'Victoria', 'Vancouver', ['English'], 'UTC-8', 944735, 925186, 19549, 5110917,
                'https://upload.wikimedia.org/wikipedia/commons/thumb/b/b8/British_Columbia.svg/500px-British_Columbia.svg.png',
                'Splendor sine occasu',
                'https://upload.wikimedia.org/wikipedia/commons/thumb/b/b8/Flag_of_British_Columbia.svg/500px-Flag_of_British_Columbia.svg.png',
                'https://upload.wikimedia.org/wikipedia/commons/thumb/9/9c/Coat_of_arms_of_British_Columbia.svg/500px-Coat_of_arms_of_British_Columbia.svg.png'),
            
            'Ontario' => new Symbols('Ontario', 'ON', '51.2538° N, 85.3232° W', '1867-07-01',
                'Toronto', 'Toronto', ['English'], 'UTC-5', 1076395, 917741, 158654, 14734014,
                'https://upload.wikimedia.org/wikipedia/commons/thumb/6/6b/Ontario.svg/500px-Ontario.svg.png',
                'Ut Incepit Fidelis Sic Permanet',
                'https://upload.wikimedia.org/wikipedia/commons/thumb/8/88/Flag_of_Ontario.svg/500px-Flag_of_Ontario.svg.png',
                'https://upload.wikimedia.org/wikipedia/commons/thumb/6/6e/Coat_of_arms_of_Ontario.svg/500px-Coat_of_arms_of_Ontario.svg.png'),
            
            'Quebec' => new Symbols('Quebec', 'QC', '52.9399° N, 73.5491° W', '1867-07-01',
                'Quebec City', 'Montreal', ['French'], 'UTC-5', 1542056, 1365128, 176928, 8574571,
                'https://upload.wikimedia.org/wikipedia/commons/thumb/6/6b/Quebec.svg/500px-Quebec.svg.png',
                'Je me souviens',
                'https://upload.wikimedia.org/wikipedia/commons/thumb/5/5f/Flag_of_Quebec.svg/500px-Flag_of_Quebec.svg.png',
                'https://upload.wikimedia.org/wikipedia/commons/thumb/6/6d/Coat_of_arms_of_Quebec.svg/500px-Coat_of_arms_of_Quebec.svg.png')
        ];
    }
}
