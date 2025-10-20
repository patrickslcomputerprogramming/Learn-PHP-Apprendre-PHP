<?php
require_once 'Symbols.php';

class Calculate extends Symbols {
    public function __construct($name, $postalAbbreviation, $coordinates, $confederationDate,
                              $capital, $largestCity, $officialLanguages, $timeZone,
                              $totalArea, $landArea, $waterArea, $population, $geographicImage,
                              $motto, $flagImage, $coatOfArmsImage) {
        parent::__construct(name: $name, postalAbbreviation: $postalAbbreviation, coordinates: $coordinates, confederationDate: $confederationDate,
                          capital: $capital, largestCity: $largestCity, officialLanguages: $officialLanguages, timeZone: $timeZone,
                          totalArea: $totalArea, landArea: $landArea, waterArea: $waterArea, population: $population, geographicImage: $geographicImage,
                          motto: $motto, flagImage: $flagImage, coatOfArmsImage: $coatOfArmsImage);
    }
    
    public static function ascendingOrder($data, $field): array {
        usort(array: $data, callback: function($a, $b) use ($field): float|int {
            $getter = 'get' . ucfirst(string: $field);
            if (method_exists(object_or_class: $a, method: $getter)) {
                $valA = $a->$getter();
                $valB = $b->$getter();
                
                if (is_numeric(value: $valA) && is_numeric(value: $valB)) {
                    return $valA - $valB;
                }
                return strcmp(string1: $valA, string2: $valB);
            }
            return 0;
        });
        return $data;
    }
    
    public static function descendingOrder($data, $field): array {
        $data = self::ascendingOrder(data: $data, field: $field);
        return array_reverse(array: $data);
    }
    
    public static function greatestValue($data, $field): mixed {
        $getter = 'get' . ucfirst(string: $field);
        $greatest = null;
        
        foreach ($data as $item) {
            if (method_exists(object_or_class: $item, method: $getter)) {
                $value = $item->$getter();
                if ($greatest === null) {
                    $greatest = $item;
                } else {
                    $currentGreatest = $greatest->$getter();
                    if ((is_numeric(value: $value) && $value > $currentGreatest) || 
                        (!is_numeric(value: $value) && strlen(string: $value) > strlen(string: $currentGreatest))) {
                        $greatest = $item;
                    }
                }
            }
        }
        return $greatest;
    }
    
    public static function lowestValue($data, $field): mixed {
        $getter = 'get' . ucfirst(string: $field);
        $lowest = null;
        
        foreach ($data as $item) {
            if (method_exists(object_or_class: $item, method: $getter)) {
                $value = $item->$getter();
                if ($lowest === null) {
                    $lowest = $item;
                } else {
                    $currentLowest = $lowest->$getter();
                    if ((is_numeric(value: $value) && $value < $currentLowest) || 
                        (!is_numeric(value: $value) && strlen(string: $value) < strlen(string: $currentLowest))) {
                        $lowest = $item;
                    }
                }
            }
        }
        return $lowest;
    }
    
    public static function getAllCalculateData(): array {
        return Symbols::getAllSymbolsData();
    }
}
