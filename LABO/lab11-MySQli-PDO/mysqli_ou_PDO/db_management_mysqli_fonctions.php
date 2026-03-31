<?php

/**
 * Calcule et affiche le message d'erreur à afficher dans le bloc catch d'une structure try/catch/finally.
 * @param object $erreur
 * Objet de la classe accédée dans catch qui contient les messages d'erreur (ex. mysqli_sql_exception, PDOexception).
 */
function calculerCatch($erreur)
{
    //s'il y a une erreur 
    $msg_erreur['Personnalisé'] = "Quelque chose s'est mal passé ! Réessayez !";
    $msg_erreur['Message d\'erreur'] = $erreur->getMessage();
    $msg_erreur['Nom du fichier d\'erreur'] = $erreur->getFile();
    $msg_erreur['Numéro de ligne d\'erreur'] = $erreur->getLine();
    echo "<table>";
    foreach ($msg_erreur as $clef => $valeur) {
        echo "<tr>";
        echo "<td>" . $clef . "</td>";
        echo "<td>" . $valeur . "</td>";
        echo "</tr>";
    }
    echo "</tr></table>";
    return;
}

/**
 * Crée la structure d'une base de données et ses membres à partir du code SQL stocké dans un fichier externe.
 * @param string $fichier_sql
 * Chaine de caractères correspondant au chemin d'accès et nom du fichier SQL 
 */

function creerLaStructureDUneBD($fichier_sql)
{
    try {
        //-----------------------------------------------------------------
        //-------- FONCTIONNALITÉ 1 : CRÉER LA STRUCTURE DE LA BASE DE DONNÉES ET DE LA TABLE -----
        //-------- DÉFINITION DES DONNÉES ---
        //-----------------------------------------------------------------
        //1-CONNEXION AU SYSTÈME DE GESTION DE BASE DE DONNÉES (SGBD) MYSQL
        $connexion = new mysqli(hostname: HOSTNAME, username: USERNAME, password: PASSWORD);
        //2-CRÉER LA STRUCTURE DE LA BASE DE DONNÉES SI ELLE N'EXISTE PAS ENCORE EN UTILISANT LE CODE DANS UN FICHIER EXTERNE
        $connexion->multi_query(query: file_get_contents(filename: $fichier_sql));
        //3-DÉCONNEXION DU SYSTÈME DE GESTION DE BASE DE DONNÉES (SGBD) MYSQL
        $connexion->close();
        //Retourner true
        return true;
    } catch (mysqli_sql_exception $err) {
        //s'il y a une erreur 
        calculerCatch($err);  
        //Retourner false
        return false;
    }
}


/**
 * Ajoute une nouvelle ligne dans la table d'une base de données.
 * @param string $nom_bd
 * Chaine de caractères correspondant au nom de la base de données 
 * @param string $nom_table
 * Chaine de caractères correspondant au nom de la table de la base de données
 * @param string $requete_sql
 * Chaine de caractères correspondant au code SQL à exécuter pour ajouter une nouvelle ligne, sans les données
 * @param array $donnees_et_types
 * Chaine de caractères correspondant aux données à ajouter dans le code SQL à exécuter, pour ajouter une nouvelle ligne.
 */
function ajouterUneLigneDansUneTable($nom_bd, $nom_table, $requete_sql, $donnees_et_types)
{
    try {
        //-----------------------------------------------------------------
        //-------- FONCTIONNALITÉ 2 : INSÉRER 1 ENREGISTREMENT -----------------------------
        //-------- MISE À JOUR DES DONNÉES --------------------------
        //-----------------------------------------------------------------
        //1-CONNEXION AU SYSTÈME DE GESTION DE BASE DE DONNÉES (SGBD) MYSQL 
        $connexion = new mysqli(HOSTNAME, USERNAME, PASSWORD);
        //2-SÉLECTIONNER LA BASE DE DONNÉES
        $codeSQL = "USE " . $nom_bd;
        $connexion->query(query: $codeSQL);
        //3-VÉRIFIER SI LA TABLE EXISTE 
        $codeSQL = "DESC " . $nom_table;
        $connexion->query(query: $codeSQL);
        //4-INSÉRER UN ENREGISTREMENT DANS LA TABLE    
        /*
        //Instruction régulière
        $codeSQL = "INSERT INTO employes (prenom, nom, courriel) VALUES ('$lePrenom', '$leNom', '$leCourriel')";
        $connexion->query($codeSQL);
        */
        //Instruction préparée     
        $instructionPreparee = $connexion->prepare($requete_sql);

        //Creer la liste des types string
        $liste_type = str_repeat('s', count($donnees_et_types));

        //Preparer les variables pour les Instruction préparée 
        $params = [];
        $params[] = $liste_type;

        foreach ($donnees_et_types as $cle => $valeur) {
            //$instructionPreparee->bind_param($cle, $valeur); 
            $params[] = &$donnees_et_types[$cle];
        }

        //Appeler dynamiquement bind_parm avec le tableau
        call_user_func_array([$instructionPreparee, 'bind_param'], $params);

        $instructionPreparee->execute();
        //echo $instructionPreparee->affected_rows;
        //5-DÉCONNEXION DU SYSTÈME DE GESTION DE BASE DE DONNÉES (SGBD) MYSQL
        //Fermer l'objet instruction préparée
        $instructionPreparee->close();
        //Fermer l'objet mysql
        $connexion->close();
        //Retourner true
        return true;
    } catch (mysqli_sql_exception $err) {
        //s'il y a une erreur 
        calculerCatch($err);
        //Retourner false
        return false;
    }
}



