<?php


//1
//echo'Declare an object and pass arguments'
echo'Declare an object and pass arguments';

echo "<br/>";

//2
#I'm a shell style comment 
echo'a shell comment is placed on a single line';

echo "<br/>";

//3
/*PHP Program
@auteur: PSL
@date: 2023-12-09*/
echo  "This is my first PHP program"; 



//4
//Please keep the 2 lines of code below 
/*echo'it's so 
beautiful to share*/
echo'it\'s so 
beautiful to share';

echo"it's so 
beautiful to share";


//5
//I'm a C++ style comment
echo'a C++ comment is placed on a single line';



//6
//Declare and assign values 
$class=(54%3)/2;




//7
//Output: Hello Sonic
$Name='Sonic';
//$msg='Hello $name';
$msg="Hello $Name";
//Separate literal from variables using concatenation
$msg='Hello '.$Name;  
echo $msg;




//8
$img='image.gif';
//echo '<img src="$name">'; //Don't work
//echo '<img src="$img">'; //Don't work
//echo '<img src=\'$img\'>'; //Don't work
echo "<img src='$img'>"; 
echo "<img src=\"$img\">";
//Separate literal from variables using concatenation
echo "<img src=".$img.">";



//9
$messages['success']="Congratulations!";
$countSuccess=" 5 stars!";
//Expected exit: Congratulations! 5 stars!
//echo "<p>$messages['success'] $countSuccess</p>";
echo "<p>{$messages['success']} $countSuccess</p>";
echo "<p>".$messages['success']." ".$countSuccess."</p>";



//10
//echo  'I'm always happy in my parent's house';
echo  'I\'m always happy in my parent\'s house';
echo  "I'm always happy in my parent's house";



//11
$control='ready';
//echo 'control=$Control';
echo "control=$control";
//Separate literal from variables using concatenation
echo 'control='.$control;



//12
//echo "<p><a href="index.php">OUR SERVICES</a></p>";
echo "<p><a href=\"index.php\">OUR SERVICES</a></p>";
echo "<p><a href='index.php'>OUR SERVICES</a></p>";


//13
//echo 'Address: '$address;
$address="";
echo 'Address: '.$address;




//14
function abc(){return"You WIN!";}
//echo "<p>Result: abc()</p>";
echo "<p>Result: ".abc()."</p>";




//15
$message['message']="";
//echo $message[message];
echo $message['message'];
echo $message["message"];



//16
//function whatDate { 
function whatDate (){ 
    date_default_timezone_set('America/Toronto'); 
    return getDate()['weekday'];
}




//17
$arr =["Monday", 23,  "April"]; 
//echo $arr[1]." ".$arr[2]." ".$arr[3]; 
echo $arr[0].", ".$arr[2]." ".$arr[1];
//Expected Output: Monday, April 23 



//18
//Create a constant
//define("POND_FINSESSION",40%);
define("POND_FINSESSION",0.4);
$noteFinSessionSur100=90;
$noteFinSessionSur40=$noteFinSessionSur100*POND_FINSESSION;
echo $noteFinSessionSur40;



//19
//$salutation=Good morning; echo $salutation;
$salutation='Good morning'; echo $salutation;
$salutation="Good morning"; echo $salutation;





//20
$size=strlen("error");             
//$message='Error $size';
$message="Error $size";
$message="Error ".$size;
//Expected output: Error 5 

