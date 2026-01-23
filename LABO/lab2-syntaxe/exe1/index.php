<!DOCTYPE html>
<html lang="fr">

<head>
    <title>Lab2-Exe1-Syntaxe de base</title>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>

<body>

    <?php
    //Code 1
    #Je suis un commentaire de style shell 
    echo 'un commentaire de type shell est placé sur une seule ligne';

    #-----------------------------------------------------------------

    //Code 2
    echo 'déclarer un objet et passer des arguments';

    #-----------------------------------------------------------------

    //Code 3
    /*
    Programme PHP
    @auteur : PSL
    @date : 2023-12-09
    */
    echo "C’est mon premier programme PHP";

    #-----------------------------------------------------------------

    //Code 4
    echo "c’est tellement beau de partager";

    #-----------------------------------------------------------------

    //Code 5
    $nb1 = 99 * 99;
    echo $nb1;

    #-----------------------------------------------------------------

    //Code 6
    include("fichier_inexistant.php");

    #-----------------------------------------------------------------

    //Code 7
    $name = 'Sonic';
    $msg = 'Bonjour' . $name;
    //Afficher "Bonjour Sonic"
    echo $msg;

    #-----------------------------------------------------------------

    //Code 8
    $image = 'canada.gif';
    //Afficher une image .gif 
    echo '<img src="' . $image . '">';

    #-----------------------------------------------------------------

    //Code 9
    $messages['success'] = "Félicitations!";
    $countSuccess = " 5 étoiles!";
    //Sortie escompté: Félicitations! 5 étoiles!
    echo "<p>" . $messages['success'] . $countSuccess . "</p>";

    #-----------------------------------------------------------------

    //Code 10
    echo 'I\'m always happy in my parent\'s house';
    echo "I'm always happy in my parent's house";

    #-----------------------------------------------------------------

    //Code 11
    $control1 = "À vos marques!";
    $control2 = 'Prêt!';
    $control3 = "Partez!";
    //Afficher les données d'une variable
    echo 'statut = ' . $control2;

    #-----------------------------------------------------------------

    //Code 12
    echo "<p><a href=\"index.php\">NOS SERVICES</a></p>";
    echo '<p><a href="index.php">NOS SERVICES</a></p>';

    #-----------------------------------------------------------------

    //Code 13
    $address = 'Montréal, Québec';
    echo 'Addresse : ' . $address;

    #-----------------------------------------------------------------

    //Code 14
    function abc()
    {
        return "You WIN!";
    }
    //Afficher le texte « Resultat:You WIN! »
    echo "<p>Resultat: " . abc() . "</p>";

    #-----------------------------------------------------------------

    //Code 15
    if (isset($message)) {
        echo $message['message'];
    }

    #-----------------------------------------------------------------

    //Code 16
    function whatDate()
    {
        date_default_timezone_set('America/Toronto');
        return getDate()['weekday'];
    }

    #-----------------------------------------------------------------

    //Code 17
    $arr = ["Lundi", 23, "avril"];
    echo $arr[0] . " " . $arr[1] . " " . $arr[2];
    //Sortie souhaitée : Lundi 23 avril 

    #-----------------------------------------------------------------

    //Code 18
    //Créer une constante
    $noteFinSessionSur100 = 30 + 30 + 30.50 + 7;
    define("POND_FINSESSION", 40 / 100);
    $noteFinSessionSur40 = $noteFinSessionSur100 * POND_FINSESSION;
    //Afficher note finale (ex: NOTE FINALE : 39/40)
    echo "NOTE FINALE : " . $noteFinSessionSur40 . "/40";

    #-----------------------------------------------------------------

    //Code 19
    $salutation = 'Bon matin';
    echo $salutation;

    #-----------------------------------------------------------------

    //Code 20
    function fonctionInconnue()
    {
        return "Je suis la fonction inconnue";
    }
    $resultat = fonctionInconnue();
    echo $resultat;

    ?>

</body>

</html>