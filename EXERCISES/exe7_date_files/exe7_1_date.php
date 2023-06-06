<?php
/**
 *exe7_1.php
 *EXERCISE 7 NUMBER 1
 *FORM & FORM HANDLING
 *Patrick Saint-Louis, 2023
 */
?>
<?php
    // if the form is not yet submitted display the form
    if (!isset($_POST['send-button'])) 
    {
?>
<!DOCTYPE html>
<html>
    <head>
        <title>Question?</title>
    </head>
    <body>
        <h1>Show Date and Time | Afficher Date et Heure</h1>
        <form method="post" action="<?php echo $_SERVER['SCRIPT_NAME']; ?>">
            
            <label>
                <p>TimeZone|Fuseau Horaire</p>
                <p>Ex: America/Montreal</p>
                <input type="text" name="user-zone" required />
            </label>
        
            <input type="submit" name="send-button" value="SEND|ENVOYER" />

        </form>
    </body>
</html>

<?php
    // if form is submitted process form input
    } else {
?>

<!DOCTYPE html>
<html>  
<head>
<title>Answer!</title>
    
</head>
  <body>			
  <?php

    //Assign the info collected from the form
    $zone=$_POST['user-zone'];

    //Declare the URL of the page for Back links
    $thisPageURL=$_SERVER['SCRIPT_NAME'];

    //Validation
    //Check whether the info collected corresponds to a supported PHP TimeZone 
    //Create a DateTimeZone object of the class DateTimeZone if the info collected corresponds to a PHP TimeZone
    //Stop the script with error message if it is not a supported PHP TimeZone 
    try {
        $timeZone=new DateTimeZone($zone);
    }
    catch (Exception $e){
        echo "<p> Zone : $zone </p>";
        die("<p>Invalide Zone|Zone Invalide. <a href='$thisPageURL'>Try Again!|Essayez Encore!</a> </p><br/>" . $e->getMessage());
    }

    //The section below will be executed only when the the info collected corresponds to a supported PHP TimeZone    
    //Define the date format, including customized characters such as - and :
    $format="M d,Y ─ h:i:s a";
    //Create an object of the class DateTime that calculates date and time 
    $currentDate = new DateTime(); 
    //Define the TimeZone via the method setTimezone 
    $currentDate->setTimezone($timeZone);
    //Convert the UNIX timestamp of now to the date format specified
    $currentDateFormatted = $currentDate->format($format);

    //Display outputs
    echo "<p> Zone : $zone </p>";
    echo "<p> Date : $currentDateFormatted </p>";
    echo "<a href='$thisPageURL'>Try Again!</a>";
?>

</body>
</html>

<?php
    }
?>
