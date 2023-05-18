<!--class3e.php-->
<!--Using GET-->
<!DOCTYPE html>
<html>  
  <head>
    <title>HTML Embedded Form with echo and \</title>
    <style>
      .form{color:blue;}
      .formhandling{color:red;}
      .display-name{color:green;}
    </style>
  </head>
  <body>
    <?php					
      echo "<h1>HTML Embedded Form with echo and \</h1>";
      echo "<h2>Display both <span class=\"form\">Form</span> and <span class=\"formhandling\">Form Handling</span> in the same page</h2>";
      echo "<hr>";
      echo "<h3>Input your name I'll display it</h3>";
      //Form 
      echo "<form id=\"form1\" method=\"get\" action=\"class3e\" >"; //Beginning form tag
          // Form fields to input data
          echo "<label for=\"inputfname\">Enter your First Name</label>"; 
          echo "<br />";
          echo "<input id=\"inputfname\" type=\"text\" name=\"fname\" placeholder=\"your first name\" required=\"required\">"; 
          echo "<br />";
          echo "<label for=\"inputlname\">Enter your Last Name</label>"; 
          echo "<br />";
          echo "<input id=\"inputlname\" type=\"text\" name=\"lname\" placeholder=\"your last name\" required=\"required\">"; 
          echo "<br />";
          // Submit button to send form data		
          echo "<input id=\"submitbutton1\" type=\"submit\" name=\"send\" value=\"SEND IT\" />"; 
      echo "</form>"; //Closing form tag
      //Form Handling
      //Go below only after a user pressed the input button name="send" 
      if (isset($_GET['send'])) {
        //Assign to the php variable $firstname the data collected from the the input field form name="fname"  
        $firstName = $_GET["fname"]; 
        //Assign to the php variable $firstname the data collected from the the input field form name="lname"
        $lastName = $_GET["lname"]; // index to find the values submitted in the input field form name="quantity"
        //Display the data saved in the php variables 
        echo"<h2 class=\"display-name\">Your name is : $firstName $lastName.</h2>";
        echo"<h2 class=\"display-name\">Congratulation, it is beautiful!</h2>";    
      }
    ?>
  </body>
</html>












