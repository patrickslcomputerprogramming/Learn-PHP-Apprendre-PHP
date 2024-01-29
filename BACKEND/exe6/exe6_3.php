<?php

//1-Declare variables and Assign values
//Input data for test
$input1 = '50, 60, 100, 100, 90';
$input2 = 'a, 100, 80, 50, 60, 100';
$input3 = '90, 100, 80, 50, 60, b';
$groupInput = [1 => $input1, 2 => $input2, 3 => $input3];
$userInput = $groupInput[rand(1, 3)];

//Data for displaying output
$messages = array(
    'input' => 'You entered: ',
    'size' => 'The number of grades entered is: ',
    'success' => 'The number of grades greater than or equal to 60% is: ',
    'failure' => 'The number of grades lower than 60% is: ',
    'avg' => 'The average grade is: ',
    'greatest' => 'The greatest grade is: ',
    'lowest' => 'The lowest grade is: ',
    'errVal' => "<b>You didn't enter grades between only 0 and 100!</b>",
    'errQty' => "<b>You didn't enter a minimum of 2 grades!</b>",
    'errNotNbr' => "<b>You didn't enter only numeric values!</b>"
);

//2-Validate input data 
$listGrades = explode(',', $userInput);
//Calculate the length of the array
$sizeListGrades = count($listGrades);

//Check wheter there is a minimum of 1 non numeric value
for ($i = 0; $i < $sizeListGrades; $i++) {
    if (!is_numeric($listGrades[$i])) {
        //Assign outputs data 
        $finalMessage = "<p>" . $messages['errNotNbr'] . "</p>";
        break;
    }
}

//If all values are numeric
if (!isset($finalMessage)) {
    //Order array data in ascending 
    sort($listGrades, SORT_NUMERIC);

    //Calculate the index of the last element
    $lst_idx = $sizeListGrades - 1;

    //Check whether there are a minimum of 2 grades
    if ($sizeListGrades < 2) {
        $finalMessages = "<p>" . $messages['errQty'] . "</p>";
    } elseif ($listGrades[0] < 0 || $listGrades[0] > 100 || $listGrades[$lst_idx] < 0 || $listGrades[$lst_idx] > 100) {
        $finalMessages = "<p>" . $messages['errVal'] . "</p>";
    } else {
        //3-Calculate output data
        //Caculate number of grades<60 (failure) and >=60 (success)
        $countSuccess = $sumGrades = 0;
        foreach ($listGrades as $eachgrade) {
            $sumGrades = $sumGrades + $eachgrade;
            if ($eachgrade < 60)
                continue;
            $countSuccess = $countSuccess + 1;
        }
        $countFailure = $sizeListGrades - $countSuccess;

        //Calculate grade average 
        $avgGrades = $sumGrades / $sizeListGrades;

        //Assign outputs data 
        $finalMessage = "<p>" . $messages['size'] . $sizeListGrades . "</p>" .
            "<p>" . $messages['success'] . $countSuccess . "</p>" .
            "<p>" . $messages['failure'] . $countFailure . "</p>" .
            "<p>" . $messages['avg'] . $avgGrades . "</p>" .
            "<p>" . $messages['greatest'] . $listGrades[$lst_idx] . "</p>" .
            "<p>" . $messages['lowest'] . $listGrades[0] . "</p>";
    }
}

//4-Display output data
echo "<p>" . $messages['input'] . $userInput . "</p>" . $finalMessage;
