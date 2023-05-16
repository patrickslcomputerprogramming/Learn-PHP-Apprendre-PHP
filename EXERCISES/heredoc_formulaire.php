<?php
//Heredoc Operator-Opérateur Heredoc

echo <<<_END
<!DOCTYPE html>
<html>  
  <head>
    <title>PHP Form with Heredoc Operator</title>
    <style>
      .form{color:blue;}
      .formhandling{color:red;}
      .display-name{color:green;}
      label, input {display:block;}
    </style>
  </head>
  <body>            
    <h1>PHP Form with Heredoc Operator</h1>
    <h2>Display <span class="form">Form</span> first and <span class="formhandling">Form Handling</span> next</h2>
    <hr>
    <!--Form--> 
    <form id="form1" method="post" action="class3c.php" > 
      <!--Form fields to input data-->
      <label for="inputfname">First Name | Prénom</label> 
      <input id="inputfname" type="text" name="fname" placeholder="John" required="required"> 
      <label for="inputlname">Last Name | Nom</label> 
      <input id="inputlname" type="text" name="lname" placeholder="Doe" required="required"> 
      <!--Submit button to send form data-->        
      <input id="submitbutton1" type="submit" name="send" value="SEND" />
    </form> 
  </body>
</html>
_END;
