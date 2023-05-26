<?php
//lab2_2_conditions_fr.php
echo "<h1>Entrez 3 nombres differents<br>
Je les afficherai en du plus petit au plus grand</h1>";
?>
<html>

<head>
    <title>PHP Form Upload</title>
</head>

<body>
    <form id="form1" method="post" action="<?php echo $_SERVER['SCRIPT_NAME']; ?>">
        <label for="givevalue">1e NOMBRE </label>
        <br /><br />
        <input id="inputtext1" type="number" name="user_type1" required>
        <br /><br />
        <label for="givevalue">2e NOMBRE (different du 1e NOMBRE) </label>
        <br /><br />
        <input id="inputtext2" type="number" name="user_type2" required>
        <br /><br />
        <label for="givevalue">3e NOMBRE (different des 1e et 2e NOMBRES)</label>
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
        echo "<p>Vous avez entré les nombres " . $input_numbera . " , " . $input_numberb . " et " . $input_numberc . "</p>";
        if ($input_numbera < $input_numberb and $input_numberb < $input_numberc)
            echo "<p>Vos nombres en ordre croissant sont : <b>$input_numbera, $input_numberb, $input_numberc</b></p>";
        elseif ($input_numbera < $input_numberc and $input_numbera < $input_numberb and $input_numberc < $input_numberb)
            echo "<p>Vos nombres en ordre croissant sont : <b>$input_numbera, $input_numberc, $input_numberb</b></p>";
        elseif ($input_numberb < $input_numbera and $input_numbera < $input_numberc)
            echo "<p>Vos nombres en ordre croissant sont : <b>$input_numberb, $input_numbera, $input_numberc</b></p>";
        elseif ($input_numberb < $input_numberc and $input_numberb < $input_numbera and $input_numberc < $input_numbera)
            echo "<p>Vos nombres en ordre croissant sont : <b>$input_numberb, $input_numberc, $input_numbera</b></p>";
        elseif ($input_numberc < $input_numbera and $input_numbera < $input_numberb)
            echo "<p>Vos nombres en ordre croissant sont : <b>$input_numberc, $input_numbera, $input_numberb</b></p>";
        elseif ($input_numberc < $input_numberb and $input_numberc < $input_numbera and $input_numberb < $input_numbera)
            echo "<p>Vos nombres en ordre croissant sont : <b>$input_numberc, $input_numberb, $input_numbera</b></p>";
        else
            echo "<p><b>$input_numbera, $input_numberb, $input_numberc</b> ne sont pas 3 nombres differents!</p>";
    }
    ?>
    <p><a href="<?php echo $_SERVER['SCRIPT_NAME']; ?>">Essayez encore!</a></p>
</body>

</html>