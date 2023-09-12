<?php

//1
/*echo'declarer un object et passer des arguments'*/
echo'declarer un object et passer des arguments';


//2
/*Je suis un commentaire de style shell 
echo'un commentaire de type shell est placé sur une seule ligne';*/
#Je suis un commentaire de style shell 
echo'un commentaire de type shell est placé sur une seule ligne';


//3
/*
Programme PHP
@auteur : PSL
@date : 2023-12-09
Echo "C’est mon premier programme PHP"; */
/*Programme PHP
@auteur : PSL
@date : 2023-12-09*/
Echo "C’est mon premier programme PHP";



//4
//Garde les 2 lignes de code ci-dessous svp 
/*echo'c’est tellement 
beau de partager*/ 
echo'c’est tellement 
beau de partager'; 



//5
/*Je suis un commentaire de style C++
echo'un commentaire de type C++ est placé sur une seule ligne';*/
//Je suis un commentaire de style C++
echo'un commentaire de type C++ est placé sur une seule ligne';



//6
/*Declarer et assigner des valeurs 
/*$class=(54%3)/2;
echo $variableMessage='attention'; */
$class=(54%3)/2;
echo $variableMessage='attention';



//7
/*$Name='Sonic';
$msg="Bonjour $name";*/
$Name='Sonic';
$msg="Bonjour $Name";




//8
/*if ($brand='pas de marque') echo "pas de marque";*/
if ($brand=='pas de marque') echo "pas de marque";



//9
//$floor='floor 5'; $msg='Alerte pour $floor';
//Expected Output : Alerte pour floor 5 
$floor='floor 5'; $msg="Alerte pour $floor";
//Expected Output : Alerte pour floor 5 



//10
/*echo 'I'm always happy in my parent's house';*/
echo "I'm always happy in my parent's house";
echo 'I\'m always happy in my parent\'s house';




//11
/* $control='ready';
echo "control=$Control"; */
$control='ready';
echo "control=$control";



//12
/*echo "<p><a href="index.php">NOS SERVICES</a></p>";*/
echo '<p><a href="index.php">NOS SERVICES</a></p>';
echo "<p><a href='index.php'>NOS SERVICES</a></p>";
echo "<p><a href=\"index.php\">NOS SERVICES</a></p>";



//13
/* echo 'Addresse : '$address; */
echo 'Addresse : '.$address;



//14
/* $string=2;
if ($string=2||$string=>4) $down+=1;*/
$string=2;
if ($string==2||$string>=4) $down+=1;




//15
/* echo $message[message]; */
echo $message['message'];
echo $message["message"];




//16
/* function whatDate { 
date_default_timezone_set('America/Toronto'); 
return getDate()['weekday'];
} */
function whatDate (){ 
    date_default_timezone_set('America/Toronto'); 
    return getDate()['weekday'];
}




//17
/* $arr =["Lundi", 23, "avril"]; 
echo $arr[1]." ".$arr[2]." ".$arr[3]; 
//Expected Output : Lundi 23 avril 
 */
$arr =["Lundi", 23, "avril"]; 
echo $arr[0]." ".$arr[1]." ".$arr[2]; 
//Expected Output : Lundi 23 avril 



//18
//Créer une constante
/* define("POND_FINSESSION",40%);
$noteFinSessionSur40=$noteFinSessionSur100*POND_FINSESSION;
echo $noteFinSessionSur40; */
//Créer une constante
define("POND_FINSESSION",0.4);
$noteFinSessionSur40=$noteFinSessionSur100*POND_FINSESSION;
echo $noteFinSessionSur40;


//19
/* $salutation=Bon matin;echo $salutation; */
$salutation='Bon matin';echo $salutation;
$salutation="Bon matin";echo $salutation;




//20
/* $size=strlen("erreur");             
$message='Erreur $size';
//Sortie attendue: Erreur 6 
 */
$size=strlen("erreur");             
$message="Erreur $size";
//Sortie attendue: Erreur 6 
