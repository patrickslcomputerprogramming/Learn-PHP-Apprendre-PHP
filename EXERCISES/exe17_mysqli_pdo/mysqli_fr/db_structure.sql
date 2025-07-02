-- @ database structure 
-- date:2023

-- 1.To create the database "users" structure
CREATE DATABASE IF NOT EXISTS utilisateurs; 

-- 2.To Use the Database 
USE utilisateurs;

-- 3.To create the table "employees" stucture
CREATE TABLE IF NOT EXISTS employes(
    id INT(5) PRIMARY KEY AUTO_INCREMENT,
    prenom VARCHAR(35) NOT NULL,
    nom VARCHAR(35) NOT NULL,
    email VARCHAR(35) NOT NULL
)CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci; 