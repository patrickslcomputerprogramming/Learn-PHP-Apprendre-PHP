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
        <h1>Entrez votre texte a-z ou A-Z pour voir les lettres disctinctes</h1>
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
            echo "<p>Le texte doit inclure uniquement des lettres de l’alphabet de a à z ou A à Z</p>";
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
            echo "<p>Votre avez saisi le texte: $initialText</p>";
            echo "<p>Nombre total de caractères: $initialTextSize</p>";
            echo "Nombre de caractères distincts: $uniqCharsTextSize</p>";
            echo "Caractères distincts en majuscule affichés comme éléments de liste HTML:</p>";

            echo "<ul>";
            for ($x = 0; $x < $uniqCharsTextSize; $x++) {
                echo "<li>Lettre $i : $capitalUniqCharsText[$x]</li>";
                $i++;
            }
            echo "</ul>";
        }
        echo'<a href="'.$_SERVER['SCRIPT_NAME'].'">Essayez Encore!</a>';
    }

    ?>
</body>

</html>