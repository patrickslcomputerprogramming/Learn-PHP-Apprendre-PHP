<?php
/**
 *exe12_1.php
 *EXERCISE 12 NUMBER 1
 *FORM & FORM HANDLING
 *Patrick Saint-Louis, 2023
*/
//Create function 
function getDataSet($a)
{
    //Remove commas and create an array with the dataset
    $dataSet = explode(',', $a);
    $isNotNumber = 0;
    //Check if one of the array element is not a number
    foreach ($dataSet as $item) {
        if (!preg_match("/[0-9]/", $item)) {
            $isNotNumber++;
        }
    }
    //If at least one array element is not a number
    if ($isNotNumber > 0) {
        return FALSE;
    }
    //If all the array elements are numbers
    else {
        return $dataSet;
    }
}