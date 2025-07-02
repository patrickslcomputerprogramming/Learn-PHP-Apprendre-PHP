<?php

//-----------------------------------------------------------------
//-------- FEATURE 1: CREATE THE DATABASE AND TABLE STRUCTURE -----
//-------- FONCTIONNALITÉ 1: CRÉER LA BASE DE DONNÉES ET LA STRUCTURE DE TABLE -----
//-------- DATA DEFINITION ---
//-------- DEFINITION DE DONNÉES---
//-----------------------------------------------------------------

//1-CONNECT TO THE DATABASE MANAGEMENT SYSTEM (DBMS) MYSQL 
//1-SE CONNECTER AU SYSTÈME DE GESTION DE BASE DE DONNÉES (SGBD) MYSQL
try {
    $connection = new mysqli(HOSTNAME, USERNAME, PASSWORD);
} catch (mysqli_sql_exception $error) {
    //If the connection failed, display error message and stop the script
    die("Échec de connexion à MySQL! <br>" . $error);
}

//2-CREATE THE DATABASE STRUCTURE IF IT DOESN'T EXIST YET
//2-CRÉEZ LA STRUCTURE DE LA BASE DE DONNÉES SI ELLE N'EXISTE PAS ENCORE
try {
    $createStructure = $connection->multi_query(file_get_contents("db_structure.sql"));
} catch (mysqli_sql_exception $error) {
    //If the creation failed, display error message and stop the script
    die("Échec de création de la base de données et des tables! <br>" . $error);
}


//3-DISCONNECT FROM THE DATABASE MANAGEMENT SYSTEM (DBMS) MYSQL
//3-SE DÉCONNECTER DU SYSTEME DE GESTION DE BASE DE DONNÉES (SGBD) MYSQL
try {
    $connection->close();
} catch (mysqli_sql_exception $error) {
    //If the disconnection failed, display error message and stop the script
    die("Échec de déconnexion à MySQL!<br/>" . $error);
}


//-----------------------------------------------------------------
//-------- FEATURE 2: INSERT 1 RECORD -----------------------------
//-------- FONCTIONNALITÉ 2: AJOUTER UN ENREGISTREMENT -----
//-------- DATA UPDATE --------------------------
//-------- MISE A JOUR DE DONNÉES---
//-----------------------------------------------------------------


//1-CONNECT TO THE DATABASE MANAGEMENT SYSTEM (DBMS) MYSQL 
//1-SE CONNECTER AU SYSTÈME DE GESTION DE BASE DE DONNÉES (SGBD) MYSQL
try {
    $connection = new mysqli(HOSTNAME, USERNAME, PASSWORD);
} catch (mysqli_sql_exception $error) {
    //If the connection failed, display error message and stop the script
    die("Échec de connexion à MySQL! <br>" . $error);
}


//2-SELECT THE DATABASE
//2-SÉLECTIONNER LA BASE DE DONNÉES
try {
    $selectDBUsers = mysqli_select_db($connection, "utilisateurs");
} catch (mysqli_sql_exception $error) {
    //If the selection failed, display error message and stop the script
    die("Échec de connexion à la base de données!<br/> " . $error);
}

 
//3-CHECK IF THE TABLE EXISTS
//3-VÉRIFIER SI LA TABLE EXISTE 
try {
    $sqlCode = "DESC employes";
    $describeTable = $connection->query($sqlCode);
} catch (mysqli_sql_exception $error) {
    //If the description failed, display error message and stop the script
    die("Échec de description de la table!<br/> " . $error);
}

//4-INSERT A RECORD INTO THE TABLE 
//4-INSÉREZ UN ENREGISTREMENT DANS LA TABLE
try {
    $sqlCode = "INSERT INTO employes (prenom, nom, email) 
                VALUES ('$theFirstName', '$theLastName', '$theEmail')";
    $insertRecords = $connection->query($sqlCode);
} catch (mysqli_sql_exception $error) {
    //If the insertion failed, display error message and stop the script
    die("Échec d'insersion de données dans les tables!<br>" . $error);
}

