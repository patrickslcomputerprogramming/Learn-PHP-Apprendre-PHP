<?php
require_once 'Symbols.php';

class Calculate extends Symbols {
    //Constructor method
    public function __construct() {
        //Nothing yet
    }

    //Method to select all the data 
    public function setAllData(): array {
        //Save the first info array
        $allData = array();
        $allData = $this->allIdentificationData();
        //Create an array with all the provinces names
        $name = array();
        foreach ($allData  as $province_name => $array_of_info){
            $name[]=$province_name;
        }
        //Create an array with the other info arrays
        $arrayName = [$this->allCharacteristicsData(), $this->allSymbolsData()];
        //Combine all the info arrays
        foreach ($arrayName as $eachArrayNameKey => $eachArrayName) {
            foreach ($eachArrayName as $province_name => $array_of_info) {
                foreach ($name as $name_key => $name_value) {
                    if ($province_name == $name_value) {
                        foreach ($array_of_info as $info_key => $info_value) {
                            $allData[$name_value][$info_key] = $eachArrayName[$name_value][$info_key];
                        }
                    }
                }
            }
        }
        //Return the combination of all the info arrays
        return $allData;
    }

    //Method to select a specific data field 
    public function setaSpecificDataField($field): array {
         //Select the required data
         $allData = $this->setAllData();
         $specificData = array();
         foreach ($allData as $provinceName => $InformationArray){
             foreach ($InformationArray as $index => $value){
                 if ($index==$field){
                     $specificData[$provinceName] = $value;
                 }
             }
         }
         //Return an array that includes a specific data field
         return $specificData;
    }

    //Method to sort in ascending (a to z Or lower to greater)
    private function setAscendingOrder($field): array {
        //Save the required data
        $specificData = $this -> setaSpecificDataField(field: $field);
        //Sort the data in ascending
        asort(array: $specificData);
        //Return an array with data ordered in ascending
        return $specificData;
    }
    
    //Method to sort in descending (z to a Or greater to lower)
    private function setDescendingOrder($field): array {
        /*
        //Order in ascending
        $data = $this->setAscendingOrder(field: $field);
        //Order in descending and return an array with data ordered in descending
        return array_reverse(array: $data); */
        //Save the required data
        $specificData = $this -> setaSpecificDataField(field: $field);
        //Sort the data in ascending
        arsort(array: $specificData);
        //Return an array with data ordered in ascending
        return $specificData;
    }
    
    //Method to select the greatest value (c among a,b,c Or 3 among 1,2,3)
    private function setGreatest($field): array {
        //Save the required data
        $specificData = $this -> setaSpecificDataField(field: $field);
        //Calculate the greatest value
        $greatest = array();
        foreach ($specificData as $index => $value){
            if ($value === max($specificData)){
                $greatest [$index] = $value; 
            }
        }
        //Return an array with the greatest data
        return $greatest;
    }

    //Method to select the lowest value (a among a,b,c Or 1 among 1,2,3)
    private function setLowest($field): array {
        //Save the required data
        $specificData = $this -> setaSpecificDataField(field: $field);
        //Calculate the lowest value
        $lowest = array();
        foreach ($specificData as $index => $value){
            if ($value === min($specificData)){
                $lowest [$index] = $value; 
            }
        }
        //Return an array with the lowest data
        return $lowest;
    }
    public function getACalculateData($field, $operation): array {
        $data = array();
        //Calculate
        if ($operation=="ascending"){
            $data = $this->setAscendingOrder($field);
        }
        else if ($operation=="descending"){
            $data = $this->setDescendingOrder($field);
        }
        else if ($operation=="greatest"){
            $data = $this->setGreatest($field);
        }
        else if ($operation=="lowest"){
            $data = $this->setLowest($field);
        }
        //Return outputs
        return $data; 
    }
}
