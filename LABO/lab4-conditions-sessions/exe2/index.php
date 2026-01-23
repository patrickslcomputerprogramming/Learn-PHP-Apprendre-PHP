<?php

/**
 *index.php
 *Lab 4 Exercice 2 
 *Structures de controle conditionnelles - Session PHP - Gestion de formulaire
 *Patrick Saint-Louis, 2026
 */
?>

<!DOCTYPE html>
<html lang="fr">

<head>
    <title>Lab 4 - Exe 2 - Entrées</title>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <style>
        * {
            font-family: Tahoma, Verdana, Geneva;
            color: #000000;
            text-align: center;
        }

        body {
            width: 70%;
            margin: 0 auto;
        }

        #header,
        #article,
        #footer {
            padding: 0.5em 0;
            overflow: auto;
        }

        #article {
            border: 1px solid black;
            border-radius: 6px;
            padding: 5% 25% 5% 25%;
        }

        h1 {
            color: blue;
        }

        input[type="submit" i] {
            margin-top: 5%;
        }
    </style>
</head>

<body>

    <header id="header">
        <h1 class="header">Calcul du type d'un triangle</h1>
    </header>

    <article id="article">
        <div>
            <!--Collecter les données : Formulaire-->
            <h2 class="article">Calculer le type d'un triangle en entrant la longueur de ses côtés.</h2>
            <form id="form1" method="GET" action="calcul.php">
                <fieldset>
                    <legend>Formulaire de saisie</legend>
                    <!--Champs de saisie pour entrer des données-->
                    <p>
                        <label for="input1_form1">Côté 1</label>
                        <input id="input1_form1" type="number" name="ipt1-cote1-form1">
                    </p>
                    <p>
                        <label for="input2_form1">Côté 2</label>
                        <input id=for="input2_form1" type="number" name="ipt2-cote2-form1">
                    </p>
                    <p>
                        <label for="input3_form1">Côté 3</label>
                        <input id="input3_form1" type="number" name="ipt3-cote3-form1">
                    </p>
                    <!--Champs pour soumettre le formulaire-->
                    <input type="submit" name="ipt4-submit-form1" value="CALCULER" />
                </fieldset>
            </form>
        </div>
    </article>

    <footer id="footer">
        <p class="footer">&copy;<?php echo getdate()['year']; ?> Tous droits réservés.</p>
    </footer>

</body>

</html>