//5-DISCONNECT FROM THE DATABASE MANAGEMENT SYSTEM (DBMS) MYSQL
//5-SE DÉCONNECTER DU SYSTEME DE GESTION DE BASE DE DONNÉES (SGBD) MYSQL
try {
    $disconnection = $connection->close();
} catch (mysqli_sql_exception $error) {
    //If the disconnection failed, display error message and stop the script
    die("Échec de déconnexion à MySQL!<br/>" . $error);
}

//-----------------------------------------------------------------
//-------- FEATURE 3: SELECT ALL RECORDS ---------------
//-------- FONCTIONNALITÉ 3: SÉLECTIONNER TOUS LES ENREGISTREMENTS -----
//-------- DATA RETRIEVAL --------------------------
//-------- DISPLAY THE RETRIEVED RECORDS --------------------------
//-------- RECUPÉRATION DE DONNÉES-------------------------------
//-------- AFFICHAGE DE DONNÉES RECUPÉRÉES-------------------------------
//-----------------------------------------------------------------

//1-CONNECT TO THE DATABASE MANAGEMENT SYSTEM (DBMS) MYSQL 
//1-SE CONNECTER AU SYSTÈME DE GESTION DE BASE DE DONNÉES (SGBD) MYSQL
try {
    $connection = new mysqli(HOSTNAME, USERNAME, PASSWORD);
} catch (mysqli_sql_exception $error) {
    //If the connection failed, display error message and stop the script
    die("Échec de connexion à MySQL! <br>" . $error);
}


//2-SELECT THE DATABASE
//2-SÉLECTIONNER LA BASE DE DONNÉES
try {
    $selectDBUsers = mysqli_select_db($connection, "utilisateurs");
} catch (mysqli_sql_exception $error) {
    //If the selection failed, display error message and stop the script
    die("Échec de connexion à la base de données!<br/> " . $error);
}


//3-CHECK IF THE TABLE EXISTS 
//3-VÉRIFIER SI LA TABLE EXISTE
try {
    $sqlCode = "DESC employes";
    $describeTable = $connection->query($sqlCode);
} catch (mysqli_sql_exception $error) {
    //If the description failed, display error message and stop the script
    die("Échec de description de la table!<br/> " . $error);
}

//4-SELECT ALL THE EXISTING RECORDS INTO THE TABLE AND DISPLAY THEM
//4-SÉLECTIONNEZ TOUS LES ENREGISTREMENTS EXISTANTS DANS LA TABLE ET AFFICHEZ-LES
try {
    $sqlCode = "SELECT * FROM employes";
    $selectRecords = $connection->query($sqlCode);
    //Calculate the number of records (or rows) available
    $number_of_rows = $selectRecords->num_rows;
    //Use a loop to display the records one by one in a HTML table
    echo "<table>";
    echo "<tr><th>ID</th><th>Prénom</th><th>Nom</th><th>Email</th></tr>";
    for ($j = 0; $j < $number_of_rows; ++$j) {
        echo "<tr>";
        //Assign the records of each row to an associative array
        $each_row = $selectRecords->fetch_array(MYSQLI_ASSOC);
        //Display each the record corresponding to each column
        echo "<td>" . $each_row['id'] . "</td>";
        echo "<td>" . $each_row['prenom'] . "</td>";
        echo "<td>" . $each_row['nom'] . "</td>";
        echo "<td>" . $each_row['email'] . "</td>";
        echo "</tr>";
    }
    echo "</table>";
} catch (mysqli_sql_exception $error) {
    //If the selection failed, display error message and stop the script
    die("Échec de sélection de données dans la table!<br/>" . $error);
}

//5-DISCONNECT FROM THE DATABASE MANAGEMENT SYSTEM (DBMS) MYSQL
//5-SE DÉCONNECTER DU SYSTEME DE GESTION DE BASE DE DONNÉES (SGBD) MYSQL
try {
    $disconnection = $connection->close();
} catch (mysqli_sql_exception $error) {
    //If the disconnection failed, display error message and stop the script
    die("Échec de déconnexion à MySQL!<br/>" . $error);
}
