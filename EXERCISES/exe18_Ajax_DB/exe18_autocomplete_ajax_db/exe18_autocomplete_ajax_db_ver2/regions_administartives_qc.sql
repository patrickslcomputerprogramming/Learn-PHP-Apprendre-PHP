-- @ Quebec Region Names 2024
-- Create Database Structure and Insert data

-- Create the DB if it doesn't exist yet
CREATE DATABASE IF NOT EXISTS infoqc;

-- Make the DB available for use
USE infoqc;

-- Create the table if it doesn't exist yet
CREATE TABLE IF NOT EXISTS regions (
  `name` varchar(80) NOT NULL,
  PRIMARY KEY  (`name`)
);

-- Insert the records into the table if they don't exist yet
INSERT IGNORE INTO regions (name) 
VALUES ("Bas-Saint-Laurent");

INSERT IGNORE INTO regions (name) 
VALUES ("Saguenay-Lac-Saint-Jean");

INSERT IGNORE INTO regions (name) 
VALUES ("Capitale-Nationale");

INSERT IGNORE INTO regions (name) 
VALUES ("Mauricie");

INSERT IGNORE INTO regions (name) 
VALUES ("Estrie");

INSERT IGNORE INTO regions (name) 
VALUES ("Montréal");

INSERT IGNORE INTO regions (name) 
VALUES ("Outaouais");

INSERT IGNORE INTO regions (name) 
VALUES ("Côte-Nord");

INSERT IGNORE INTO regions (name) 
VALUES ("Nord-du-Québec");

INSERT IGNORE INTO regions (name) 
VALUES ("CRÉ de la Baie-James");

INSERT IGNORE INTO regions (name) 
VALUES ("Cree Regional Authority");

INSERT IGNORE INTO regions (name) 
VALUES ("Kativik Regional Government");

INSERT IGNORE INTO regions (name) 
VALUES ("Gaspésie-Îles-de-la-Madeleine");

INSERT IGNORE INTO regions (name) 
VALUES ("Chaudière-Appalaches");

INSERT IGNORE INTO regions (name) 
VALUES ("Laval");

INSERT IGNORE INTO regions (name) 
VALUES ("Lanaudière");

INSERT IGNORE INTO regions (name) 
VALUES ("Laurentides");

INSERT IGNORE INTO regions (name) 
VALUES ("Montérégie");

INSERT IGNORE INTO regions (name) 
VALUES ("CRÉ de Longueuil");

INSERT IGNORE INTO regions (name) 
VALUES ("CRÉ Montérégie Est");

INSERT IGNORE INTO regions (name) 
VALUES ("CRÉ Vallée-du-Haut-Saint-Laurent");

INSERT IGNORE INTO regions (name) 
VALUES ("Centre-du-Québec");
