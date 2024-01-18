<?php

//1
//Problem: Missing a semi colon at the end
echo'Declare an object and pass arguments';



//2
//Problem: Missing // to convert the plain text to a single line comment
//Display the name of the creator of PHP 
echo'Rasmus Lerdorf is the creator of PHP';


//3
//Problem: Case sensitive variable name and seperate variables from literals 
//Output: Hello Sonic
$Name='Sonic';
$msg='Hello'. $Name;




//4
//Problem: Missing double quotes to display single quote inside them and semi colon at the end 
//Display it's so beautiful to share
echo"it's so beautiful to share"; 



//5
//Problem: Missing quotes for echo and seperate variables from literals
//output: <img src="site-icon.gif">
$img='site-icon.gif'; echo "<img src='".$img."'/>";
$img='site-icon.gif'; echo "<img src=".$img.">";



//6
//Problem: Missing $ before the variable name
//Declare and assign values 
$class=(54%3)/2;




//7
//Problem: Missing /* */ to convert the plain text to a multiple lines comment
/*Output of the following lines
Output 1: Hello QuEbEc  
Output 2: Hello CAnAdA*/
echo("Hello QuEbEc<br/>");
echo("Hello CAnAdA<br/>");




//8
//Problem : No problem 
$val=((99%2)*9/2)*2; echo "$val";



//9
//Problem:Missing separate variables from literals 
$messages['success']="Congratulations!";
$countSuccess=" 5 stars!";
//Expected exit: Congratulations! 5 stars!
echo "<p>".$messages['success']." ".$countSuccess."</p>";



//10
//Problem : Missing double quotes to embed single quotes 
echo  "I'm always happy in my parent's house";




//11
//Problem: Missing quotes, separate variables from literals, and case sensitive variables 
$control='ready';
echo "control=".$control;



//12
//Problem: Missing backslash before double quotes inside double quotes
echo "<p><a href=\"index.php\">OUR SERVICES</a></p>";




//13
//Problem: Missing variable names and separate variables from literals
$country = 'Canada';
echo 'The country is: '.$country;




//14
//Problem: Missing separate variables from literals
//Output: <p>You Win!</p>
function abc(){
    return"You WIN!";
}
echo "<p>Result:".abc()."</p>";




//15
//Problem: Missing separate variables from literals
//Expected output: Error 6
$size=strlen("error");             
$message='Error'.$size;



//16
//Problem: Missing quotes
$salutation='Good morning'; 
echo $salutation;



//17
//Problem: Remove quotes
//Output : Display Quebec
const PROVINCE="Quebec";
echo PROVINCE; 




//18
//Problem: Change the format of the value assigned to the constant
//Problem: Remove $ before the name of the constant  
//Create a constant
define("POND_FINSESSION",0.40);
$noteFinSessionSur100=95;
$noteFinSessionSur40=$noteFinSessionSur100 * POND_FINSESSION;
echo $noteFinSessionSur40;



//19
//Problem: Missing () after the user-defined function name
function whatDate() { 
date_default_timezone_set('America/Toronto'); 
return getDate()['weekday'];
}



//20
//Problem: Missing quote before and after the associative key
echo $message['message']; 
