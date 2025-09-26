<!DOCTYPE html>
<html lang="en">
<head>
    <title>Form to identify a user</title>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>
<body>
<!--Form--> 
<form id="form1" method="post" action="class3a_response.php" > 
  <!--Form fields to input data-->
  <label for="inputfname">Prénom|First name</label> 
  <input id="inputfname" type="text" name="fname" placeholder="John" required>  
  <label for="inputlname">Nom|Last Name</label> 
  <input id="inputlname" type="text" name="lname" placeholder="Doe" required>  
  <!--Submit button to send form data-->
  <input id="submitform1" type="submit" name="send" value="SEND" />
</form> 
</body>
</html>

<?php
/*
Answer the questions below by referring to only the HTML code 
that must be configured in order to access the data submitted 
within a PHP script.
*/

/*
1-	For each of the necessary HTML elements (e.g. form, input), 
write below all the attributes that are essential to be configured, 
and explain why. 

For example, the attribute “method” must be configured 
because it indicates which PHP super global variable, 
between $__POST and $__GET, stored the data submitted from the HTML form. 
*/

/*
In :
<form id="form1" method="post" action="class3a_response.php" > 
1-The attribute “method” must be configured 
because it indicates which PHP super global variable, 
between $__POST and $__GET, stored the data submitted from the HTML form.
2-The attribute “action” must be configured 
because it indicates which file is requested (executed or opened) when 
the HTML form is submitted.

In: 
<input id="inputfname" type="text" name="fname" placeholder="John" required>  
<input id="inputlname" type="text" name="lname" placeholder="Doe" required> 
<input id="submitform1" type="submit" name="send" value="SEND" />
1-The attribute “name” must be configured 
because it indicates which text to be used as associative key 
of the super global variable, $__POST, $__GET, or $__REQUEST,
to access the data stored the data submitted from the HTML form.
*/

/*2-	Write below the name of the PHP file that will be opened 
when the user submits the form. 
*/
/* "class3a_response.php" because 
<form id="form1" method="post" action="class3a_response.php" > 
*/

/*3-	Write below the code to use in the PHP script that will 
be opened when the user submits the form to test whether the user 
has submitted the form, using the value of the input element of type submit.
*/
//if (isset($_POST['send'])) {


/*4-	Write below the code to use in the PHP script that will 
be opened when the user submits the form to store the first name 
and then the last name submitted in the form in 2 PHP variables.
*/

/*
    $firstName = $_POST["fname"]; 
    $lastName = $_POST["lname"]; 
*/

/*5-	Write below the data (text) that will be submitted via 
the input element of type submit when the user submits the form; 
*/

/*
"SEND" because : 
<input id="submitform1" type="submit" name="send" value="SEND" />
*/


/*6-	Instead of the superglobal variable $_POST, write below 
the name of 2 another superglobal variable that can be used in 
the form handling PHP script to retrieve the data submitted from 
the form, and explain when.
*/
// $_GET and $_REQUEST


/*7-	Create the code in the PHP script to receive 
and display the data collected.
*/

//If the form is submitted
if (isset($_POST['send'])) {
    //Save the data collected from the form 
    $firstName = $_POST["fname"]; 
    $lastName = $_POST["lname"];  
    //Display data
    echo"<h2>Prénom|First Name : " . $firstName ."</h2> ";
    echo"<h2>Nom|Last Name : " . $lastName ."</h2> ";   
}