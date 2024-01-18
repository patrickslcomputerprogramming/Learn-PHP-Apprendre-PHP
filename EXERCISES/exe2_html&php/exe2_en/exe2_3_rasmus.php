<!DOCTYPE html>
<html>

<head>
    <title>Exe 3</title>
</head>

<body>
    <?php

    /*This is my first php program
    and my task is to
    display the full name  
    of the inventor of PHP
    */

    /* C’est mon premier programme php
    et ma tâche est
    d’afficher le nom complet  
    de l’inventeur de php */

    //First name of the inventor of php
    //Prénom de l’inventeur de php 
    $firstName = 'Rasmus';

    //Last name of the inventor of php
    //Nom de famille de l’inventeur de php 
    $lastName = "Lerdorf";

    //Full name of the inventor of php
    //Nom complet de l’inventeur de php
    $message = $firstName . " " . $lastName .
        " is the inventor of the PHP programming language";

    ?>

    <p><?php echo $message; ?></p>
</body>

</html>