function copierToutesLesLignesDUneTable($nom_bd, $nom_table, $requete_sql)
{
    try {
        //-----------------------------------------------------------------
        //-------- FONCTIONNALITÉ 3 : SÉLECTIONNER TOUS LES ENREGISTREMENTS ---------------
        //-------- RÉCUPÉRATION DES DONNÉES --------------------------
        //-------- AFFICHER LES ENREGISTREMENTS SÉLECTIONNÉS --------------------------
        //-----------------------------------------------------------------
        //1-CONNEXION AU SYSTÈME DE GESTION DE BASE DE DONNÉES (SGBD) MYSQL 
        $connexion = new mysqli(HOSTNAME, USERNAME, PASSWORD);
        //2-SÉLECTIONNER LA BASE DE DONNÉES
        $codeSQL = $nom_bd;
        $connexion->query(query: $codeSQL);
        //3-VÉRIFIER SI LA TABLE EXISTE 
        $codeSQL = $nom_table;
        $connexion->query(query: $codeSQL);
        //4-SÉLECTIONNER TOUS LES ENREGISTREMENTS EXISTANTS DANS LA TABLE ET LES AFFICHER
        $selectionEnregistrements = $connexion->query($requete_sql);
        //Utiliser une boucles imbriquées pour accéder aux enregistrements de la base de données
        $donnees = array();
        $i = 0;
        foreach ($selectionEnregistrements as $chaqueLigne) {
            foreach ($chaqueLigne as $nomColonne => $donneesColonne) {
                //Stocker les enregistrements dans une variable tableau
                $donnees[$i][$nomColonne] = $donneesColonne;
            }
            $i++;
        }
        //5-DÉCONNEXION DE L'ENSEMBLE DE RÉSULTATS ET DU SYSTÈME DE GESTION DE BASE DE DONNÉES (SGBD) MYSQL
        $selectionEnregistrements->close();
        $connexion->close();
        //Retourner les données récupérées dans la BD 
        return $donnees;
    } catch (mysqli_sql_exception $err) {
        //s'il y a une erreur 
        calculerCatch($err);
        //Retourner false
        return false;
    }
}


function afficherVariableTableau2D($variable_tableau)
{
    //Affiche le message d'erreur s'il y en a 
    if (empty($variable_tableau)) {
        echo "Aucune données n'est présentement enregistré dans la Base de Données!";
    } else {
        //AFFICHER TOUTES LES DONNEES CONTENUES DANS UN TABLEAU ASSOCIATIF
        //Déclarer les variables
        $i = 0;
        //Afficher le nom des colonnes
        echo "<table border='1'>";
        echo "<tr>";
        foreach ($variable_tableau as $chaqueLigne) {
            foreach ($chaqueLigne as $nomColonne => $donneesColonne) {
                echo "<th>" . strtoupper($nomColonne) . "</th>";
            }
            break;
        }
        echo "</tr>";

        //Afficher les valeurs dans les colonnes
        foreach ($variable_tableau as $chaqueLigne) {
            echo "<tr>";
            foreach ($chaqueLigne as $nomColonne => $donneesColonne) {
                echo "<td>" . $donneesColonne . "</td>";
            }
            echo "</tr>";
            $i++;
        }
        echo "</table>";
        unset($donnees);
    }
}


//-------- FONCTIONNALITÉ 1 : CRÉER LA STRUCTURE DE LA BASE DE DONNÉES ET DE LA TABLE -----
$creer=creerLaStructureDUneBD("db_structure.sql");

//-------- FONCTIONNALITÉ 2 : INSÉRER 1 ENREGISTREMENT -----------------------------
$donnees_formulaire = ['prenom' => $lePrenom, 'nom' => $leNom, 'courriel' => $leCourriel];
$ajouter = ajouterUneLigneDansUneTable("utilisateurs", 
                            "employes", 
                            "INSERT INTO employes (prenom, nom, courriel) VALUES (?, ?, ?)", 
                            $donnees_formulaire
                            );
if ($ajouter===true){             
//-------- FONCTIONNALITÉ 3 : SÉLECTIONNER TOUS LES ENREGISTREMENTS ---------------
//Récupérer et sauvegarder les données dans une variable
$toutesLesLignes = copierToutesLesLignesDUneTable("USE utilisateurs", "DESC employes", "SELECT * FROM employes");
//Affciher les données stockées dans la variable
afficherVariableTableau2D($toutesLesLignes);
}

