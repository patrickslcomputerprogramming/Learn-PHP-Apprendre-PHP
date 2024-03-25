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

-- Insert records into the table 
INSERT INTO regions (name) 
VALUES 
("Bas-Saint-Laurent"),
("Saguenay-Lac-Saint-Jean"),
("Capitale-Nationale"),
("Mauricie"),
("Estrie"),
("Montréal"),
("Outaouais"),
("Côte-Nord"),
("Nord-du-Québec"),
("CRÉ de la Baie-James"),
("Cree Regional Authority"),
("Kativik Regional Government"),
("Gaspésie-Îles-de-la-Madeleine"),
("Chaudière-Appalaches"),
("Laval"),
("Lanaudière"),
("Laurentides"),
("Montérégie"),
("CRÉ de Longueuil"),
("CRÉ Montérégie Est"),
("CRÉ Vallée-du-Haut-Saint-Laurent"),
("Centre-du-Québec");