<?php
//class3c.php
echo <<<_END
<!DOCTYPE html>
<html>  
  <head>
    <title>PHP Form with Heredoc Operator</title>
    <style>
      .form{color:blue;}
      .formhandling{color:red;}
      .display-name{color:green;}
    </style>
  </head>
  <body>			
    <h1>HTML Form and PHP Form Handling</h1>
    <h2>Display <span class="form">Form</span> first and <span class="formhandling">Form Handling</span> next in different pages</h2>
    <hr>
    <h3>Input your name I'll display it</h3>
    <!--Form--> 
    <form id="form1" method="post" action="class3c.php" > <!--Beginning form tag-->
      <!--Form fields to input data-->
      <label for="inputfname">Enter your First Name</label> 
      <br />
      <input id="inputfname" type="text" name="fname" placeholder="your first name" required="required"> 
      <br />
      <label for="inputlname">Enter your Last Name</label> 
      <br />
      <input id="inputlname" type="text" name="lname" placeholder="your last name" required="required"> 
      <br />
      <!--Submit button to send form data-->		
      <input id="submitbutton1" type="submit" name="send" value="SEND IT" />
    </form> <!--Closing form tag-->
_END;
      //Form Handling
      //Go below only after a user pressed the input button name="send" 
      if (isset($_POST['send'])) {
        //Assign to the php variable $firstname the data collected from the the input field form name="fname"  
        $firstName = $_POST["fname"]; 
        //Assign to the php variable $firstname the data collected from the the input field form name="lname"
        $lastName = $_POST["lname"]; // index to find the values submitted in the input field form name="quantity"
        //Display the data saved in the php variables 
        echo"<h2 class=\"display-name\">Your name is : $firstName $lastName.</h2>";
        echo"<h2 class=\"display-name\">Congratulations, it is beautiful!</h2>";    
      }  
echo <<<_END
  </body>
</html>
_END;
?>












