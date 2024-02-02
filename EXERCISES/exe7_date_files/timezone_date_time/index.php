<!DOCTYPE html>
<html>

<head>
    <title>Data Collection</title>
</head>

<body>

    <h1>Send your Timezone to see the current Date and Time</h1>
    <!--1-Collect input data-->
    <form method="post" action="<?php echo $_SERVER['SCRIPT_NAME']; ?>">

        <label for="continent">Continent:</label>
        <select id="continent" name="user-continent" required />
        <option></option>
        <option>Africa</option>
        <option>America</option>
        <option>Antarctica</option>
        <option>Arctic</option>
        <option>Asia</option>
        <option>Atlantic</option>
        <option>Australia</option>
        <option>Europe</option>
        <option>Indian</option>
        <option>Pacific</option>
        </select>

        <label for="city">City:</label>
        <input type="text" name="user-city" required />

        <input type="submit" name="send-button" value="SEND" />

    </form>

    <?php
    if (isset($_POST["send-button"])) {

        //Declare variables and assign values
        $msg['continent'] = 'Timezone Continent :';
        $msg['city'] = 'Timezone City :';

        //2- Collect and Transform input data 
        //Write the user timezone in the format 'Africa/Abidjan'
        $userContinent = $_POST["user-continent"];
        $userCity = $_POST["user-city"];
        $userTimezone = $userContinent . '/' . $userCity;

        //3-Validate input data 
        if (in_array($userTimezone, timezone_identifiers_list()))
            $validatedTimezone = $userTimezone;
        else{
            //Declare variables and assign values
            $msg['error'] = 'Invalid Timezone. Try again!';
        }

        //4-Calculate output data 
        if (isset($validatedTimezone)) {
            date_default_timezone_set($validatedTimezone);
            $objetDatTim = new DateTime;
            $currentDateTime = $objetDatTim->format("l F d, Y - H:i:s");

            //Declare variables and assign values
            $msg['datetime'] = 'Current Date and Time : ';
        }

        //5-Display output data
        echo '<p>' . $msg['continent'] . $userContinent . '</p>';
        echo '<p>' . $msg['city'] . $userCity . '</p>';
        echo isset($validatedTimezone) ? '<p><b>' . $msg['datetime'] . $currentDateTime . '</b></p>' : '<p><b>' . $msg['error'] . '</b></p>';
    }
    ?>

</body>

</html>
