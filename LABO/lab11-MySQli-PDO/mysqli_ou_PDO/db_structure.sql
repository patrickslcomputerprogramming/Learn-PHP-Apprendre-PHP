-- @ structure de la base de données 
-- date:2023

-- 1.Pour créer la structure de la base de données "utilisateurs"
CREATE DATABASE IF NOT EXISTS utilisateurs; 

-- 2.Pour utiliser la base de données 
USE utilisateurs;

-- 3.Pour créer la structure de la table "employes"
CREATE TABLE IF NOT EXISTS employes(
    id INT(5) PRIMARY KEY AUTO_INCREMENT,
    prenom VARCHAR(35) NOT NULL,
    nom VARCHAR(35) NOT NULL,
    courriel VARCHAR(35) NOT NULL
)CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;