<!DOCTYPE html>
<html>

<head>
    <title></title>
</head>

<body>
    <?php
    // if form not yet submitted display form
    if (!isset($_POST['submit'])) {
        ?>
        <h1>Enter a text a-z ou A-Z to see only its disctinct letters</h1>
        <form method="post" action="<?php echo $_SERVER['SCRIPT_NAME']; ?>">
            <label>Text:
                <input type="text" name="your_name" required />
            </label>
            <br /><br />
            <input type="submit" name="submit" value="Submit" />
        </form>
        <?php
        // if form submitted process form input
    } else {
        // retrieve number from POST submission
        $initialText = $_POST['your_name'];
        //Validation
        if (preg_match("/[^a-zA-Z]/", $initialText))
            echo "<p>Your text didn't include only a-z or A-Z</p>";
        else {
            // total number of characters
            $initialTextSize = strlen($initialText);
            // keep the same characters once
            $uniqCharsText = count_chars($initialText, 3);
            // total number of uniq characters
            $uniqCharsTextSize = strlen($uniqCharsText);
            // convert characters to upper
            $capitalUniqCharsText = strtoupper($uniqCharsText);

            $i = 1;
            echo "<p>Initial text: $initialText</p>";
            echo "<p>Total number of letters: $initialTextSize</p>";
            echo "Number of distinct letters: $uniqCharsTextSize</p>";
            echo "Distint letters shown as HTML list elements:</p>";

            echo "<ul>";
            for ($x = 0; $x < $uniqCharsTextSize; $x++) {
                echo "<li>Lettre $i : $capitalUniqCharsText[$x]</li>";
                $i++;
            }
            echo "</ul>";
        }
        echo'<a href="'.$_SERVER['SCRIPT_NAME'].'">Try again!</a>';
    }

    ?>
</body>

</html>