-- @ database structure 
-- date:2023

-- 1.To create the database "users" structure
CREATE DATABASE IF NOT EXISTS users; 

-- 2.To Use the Database 
USE users;

-- 3.To create the table "employees" stucture
CREATE TABLE IF NOT EXISTS employees(
    id INT(5) PRIMARY KEY AUTO_INCREMENT,
    firstname VARCHAR(35) NOT NULL,
    lastname VARCHAR(35) NOT NULL,
    email VARCHAR(35) NOT NULL
)CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci; 