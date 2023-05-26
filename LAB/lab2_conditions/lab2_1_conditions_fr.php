<?php
//lab2_1_conditions_fr.php
echo "<h1>Saisissez un nombre positif<br>
Je vous dirai s'il est un multiple de 2 et/ou 3 ou pas</h1>";
?>
<html>

<head>
    <title>PHP Form Upload</title>
</head>

<body>
    <form id="form1" method="post" action="<?php echo $_SERVER['SCRIPT_NAME']; ?>">
        <label for="inputtext1">NOMBRE POSITIF </label>
        <br /><br />
        <input id="inputtext1" type="number" name="user_type" required>
        <br /><br /><br />
        <input id="inputsubmit1" type="submit" name="submit" value="SUBMIT" />
    </form>
    <?php

    if (isset($_POST['submit'])) {
        $input_number = $_POST["user_type"];

        if ($input_number < 0)
            echo "<p>Erreur! SVP Entrez un nombre POSITIF!</p>";
        elseif ($input_number % 2 == 0 and $input_number % 3 == 0)
            echo "<p><b>$input_number</b> est un multiple de 2 et 3</p>";
        elseif ($input_number % 2 == 0)
            echo "<p><b>$input_number</b> est un multiple de 2</p>";
        elseif ($input_number % 3 == 0)
            echo "<p><b>$input_number</b> est un multiple de 3</p>";
        else
            echo "<p><b>$input_number</b> n'est ni un multiple de 2 ni un multiple de 3</p>";
    }
    ?>
    <p><a href="<?php echo $_SERVER['SCRIPT_NAME']; ?>">Essayez encore!</a></p>
</body>

</html>