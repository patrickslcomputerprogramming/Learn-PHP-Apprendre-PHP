<?php

/**
 *exe6_4.php
 *EXERCISE 6 NUMBER 4
 *FORM & FORM HANDLING
 *Patrick Saint-Louis, 2023
 */

if ((isset($_POST['send1']))) {
echo <<<_END
    <!DOCTYPE html>
    <html>  
    <head>
      <title>Answer1-Question2</title>
      <style>
        .container{width:50%;border-radius:6px; margin-right:auto; margin-left:auto;text-align:center;}
        .redtext{color:red;}
        th, td {border:1px solid #000000; color:blue;}
      </style>
    </head>
    <body>	
      <div class="container">		
        <h1 class="redtext">Registration form</h1>
        <hr>
_END;
        //Assign the data collected from the form to variable
        $user_number = $_POST["userNbr"]; 

        //Form 
        echo"<form id=\"form1\" method=\"get\" action=\"arrays.php\" >";  
          echo"<input type=\"hidden\" name=\"quantity\" value=\"$user_number\" />";	
          for ($i=0; $i<$user_number; $i++){
            $j=$i+1;
echo <<<_END
              <table>
                <caption>Register Person Number $j</caption> 
                <tr>
                    <th>
                        <label for="input1$j"><p>First Name</p></label>
                    </th>
                    <td>
                        <input id="input1$j" type="text" name="fName$j" placeholder="first name" required="required">
                    </td> 
                </tr>
                <tr>
                    <th>
                        <label for="input2$j"><p>Last Name</p></label>
                    </th>
                    <td>
                        <input id="input2$j" type="text" name="lName$j" placeholder="last name" required="required">
                    </td> 
                </tr>
                <tr>
                    <th>
                        <label for="input3$j"><p>Phone Number</p></label>
                    </th>
                    <td>
                        <input id="input3$j" type="phone" name="phoneN$j" placeholder="phone number" required="required">
                    </td> 
                </tr>
              </table>
_END;		    
          }
          echo"<input id=\"submitbutton1\" type=\"submit\" name=\"send2\" value=\"SEND\" />";	
        echo"</form>";  

echo <<<_END
        <a href="index.php">TryAgain</a>
    </div>
    </body>
  </html>
_END;
}

?>












