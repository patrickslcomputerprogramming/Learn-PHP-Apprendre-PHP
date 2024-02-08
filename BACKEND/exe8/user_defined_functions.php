<?php


/*EXERCISE 1
Create a user-defined function that:  
1-Receives 1 argument that is an integer [input]. 
2-Displays a text indicating whether the integer received 
is a lower than 0 (negative), equal to 0 (null), 
or positive (greater than 0) [output].*/


#Function that calculate the sign of an int
function findIntSign($int) {
    //Calculate output
    if($int===0)
        $result='null';
    elseif ($int>0)
        $result='positive';
    else
        $result='negative';
    //Return output 
    return $result;  
}

//Test the function
var_dump(findIntSign(0));
var_dump(findIntSign(-1));
var_dump(findIntSign(1));


/*EXERCISE 2
Create a user-defined function that:  
1-Receives 1 argument that is an integer and 
1 argument that is a string +, -, or x 
that indicates the operation to operate [input]. 
2-Returns an array that includes the 10 addition (+), 
subtraction (-) or multiplication (x) table of the integer 
received, in accordance with the string received [output].*/

#Function that calculate the first 10 arithmetic table 
function first10ArithmTable($int,$operation){
    //Calculate output
    for($i=0;$i<10;$i++){
        if ($operation==='+'){
            $key=$int.'+'.($i+1);
            $result[$key]=$int + ($i+1);
        }
        elseif ($operation==='-'){
            $key=$int.'-'.($i+1);
            $result[$key]=$int - ($i+1);
        }
        elseif ($operation==='x'){
            $key=$int.'x'.($i+1);
            $result[$key]=$int * ($i+1);
        }
    }

    //Return output 
    return $result;  
}

//Test the function
var_dump(first10ArithmTable(5,'+'));
var_dump(first10ArithmTable(5,'-'));
var_dump(first10ArithmTable(5,'x'));


/*EXERCISE 3
Create a user-defined function that:  
1-Receives 1 argument “by reference” that is an array 
that includes a list of name [input]. 
2-Order in descending the names received in the initial 
variable where they are recorded [output]. 
*/

//Function to order string array elements in ascending order
function sort_ascending(&$arrayOfString) {
    //Calculate output
    //Return output
    sort($arrayOfString, SORT_STRING);
}

//Test the function 
//Assign values to the array
$nameList = array('mno','def','jkl','abc','dcb');
//Read the values before calling the function
var_dump($nameList);
//Call the function
sort_ascending($nameList);
//Read the values after calling the function to see the changes
var_dump($nameList);

/*EXERCISE 4
Create a script that includes:  
-1 variable that saves the subtotal price of a purchase.  
-1 user-defined function that calculates 
the GST tax price (Canada Tax, const GSTRATE=0.05) 
and 1 user-defined function that calculates 
the QST Tax price (Quebec Tax, const QSTRATE =0.09975). 
Each of these 2 functions:  
  --1-Receives no argument [input] but access the subtotal price variable as a global variable. 
  --2-Returns the price calculated [output]. 
-The calculation of the total price that is the sum of the subtotal, GST tax, and QST tax prices. 
*/
//Declare variable and assign values
$subtotalPrice=100;
const QSTRATE =0.09975;
const GSTRATE=0.05;

//Function that calculates the GST tax price
function gstTaxPrice(){
    //Declare global variables
    global $subtotalPrice;
    //Calculate output
    //Return output
    return ($subtotalPrice * GSTRATE);
}

//Function that calculates the GST tax price
function qstTaxPrice(){
    //Declare global variables
    global $subtotalPrice;
    //Calculate output
    //Return output
    return ($subtotalPrice * QSTRATE);
}

//Calculate the total price 
var_dump($totalPrice=$subtotalPrice + gstTaxPrice() + qstTaxPrice());

/*EXERCISE 5
Create a PHP script that includes a user-defined function 
that can receive 2 optional arguments as input and return 
an array of data as output. Call the function with only 1 
argument that is specified using the following format 
iceCream(flavour:"Vanilla");*/

//Function that calculate date and time in accordance with a timezone
function getLocalTime($continent='America',$city='Montreal'){
    //Write the user timezone in the format 'Africa/Abidjan'
    $userTimezone = $continent . '/' . $city;
    //Set the Timezone
    date_default_timezone_set($userTimezone);
    //Calculate and return the time
    return getdate();
}

//Test the function
//Call without passing values to the arguments
var_dump(getLocalTime());
//Call but pass values to a specific argument
var_dump(getLocalTime(city:'Vancouver'));


/*EXERCISE 6
Create a PHP script that includes a recursive user-defined 
function that receives a positive number as input and displays 
its factorial as output. Use the question mark operator 
for creating the conditional structures.
*/

//Function to calculate the factorial of a positive number 
function getFactorial($int){
    return ($int === 1 || $int === 0) ? 1 : $int * getFactorial($int - 1);
}

//Test the function
var_dump(getFactorial(0));
var_dump(getFactorial(1));
var_dump(getFactorial(5));

