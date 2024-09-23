<?php 
    /* 
    IF statement 
    ONLY 1 SINGLE OR COMBINED OPTION
    */
    // Variable assignment
    $user_number=27;
    // The only option there is when $user_number>=0
    if ($user_number>=0){
        echo"You wrote a positive number<br/>";
    }

    /* 
    IF-ELSE statement 
    ONLY 2 SINGLE OR COMBINED OPTIONS
    ELSE IS APPLIED FOR ALL THE OTHER OPTIONS THAT IF DIDN'T TAKE INTO ACCOUNT
    */
    // Variable assignment
    $user_number=-27;
    // The 1st option there is when $user_number>=0
    // The 2nd option there is when $user_number is not >=0
    if ($user_number>=0){
        echo"You wrote a positive number<br/>";
    }else{
        echo"You wrote a negative number<br/>";
    }

    /* 
    IF-ELSE-ELSEIF statement 
    MORE THAN 2 SINGLE OR COMBINED OPTIONS
    ELSE IS APPLIED FOR ALL THE OTHER OPTIONS THAT IF AND ELSEIF DIDN'T TAKE INTO ACCOUNT
    */
    // Variable assignment
    $user_number=0;
    // The 1st option there is when $user_number>0
    // The 2nd option there is when $user_number=0
    // The 3nd option there is when $user_numberis not > or = 0
    if ($user_number>0){
        echo"You wrote a positive number<br/>";
    }elseif ($user_number==0){
        echo"You wrote a null number<br/>";
    }else{
        echo"You wrote a negative number<br/>";
    }
 
    /* 
    ? statement 
    ONLY 2 SINGLE OR COMBINED OPTIONS
    The 1st message is displayed only when the condition indicated is true (if)
    The 2nd message is displayed only when the condition indicated is false (else)
    */
    // Variable assignment
    $user_number=-50;
    // The 1st option there is when $user_number>=0
    // The 2nd option there is when $user_number is not >=0
    echo $user_number >= 0 ? "Positive number <br/>" : "Negative number<br/>";
    
    /* 
    LIKE IF-ELSE-ELSEIF statement 
    MORE THAN 2 SINGLE OR COMBINED OPTIONS ARE POSSIBLE
    DEFAULT IS APPLIED FOR ALL THE OTHER OPTIONS THAT THE OTHER CASES DIDN'T TAKE INTO ACCOUNT
    */
    // Variable assignment
    $user_number='negativ';

	switch ($user_number){
    	case 'positive' :
        	echo "Number greater than 0.<br />";
        	break;
    	case 'zero':
        	echo "Number equal to 0.<br />";
        	break;
    	case 'negative':
        	echo "Number lower than 0.<br />";
        	break;
    	default:
        	echo "You didn't enter a correct value.<br />";
	}

    /* 
    MATCH statement 
    What is the difference between a match and a switch?
    */
    // Variable assignment
    $user_number='negative';
    $output_value = match ($user_number) {
	    'positive'=>'Number greater than 0.',
	    'negative'=>'Number lower than 0.',
	    'zero'=>'Number equal to 0.'
    };

    echo $output_value;
   
    /*
       COMBINED OPTIONS with &&
       All conditions between && must be true
       in order to the program executes the corresponding instructions
    */

    //Assign data read from form fields to php variables
    $userYear = 1999;
    $userCitizenship = 'Canadian';

    //Declare and initialize variables
    $now = getdate();
    $current_year = $now['year'];
    $message1='You are eligible to vote';
    $message2='You are NOT yet eligible to vote';
    $messages=array($message1, $message2);

    //Conditions and output
    if($userYear <=($current_year-18) && $userCitizenship == 'Canadian')
        echo $messages[0]."<br />";
    else 
        echo $messages[1]."<br />";


    /*
       COMBINED OPTIONS with || (Where)
       At least one of the conditions between || must be true
       so that the program executes the corresponding instructions
    */

    //Assign data read from form fields to php variables
    $userNumber1 = 1999;
    $userNumber2 = -20;

    //Declare and initialize variables
    $message1="At least one of your numbers is negative";
    $message2="None of your numbers are negative";
    $messages=array($message1, $message2);

    //Conditions and output
    if($userNumber1 < 0 || $userNumber2 < 0)
        echo $messages[0]."<br />";
    else 
        echo $messages[1]."<br />";    
