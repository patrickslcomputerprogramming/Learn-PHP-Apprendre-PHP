<?php
/**
 *calcul.php
 *Lab 4 Exercice 1 
 *Structures de controle conditionnelles - Session PHP - Gestion de formulaire
 *Patrick Saint-Louis, 2026
 */

//Accéder à la session PHP en cours 
session_start();

if (isset($_SESSION['erreur-donnée-absente']) || isset($_SESSION['donnée_entrée'])) {
    //Si le calcul est pas encore effectué dans calcul.php, afficher les résultats
?>

    <!DOCTYPE html>
    <html lang="fr">

    <head>
        <title>Lab 4 - Exe 1 - Sorties</title>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
		<style type="text/css">
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
			}

			h1 {
            	color: blue;
        	}
		</style>
    </head>

    <body>

    <header id="header">
            <h1 class="header">Comparateur de valeurs numériques</h1>
        </header>

        <article id="article">
            <div>
                <!--Afficher les résultats-->
                <?php
                //Afficher les résultats
                if (isset($_SESSION['erreur-donnée-absente'])) {
                    //Si un formulaire avec un champ de saisie vide est soumis 
                    echo "<strong><p style = 'color: red'>" . $_SESSION['erreur-donnée-absente'] . "</strong></p>";
                } else {
                    //Si un formulaire avec un champ de saisie rempli est soumis
                    echo "<p>Vous avez entré <b>" . $_SESSION['donnée_entrée'] . "</b>.</p>";
                    if (isset($_SESSION['erreur-donnée-incorrecte'])) {
                        //Si le champs du formulaire soumis contient une donnée alphanumérique
                        echo "<p style = 'color: red'>" . $_SESSION['erreur-donnée-incorrecte'] . "</p>";
                    } else {
                        //Si le champs du formulaire soumis contient une donnée numérique
                        echo $_SESSION['donnée_entrée'] . "</b> est un <b>" . $_SESSION['type_donnée'] . "</b> <b>" . $_SESSION['signe_donnée'] . "</b></p>";
                    }
                }

                //Fermer la session actuelle
                session_unset(); //Supprimer toutes les variables $_SESSION
                session_destroy(); //Arrêter la session actuelle
                ?>

                <!--Afficher un lien vers la page d'acceuil-->
                <button class="backlink"><a href="index.php">RÉESSAYER</a></button>
            </div>
        </article>

        <footer id="footer">
            <p class="footer">&copy;<?php echo getdate()['year']; ?> Tous droits réservés.</p>
        </footer>

    </body>

    </html>

<?php
} else {
    //Si le calcul n'est pas encore effectué dans calcul.php, redirriger le navigateur vers index.php
    header(header: 'Location: index.php');
    exit();
}
?>