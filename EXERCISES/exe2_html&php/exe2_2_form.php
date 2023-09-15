<?php
    //Formulaire
    $label='Full Name';
    $unm='John Doe';
    $check['userOrpass']='Accept only A-Z';
?>
<!DOCTYPE html>
<html>

<head></head>

<body>
    <!--Check the username-->
    <form id="check-u" method="post" action="checkUsername.php">
        <label for="i1"> <?php echo $label ?> </label>
        <input id="i1" type="text" name="un" value=" <?php  echo $unm ?> " required>
        <p class="err-msg"> <?php echo $check['userOrpass'] ?> </p>
        <button id="s1" type="submit" name="chu">Check</button>
        <?php echo"<p>&copy;". getdate()['year'] . "</p>" ; ?>
        <p>&copy; <?php echo getdate()['year'] ?> </p>
    </form>
</body>

</html>