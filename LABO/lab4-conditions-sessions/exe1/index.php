<?php

/**
 *index.php
 *Lab 4 Exercice 1 
 *Structures de controle conditionnelles - Session PHP - Gestion de formulaire
 *Patrick Saint-Louis, 2026
 */
?>

<!DOCTYPE html>
<html lang="fr">

<head>
    <title>Lab 4 - Exe 1 - Entrées</title>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <style>
        * {
            font-family: Tahoma, Verdana, Geneva;
            color: #000000;
        }

        h1 {
            color: blue;
        }

        header,
        article,
        footer {
            text-align: center;
        }

        article {
            width: 50%;
            border-radius: 6px;
            margin: 15px auto 5px auto;
            padding: 2% 2% 2% 2%;
            border: 1px solid black;
            text-align: center;
        }

        footer {
            position: fixed;
            bottom: 0;
            width: 100%;
            height: auto;
        }

        #input2_form1 {
            margin-top: 5%;
        }
    </style>
</head>

<body>

    <header>
        <h1 class="header">Comparateur de valeurs numériques</h1>
    </header>

    <article>
        <div>
            <!--Collecter les données : Formulaire-->
            <form id="form1" method="POST" action="calcul.php">
                <fieldset>
                    <legend>Formulaire de saisie</legend>
                    <h2 class="article">Calculer le Type et le Signe d'une valeur numérique.</h2>
                    <!--Form fields to input data-->
                    <label for="input1_form1">Chiffre ou Nombre</label>
                    <input id="input1_form1" type="text" name="ipt-text-entrée-form1" />

                    <!--Submit button to send form data-->
                    <input id="input2_form1" type="submit" name="ipt-submit-form1" value="CALCULER" />
                </fieldset>
            </form>
        </div>
    </article>

    <footer>
        <p class="footer">&copy;<?php echo getdate()['year']; ?> Tous droits réservés.</p>
    </footer>

</body>

</html>