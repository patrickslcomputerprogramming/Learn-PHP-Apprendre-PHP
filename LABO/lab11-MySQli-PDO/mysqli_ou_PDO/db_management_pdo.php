<?php
 
try {
    //-----------------------------------------------------------------
    //-------- FONCTIONNALITÉ 1 : CRÉER LA STRUCTURE DE LA BASE DE DONNÉES ET DE LA TABLE -----
    //-------- DÉFINITION DES DONNÉES ---
    //-----------------------------------------------------------------
    //1-CONNEXION AU SYSTÈME DE GESTION DE BASE DE DONNÉES (SGBD) MYSQL
    $connexion = new PDO(dsn: "mysql:host=".HOSTNAME, username: USERNAME, password: PASSWORD);
    //2-CRÉER LA STRUCTURE DE LA BASE DE DONNÉES SI ELLE N'EXISTE PAS ENCORE EN UTILISANT LE CODE DANS UN FICHIER EXTERNE
    $connexion->exec(statement: file_get_contents(filename: "db_structure.sql"));
    //3-DÉCONNEXION DU SYSTÈME DE GESTION DE BASE DE DONNÉES (SGBD) MYSQL
    unset($connexion);
    //-----------------------------------------------------------------
    //-------- FONCTIONNALITÉ 2 : INSÉRER 1 ENREGISTREMENT -----------------------------
    //-------- MISE À JOUR DES DONNÉES --------------------------
    //-----------------------------------------------------------------
    //1-CONNEXION AU SYSTÈME DE GESTION DE BASE DE DONNÉES (SGBD) MYSQL 
    $connexion = new PDO(dsn: "mysql:host=".HOSTNAME, username: USERNAME, password: PASSWORD);
    //2-SÉLECTIONNER LA BASE DE DONNÉES
    $codeSQL = "USE utilisateurs";
    $connexion->query(query: $codeSQL);
    //3-VÉRIFIER SI LA TABLE EXISTE 
    $codeSQL = "DESC employes";
    $connexion->query(query: $codeSQL);
    //4-INSÉRER UN ENREGISTREMENT DANS LA TABLE    
    /*
    //Instruction régulière
    $codeSQL = "INSERT INTO employes (prenom, nom, courriel) VALUES ('$lePrenom', '$leNom', '$leCourriel')";
    $connexion->query($codeSQL);
    */
    //Instruction préparée
    $codeSQL = "INSERT INTO employes (prenom, nom, courriel) VALUES (?, ?, ?)";        
    $instructionPreparee = $connexion->prepare($codeSQL);
    //$instructionPreparee->bind_param('sss', $lePrenom, $leNom, $leCourriel); //s pour chaîne ; d pour double ; i pour entier...
    $instructionPreparee->execute(params: [$lePrenom, $leNom, $leCourriel]);
    //echo $instructionPreparee->rowCount();
    //5-DÉCONNEXION DU SYSTÈME DE GESTION DE BASE DE DONNÉES (SGBD) MYSQL
    //Fermer l'objet instruction préparée 
    unset($instructionPreparee);
    //Fermer l'objet PDO
    unset($connexion);
    //-----------------------------------------------------------------
    //-------- FONCTIONNALITÉ 3 : SÉLECTIONNER TOUS LES ENREGISTREMENTS ---------------
    //-------- RÉCUPÉRATION DES DONNÉES --------------------------
    //-------- AFFICHER LES ENREGISTREMENTS SÉLECTIONNÉS --------------------------
    //-----------------------------------------------------------------
    //1-CONNEXION AU SYSTÈME DE GESTION DE BASE DE DONNÉES (SGBD) MYSQL 
    $connexion = new PDO(dsn: "mysql:host=".HOSTNAME, username: USERNAME, password: PASSWORD);
    //2-SÉLECTIONNER LA BASE DE DONNÉES
    $codeSQL = "USE utilisateurs";
    $connexion->query(query: $codeSQL);
    //3-VÉRIFIER SI LA TABLE EXISTE 
    $codeSQL = "DESC employes";
    $connexion->query(query: $codeSQL);
    //4-SÉLECTIONNER TOUS LES ENREGISTREMENTS EXISTANTS DANS LA TABLE ET LES AFFICHER
    $codeSQL = "SELECT * FROM employes";
    $selectionEnregistrements = $connexion->prepare($codeSQL);
    $selectionEnregistrements->execute();
    //Calculer le nombre d'enregistrements (ou lignes) disponibles
    $nombre_de_lignes = $selectionEnregistrements->rowCount();
    //Utiliser une boucle pour afficher les enregistrements un par un dans un tableau HTML
    echo "<table>";
    echo "<tr><th>ID</th><th>Prénom</th><th>Nom</th><th>Courriel</th></tr>";
    for ($j = 0; $j < $nombre_de_lignes; ++$j) {
        echo "<tr>";
        //Assigner les enregistrements de chaque ligne à un tableau associatif
        $chaque_ligne = $selectionEnregistrements->fetch(PDO::FETCH_ASSOC);
        //Afficher chaque enregistrement correspondant à chaque colonne
        echo "<td>" . $chaque_ligne['id'] . "</td>";
        echo "<td>" . $chaque_ligne['prenom'] . "</td>";
        echo "<td>" . $chaque_ligne['nom'] . "</td>";
        echo "<td>" . $chaque_ligne['courriel'] . "</td>";
        echo "</tr>";
    }
    echo "</table>";
    //5-DÉCONNEXION DE L'ENSEMBLE DE RÉSULTATS ET DU SYSTÈME DE GESTION DE BASE DE DONNÉES (SGBD) MYSQL
    unset($selectionEnregistrements);
    unset($connexion);
} catch (PDOexception $erreur) {
    //s'il y a une erreur 
    $msg_erreur['Personnalisé'] = "Quelque chose s'est mal passé ! Réessayez !";
    $msg_erreur['Message d\'erreur'] = $erreur->getMessage();
    $msg_erreur['Nom du fichier d\'erreur'] = $erreur->getFile();
    $msg_erreur['Numéro de ligne d\'erreur'] = $erreur->getLine();
    echo "<table>";
    foreach ($msg_erreur as $clef => $valeur){
        echo "<tr>";
        echo "<td>" . $clef . "</td>" ;
        echo "<td>" . $valeur . "</td>" ;
        echo "</tr>";
    }
    echo "</tr></table>";
}