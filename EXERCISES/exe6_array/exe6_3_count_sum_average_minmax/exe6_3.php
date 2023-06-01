<?php

/**
 *exe6_3.php
 *EXERCISE 6 NUMBER 3
 *FORM & FORM HANDLING
 *Patrick Saint-Louis, 2023
 */
?>

<!DOCTYPE html>
<html>

<head>
    <title>Question?</title>
</head>

<body>
    <?php
    // if the form is not yet submitted display the form
    if (!isset($_POST['submit'])) {
    ?>
        <h1>Enter your grades separated by a comma between each 2 grades</h1>
        <form method="post" action="<?php echo $_SERVER['SCRIPT_NAME']; ?>">
            <label>
                Enter a set of minimum 2 numbers between 0 to 100 (i.e.; 67, 55, 100, 59) <br />
                <input type="text" name="grades" required="required" />
            </label>
            <br /><br />
            <input type="submit" name="submit" value="Submit" />
        </form>
</body>

</html>
<?php
        // if form is submitted process form input
    } else {

        echo <<<_END
  <!DOCTYPE html>
  <html>  
  <head>
    <title>Answer!</title>
    <style>
      .redtext{color:red;}
    </style>
  </head>
  <body>			
    <h1 class="redtext"></h1>
    <hr>
_END;

        //Create the messages to display
        $messages = array(
            'size' => 'The number of grades entered is: ',
            'success' => 'The number of grades greater than or equal to 60% is: ',
            'failure' => 'The number of grades lower than 60% is: ',
            'avg' => 'The average grade is: ',
            'greatest' => 'The greatest grade is: ',
            'lowest' => 'The lowest grade is: ',
            'errVal' => "<b>You didn't enter grades between only 0 and 100!</b>",
            'errQty' => "<b>You didn't enter a minimum of 2 grades!</b>"
        );


        //Retrieve data from the form, remove comma and save them in a numbered array
        $listGrades = explode(',', $_POST['grades']);

        //Order array data in ascending 
        sort($listGrades, SORT_NUMERIC);

        //Calculate the length of the array
        $sizeListGrades = count($listGrades);

        //Calculate the index of the last element
        $lst_idx = $sizeListGrades - 1;

        //Check whether the values are between 0 and 100
        if ($sizeListGrades < 2) {
            echo "<p>" . $messages['errQty'] . "</p>";
        } elseif ($listGrades[0] < 0 || $listGrades[0] > 100 || $listGrades[$lst_idx] < 0 || $listGrades[$lst_idx] > 100) {
            echo "<p>" . $messages['errVal'] . "</p>";
        } else {
            //Display output 
            //Number of grades entered
            echo "<p>" . $messages['size'] . $sizeListGrades . "</p>";
            //Calculate 
            //Number of grades<60 (failure) and >=60 (success)
            //Sum of the grades
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

            //Display outputs 
            //Number of grades<60 (failure) and >=60 (success)
            echo "<p>" . $messages['success'] . $countSuccess . "</p>";
            echo "<p>" . $messages['failure'] . $countFailure . "</p>";

            //Display outputs 
            //Grade average
            echo "<p>" . $messages['avg'] . $avgGrades . "</p>";

            //Display outputs 
            //Greatest and Lowest Grade 
            echo "<p>" . $messages['lowest'] . $listGrades[0] . "</p>";
            echo "<p>" . $messages['greatest'] . $listGrades[$lst_idx] . "</p>";
        }

        echo <<<_END
        <a href="exe6_3.php">Try again!</a>
    </body>
  </html>
_END;
    }
?>