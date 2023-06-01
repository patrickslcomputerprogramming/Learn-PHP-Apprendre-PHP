<?php

/**
 *exe6_4.php
 *EXERCISE 6 NUMBER 4
 *FORM 
 *Patrick Saint-Louis, 2023
 */

echo <<<_END
<!DOCTYPE html>
<html>  
  <head>
    <title>Question1</title>
    <style>
      .container{width:50%;border-radius:6px; margin-right:auto; margin-left:auto;text-align:center;}
      .bluetext{color:blue;}
    </style>
  </head>
  <body>			
   <div class="container"> 
      <h1 class="bluetext">How many inputs to display?</h1>
      <hr>
      <!--Form--> 
      <form id="form1" method="post" action="inputs.php" > 
        <label>
          How many people to register<br />
          <input type="number" name="userNbr" placeholder="digit or number" min="1" step="1" required="required"> 
        </label>		
        <input id="submitbutton1" type="submit" name="send1" value="SEND" />
      </form> 
    </div>
  </body>
</html>
_END;

?>












