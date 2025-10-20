<?php
require_once 'Characteristics.php';

class Symbols extends Characteristics {
    
    //Constructor method
    public function __construct($name) {
        parent::__construct(name: $name);
    }
      
    //Method to save the data
    protected static function AllSymbolsData(): array {
        return [
            'Alberta' => [
                'geographicImage' => 'https://upload.wikimedia.org/wikipedia/commons/thumb/f/f5/Alberta.svg/500px-Alberta.svg.png',
                'motto' => 'Fortis et Liber', 
                'flagImage' => 'https://upload.wikimedia.org/wikipedia/commons/thumb/f/f5/Flag_of_Alberta.svg/500px-Flag_of_Alberta.svg.png',
                'coatOfArmsImage' => 'https://upload.wikimedia.org/wikipedia/commons/thumb/e/ec/Coat_of_arms_of_Alberta.svg/500px-Coat_of_arms_of_Alberta.svg.png',
                'symbolImage' => 'https://images.unsplash.com/photo-1582530256757-3ba90b999b9a?w=500&h=500&fit=crop',
                'symbolImageName' => 'Rocky Mountains in Banff National Park, Alberta'
            ],
            
            'British Columbia' => [
                'geographicImage' => 'https://upload.wikimedia.org/wikipedia/commons/thumb/b/b8/British_Columbia.svg/500px-British_Columbia.svg.png',
                'motto' => 'Splendor sine occasu',
                'flagImage' => 'https://upload.wikimedia.org/wikipedia/commons/thumb/b/b8/Flag_of_British_Columbia.svg/500px-Flag_of_British_Columbia.svg.png',
                'coatOfArmsImage' => 'https://upload.wikimedia.org/wikipedia/commons/thumb/9/9c/Coat_of_arms_of_British_Columbia.svg/500px-Coat_of_arms_of_British_Columbia.svg.png',
                'symbolImage' => 'https://images.unsplash.com/photo-1506905925346-21bda4d32df4?w=500&h=500&fit=crop',
                'symbolImageName' => 'Pacific Coastline in Tofino, British Columbia'
            ],
            
            'Manitoba' => [
                'geographicImage' => 'https://upload.wikimedia.org/wikipedia/commons/thumb/3/3e/Manitoba.svg/500px-Manitoba.svg.png',
                'motto' => 'Gloriosus et Liber',
                'flagImage' => 'https://upload.wikimedia.org/wikipedia/commons/thumb/c/c4/Flag_of_Manitoba.svg/500px-Flag_of_Manitoba.svg.png',
                'coatOfArmsImage' => 'https://upload.wikimedia.org/wikipedia/commons/thumb/4/42/Coat_of_arms_of_Manitoba.svg/500px-Coat_of_arms_of_Manitoba.svg.png',
                'symbolImage' => 'https://images.unsplash.com/photo-1578660452664-85534f2ca435?w=500&h=500&fit=crop',
                'symbolImageName' => 'Wheat Fields in Southern Manitoba'
            ],
            
            'New Brunswick' => [
                'geographicImage' => 'https://upload.wikimedia.org/wikipedia/commons/thumb/7/74/New_Brunswick.svg/500px-New_Brunswick.svg.png',
                'motto' => 'Spem reduxit',
                'flagImage' => 'https://upload.wikimedia.org/wikipedia/commons/thumb/f/fb/Flag_of_New_Brunswick.svg/500px-Flag_of_New_Brunswick.svg.png',
                'coatOfArmsImage' => 'https://upload.wikimedia.org/wikipedia/commons/thumb/3/3d/Coat_of_arms_of_New_Brunswick.svg/500px-Coat_of_arms_of_New_Brunswick.svg.png',
                'symbolImage' => 'https://images.unsplash.com/photo-1579972668140-f7da53eee1dc?w=500&h=500&fit=crop',
                'symbolImageName' => 'Bay of Fundy in New Brunswick'
            ],
            
            'Newfoundland and Labrador' => [
                'geographicImage' => 'https://upload.wikimedia.org/wikipedia/commons/thumb/5/51/Newfoundland_and_Labrador.svg/500px-Newfoundland_and_Labrador.svg.png',
                'motto' => 'Quaerite prime regnum Dei',
                'flagImage' => 'https://upload.wikimedia.org/wikipedia/commons/thumb/d/dd/Flag_of_Newfoundland_and_Labrador.svg/500px-Flag_of_Newfoundland_and_Labrador.svg.png',
                'coatOfArmsImage' => 'https://upload.wikimedia.org/wikipedia/commons/thumb/4/44/Coat_of_arms_of_Newfoundland_and_Labrador.svg/500px-Coat_of_arms_of_Newfoundland_and_Labrador.svg.png',
                'symbolImage' => 'https://images.unsplash.com/photo-1593115057324-04658c51c6de?w=500&h=500&fit=crop',
                'symbolImageName' => 'Coastal Cliffs in Gros Morne National Park, Newfoundland'
            ],
            
            'Nova Scotia' => [
                'geographicImage' => 'https://upload.wikimedia.org/wikipedia/commons/thumb/2/2e/Nova_Scotia.svg/500px-Nova_Scotia.svg.png',
                'motto' => 'Munit haec et altera vincit',
                'flagImage' => 'https://upload.wikimedia.org/wikipedia/commons/thumb/c/c0/Flag_of_Nova_Scotia.svg/500px-Flag_of_Nova_Scotia.svg.png',
                'coatOfArmsImage' => 'https://upload.wikimedia.org/wikipedia/commons/thumb/3/3f/Coat_of_arms_of_Nova_Scotia.svg/500px-Coat_of_arms_of_Nova_Scotia.svg.png',
                'symbolImage' => 'https://images.unsplash.com/photo-1508197141733-18f082ed1f6d?w=500&h=500&fit=crop',
                'symbolImageName' => 'Peggy\'s Cove Lighthouse in Nova Scotia'
            ],
            
            'Ontario' => [
                'geographicImage' => 'https://upload.wikimedia.org/wikipedia/commons/thumb/6/6b/Ontario.svg/500px-Ontario.svg.png',
                'motto' => 'Ut Incepit Fidelis Sic Permanet',
                'flagImage' => 'https://upload.wikimedia.org/wikipedia/commons/thumb/8/88/Flag_of_Ontario.svg/500px-Flag_of_Ontario.svg.png',
                'coatOfArmsImage' => 'https://upload.wikimedia.org/wikipedia/commons/thumb/6/6e/Coat_of_arms_of_Ontario.svg/500px-Coat_of_arms_of_Ontario.svg.png',
                'symbolImage' => 'https://images.unsplash.com/photo-1514933651103-005eec06c04b?w=500&h=500&fit=crop',
                'symbolImageName' => 'Toronto Skyline in Ontario'
            ],
            
            'Prince Edward Island' => [
                'geographicImage' => 'https://upload.wikimedia.org/wikipedia/commons/thumb/2/2e/Prince_Edward_Island.svg/500px-Prince_Edward_Island.svg.png',
                'motto' => 'Parva sub ingenti',
                'flagImage' => 'https://upload.wikimedia.org/wikipedia/commons/thumb/d/d7/Flag_of_Prince_Edward_Island.svg/500px-Flag_of_Prince_Edward_Island.svg.png',
                'coatOfArmsImage' => 'https://upload.wikimedia.org/wikipedia/commons/thumb/4/46/Coat_of_arms_of_Prince_Edward_Island.svg/500px-Coat_of_arms_of_Prince_Edward_Island.svg.png',
                'symbolImage' => 'https://images.unsplash.com/photo-1578689243067-7e4a1e761844?w=500&h=500&fit=crop',
                'symbolImageName' => 'Red Sand Beaches in Prince Edward Island National Park'
            ],
            
            'Quebec' => [
                'geographicImage' => 'https://upload.wikimedia.org/wikipedia/commons/thumb/6/6b/Quebec.svg/500px-Quebec.svg.png',
                'motto' => 'Je me souviens',
                'flagImage' => 'https://upload.wikimedia.org/wikipedia/commons/thumb/5/5f/Flag_of_Quebec.svg/500px-Flag_of_Quebec.svg.png',
                'coatOfArmsImage' => 'https://upload.wikimedia.org/wikipedia/commons/thumb/6/6d/Coat_of_arms_of_Quebec.svg/500px-Coat_of_arms_of_Quebec.svg.png',
                'symbolImage' => 'https://images.unsplash.com/photo-1604977048615-40a4eb84a9c8?w=500&h=500&fit=crop',
                'symbolImageName' => 'Château Frontenac in Quebec City, Quebec'
            ],
            
            'Saskatchewan' => [
                'geographicImage' => 'https://upload.wikimedia.org/wikipedia/commons/thumb/7/78/Saskatchewan.svg/500px-Saskatchewan.svg.png',
                'motto' => 'Multis e gentibus vires',
                'flagImage' => 'https://upload.wikimedia.org/wikipedia/commons/thumb/b/bb/Flag_of_Saskatchewan.svg/500px-Flag_of_Saskatchewan.svg.png',
                'coatOfArmsImage' => 'https://upload.wikimedia.org/wikipedia/commons/thumb/3/3e/Coat_of_arms_of_Saskatchewan.svg/500px-Coat_of_arms_of_Saskatchewan.svg.png',
                'symbolImage' => 'https://images.unsplash.com/photo-1593115057324-04658c51c6de?w=500&h=500&fit=crop',
                'symbolImageName' => 'Wheat Fields in Saskatchewan Prairies'
            ],
            
            'Northwest Territories' => [
                'geographicImage' => 'https://upload.wikimedia.org/wikipedia/commons/thumb/1/1d/Northwest_Territories.svg/500px-Northwest_Territories.svg.png',
                'motto' => 'None',
                'flagImage' => 'https://upload.wikimedia.org/wikipedia/commons/thumb/c/c1/Flag_of_the_Northwest_Territories.svg/500px-Flag_of_the_Northwest_Territories.svg.png',
                'coatOfArmsImage' => 'https://upload.wikimedia.org/wikipedia/commons/thumb/5/5d/Coat_of_arms_of_the_Northwest_Territories.svg/500px-Coat_of_arms_of_the_Northwest_Territories.svg.png',
                'symbolImage' => 'https://images.unsplash.com/photo-1578660452664-85534f2ca435?w=500&h=500&fit=crop',
                'symbolImageName' => 'Northern Lights over Yellowknife, Northwest Territories'
            ],
            
            'Nunavut' => [
                'geographicImage' => 'https://upload.wikimedia.org/wikipedia/commons/thumb/5/51/Nunavut.svg/500px-Nunavut.svg.png',
                'motto' => 'Nunavut Sanginivut',
                'flagImage' => 'https://upload.wikimedia.org/wikipedia/commons/thumb/9/90/Flag_of_Nunavut.svg/500px-Flag_of_Nunavut.svg.png',
                'coatOfArmsImage' => 'https://upload.wikimedia.org/wikipedia/commons/thumb/5/59/Coat_of_arms_of_Nunavut.svg/500px-Coat_of_arms_of_Nunavut.svg.png',
                'symbolImage' => 'https://images.unsplash.com/photo-1578660452664-85534f2ca435?w=500&h=500&fit=crop',
                'symbolImageName' => 'Arctic Landscape in Iqaluit, Nunavut'
            ],
            
            'Yukon' => [
                'geographicImage' => 'https://upload.wikimedia.org/wikipedia/commons/thumb/5/55/Yukon.svg/500px-Yukon.svg.png',
                'motto' => 'None',
                'flagImage' => 'https://upload.wikimedia.org/wikipedia/commons/thumb/6/69/Flag_of_Yukon.svg/500px-Flag_of_Yukon.svg.png',
                'coatOfArmsImage' => 'https://upload.wikimedia.org/wikipedia/commons/thumb/5/5a/Coat_of_arms_of_Yukon.svg/500px-Coat_of_arms_of_Yukon.svg.png',
                'symbolImage' => 'https://images.unsplash.com/photo-1582530256757-3ba90b999b9a?w=500&h=500&fit=crop',
                'symbolImageName' => 'Kluane National Park Mountains in Yukon'
            ]
        ];        
    }

    //Method to access the data
    public function getSymbolsData():array { 
        return $this->AllSymbolsData()[$this->name]; 
    }

    //Destructor method
    public function __destruct() {
        // Cleanup if needed
    }  
}
