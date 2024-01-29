    <?php
    
    //1-Declare variables and Assign values
    //Input data for test
    $possibleValues1=['number', 'text', null];                 
    $numberOrText=$possibleValues1[rand(0,2)];
    $possibleValues2=['',0,1,9,10,'a','i','j'];
    $userInput=$possibleValues2[rand(0,7)];
    

    //Data for calculations
    $fruitsNumber=array('apple', 
                        'banana', 
                        'cherry', 
                        'date', 
                        'eggplant', 
                        'fig', 
                        'grape', 
                        'hackberry', 
                        'icacina'
                        );
        
    $fruitsText=array('a'=>'apple', 
                        'b'=>'banana', 
                        'c'=>'cherry', 
                        'd'=>'date', 
                        'e'=>'eggplant', 
                        'f'=>'fig', 
                        'g'=>'grape', 
                        'h'=>'hackberry', 
                        'i'=>'icacina'
                        );
    //Data for displaying output
    $messages=array('input'=>'You typed: ', 
                    'fruit'=>'The corresponding fruit is: ',
                    'emptyNull'=>"<b>You didn't select or write all the fields!</b>", 
                    'err'=>"<b>You didn't select the right option or write the right data!Try again!</b>",
                    'errNbr'=>'If you select number, you must type "1 to 9".',
                    'errTxt'=>'If you select text, you must type "a to i".'
                    );

    //2-Validate input data 
    if (!isset($numberOrText) || empty($userInput)){
        //3-Calculate output data
        $errorMessage=$messages['emptyNull'];
    }
    elseif ($numberOrText==='number' && is_numeric($userInput) && $userInput>0 && $userInput<10){
        //3-Calculate output data
        $fruitName=$fruitsNumber[$userInput-1];
    } 
    elseif ($numberOrText==='text' && preg_match("/[a-i]/",$userInput)) {
        //3-Calculate output data
        $fruitName=$fruitsText[$userInput]; 
    }
    else{
       //3-Calculate output data
       $errorMessage=$messages['err'];
    }

    //4-Display output data
    if (isset($errorMessage)){
        echo '<p>'. $errorMessage . '</p>';
        echo '<p>'. $messages['errNbr']. '</p>';
        echo '<p>'. $messages['errTxt']. '</p>';
    }
    else{
        echo "<p>".$messages['input']."<b>".$userInput."</b></p>";
        echo "<p>". $messages['fruit']."<b>".$fruitName."</b></p>";
    }

    
