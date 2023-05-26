<?php
//lab2_1_conditions.php
echo "<h1>This program will invite you to type a positive number<br>
in order to display whether it is a multiple of 2 or 3</h1>";
?>
<html>

<head>
    <title>PHP Form Upload</title>
</head>

<body>
    <form id="form1" method="post" action="<?php echo $_SERVER['SCRIPT_NAME']; ?>">
        <label for="inputtext1">Enter a POSITIVE NUMBER </label>
        <br /><br />
        <input id="inputtext1" type="number" name="user_type" required>
        <br /><br /><br />
        <input id="inputsubmit1" type="submit" name="submit" value="SUBMIT" />
    </form>
    <?php

    if (isset($_POST['submit'])) {
        $input_number = $_POST["user_type"];

        if ($input_number < 0)
            echo "<p>Please, enter a POSITIVE NUMBER!</p>";
        elseif ($input_number % 2 == 0 and $input_number % 3 == 0)
            echo "<p><b>$input_number</b> is a multiple of both 2 and 3</p>";
        elseif ($input_number % 2 == 0)
            echo "<p><b>$input_number</b> is a multiple of 2</p>";
        elseif ($input_number % 3 == 0)
            echo "<p><b>$input_number</b> is a multiple of 3</p>";
        else
            echo "<p><b>$input_number</b> is neither a multiple of 2 nor 3</p>";
    }
    ?>
    <p><a href="<?php echo $_SERVER['SCRIPT_NAME']; ?>">Try again!</a></p>
</body>

</html>