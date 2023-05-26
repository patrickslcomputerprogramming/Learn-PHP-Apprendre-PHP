<?php
//lab2_2_conditions.php
echo "<h1>This program will invite you to type 3 different numbers <br>in order to display them in ascending order</h1>";
?>
<html>

<head>
    <title>PHP Form Upload</title>
</head>

<body>
    <form id="form1" method="post" action="<?php echo $_SERVER['SCRIPT_NAME']; ?>">
        <label for="givevalue">1st NUMBER </label>
        <br /><br />
        <input id="inputtext1" type="number" name="user_type1" required>
        <br /><br />
        <label for="givevalue">2nd NUMBER (different than the 1st NUMBER) </label>
        <br /><br />
        <input id="inputtext2" type="number" name="user_type2" required>
        <br /><br />
        <label for="givevalue">3rd NUMBER (different than the 1st and 2nd NUMBERS)</label>
        <br /><br />
        <input id="inputtext3" type="number" name="user_type3" required>
        <br /><br /><br />
        <input id="inputsubmit1" type="submit" name="submit" value="SUBMIT" />
    </form>

    <?php
    if (isset($_POST['submit'])) {
        $input_numbera = $_POST["user_type1"];
        $input_numberb = $_POST["user_type2"];
        $input_numberc = $_POST["user_type3"];
        echo "<p>You wrote the numbers " . $input_numbera . " , " . $input_numberb . " and " . $input_numberc . "</p>";
        if ($input_numbera < $input_numberb and $input_numberb < $input_numberc)
            echo "<p>Your numbers in acending order : <b>$input_numbera, $input_numberb, $input_numberc</b></p>";
        elseif ($input_numbera < $input_numberc and $input_numbera < $input_numberb and $input_numberc < $input_numberb)
            echo "<p>Your numbers in acending order : <b>$input_numbera, $input_numberc, $input_numberb</b></p>";
        elseif ($input_numberb < $input_numbera and $input_numbera < $input_numberc)
            echo "<p>Your numbers in acending order : <b>$input_numberb, $input_numbera, $input_numberc</b></p>";
        elseif ($input_numberb < $input_numberc and $input_numberb < $input_numbera and $input_numberc < $input_numbera)
            echo "<p>Your numbers in acending order : <b>$input_numberb, $input_numberc, $input_numbera</b></p>";
        elseif ($input_numberc < $input_numbera and $input_numbera < $input_numberb)
            echo "<p>Your numbers in acending order : <b>$input_numberc, $input_numbera, $input_numberb</b></p>";
        elseif ($input_numberc < $input_numberb and $input_numberc < $input_numbera and $input_numberb < $input_numbera)
            echo "<p>Your numbers in acending order : <b>$input_numberc, $input_numberb, $input_numbera</b></p>";
        else
            echo "<p><b>$input_numbera, $input_numberb, $input_numberc</b> are not 3 different numbers!</p>";
    }
    ?>
    <p><a href="<?php echo $_SERVER['SCRIPT_NAME']; ?>">Try again!</a></p>
</body>

</html>