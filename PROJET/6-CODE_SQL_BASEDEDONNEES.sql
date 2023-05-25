--420DW3AS PROJET FINAL-- 
--**CODE SQL DE LA BASE DE DONNEES ET SES COMPOSANTS**--

------------------------------------------------------------------------------
--CODE POUR CREER AUTOMATIQUEMENT 1 BASE DE DONNEES, 3 TABLES et 1 VUE
------------------------------------------------------------------------------

--1.Code pour créer 1 Base de Données (Database) "kidsgame"
CREATE DATABASE IF NOT EXISTS kidsGames; 

--2.Code pour créer 3 Tables "player, authenticator et score" 
CREATE TABLE IF NOT EXISTS player( 
    fName VARCHAR(50) NOT NULL, 
    lName VARCHAR(50) NOT NULL, 
    userName VARCHAR(20) NOT NULL UNIQUE,
    registrationTime DATETIME NOT NULL,
    id VARCHAR(200) GENERATED ALWAYS AS (CONCAT(UPPER(LEFT(fName,2)),UPPER(LEFT(lName,2)),UPPER(LEFT(userName,3)),CAST(registrationTime AS SIGNED))),
    registrationOrder INTEGER AUTO_INCREMENT,
    PRIMARY KEY (registrationOrder)
)CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci; 

CREATE TABLE IF NOT EXISTS authenticator(   
    passCode VARCHAR(255) NOT NULL,
    registrationOrder INTEGER, 
    FOREIGN KEY (registrationOrder) REFERENCES player(registrationOrder)
)CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci; 

CREATE TABLE IF NOT EXISTS score( 
    scoreTime DATETIME NOT NULL, 
    result ENUM('réussite', 'échec', 'incomplet'),
    livesUsed INTEGER NOT NULL,
    registrationOrder INTEGER, 
    FOREIGN KEY (registrationOrder) REFERENCES player(registrationOrder)
)CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci; 

--3.Code pour créer 1 Vue (View) "history" 
CREATE VIEW history AS
SELECT s.scoreTime, p.id, p.fName, p.lName, s.result, s.livesUsed 
FROM player p, score s
WHERE p.registrationOrder = s.registrationOrder;

------------------------------------------------------------------------------
--DONNEES POUR TESTER ET SIMULER LA BASE DE DONNEES ET SES COMPOSANTS
------------------------------------------------------------------------------

--1.Sauvegarder 3 enregistrements dans la Table player 
INSERT INTO player(fName, lName, userName, registrationTime)
VALUES('Patrick','Saint-Louis', 'sonic12345', now()); 

INSERT INTO player(fName, lName, userName, registrationTime)
VALUES('Marie','Jourdain', 'asterix2023', now());

INSERT INTO player(fName, lName, userName, registrationTime)
VALUES('Jonathan','David', 'pokemon527', now()); 

--2.Sauvegarder 3 enregistrements dans la Table authenticator
INSERT INTO authenticator(passCode, registrationOrder)
VALUES('$2y$10$fxMTc4KD4mZlj03wc4grTuVLssP0ZKxeqfcfvxVx2xnrrKF.CKsk.', 1);

INSERT INTO authenticator(passCode, registrationOrder)
VALUES('$2y$10$AH/612QosAUyKIy5s4lEBuGdNAhnw.PbHYfIuLNK2aHQXWRMIF6fi', 2);

INSERT INTO authenticator(passCode, registrationOrder)
VALUES('$2y$10$rSNEZ5wd8YyRRlNCmwfb2uUvkffrAMdmLkcm5s.b7WAgiGy8UoA1i', 3);

--3.Sauvegarder 3 enregistrements dans la Table score
INSERT INTO score(scoreTime, result , livesUsed, registrationOrder)
VALUES(now(), 'réussite', 4, 1);

INSERT INTO score(scoreTime, result , livesUsed, registrationOrder)
VALUES(now(), 'échec', 6, 2);

INSERT INTO score(scoreTime, result , livesUsed, registrationOrder)
VALUES(now(), 'incomplet', 5, 3);

--4.Modifier une colonne d'un enregistrement de la Table authenticator
UPDATE authenticator 
SET passCode='$2y$10$rSNEZ5wd8YyRRlNCmwfb2uUvkffrAMdmLkcm5s.c8XBhjHz9VpB2j' 
WHERE registrationOrder=3;

--5.Sélectionner une colonne d'un enregistrements de la Table player
SELECT registrationOrder 
FROM player 
WHERE userName='asterix2023';

/* Sortie
registrationOrder 
2
*/

--6.Sélectionner toutes les enregistrements de la Vue history
SELECT * 
FROM history;

/* Sortie
scoreTime 	            id 	                    fName 	    lName 	        result 	    livesUsed 	
2023-03-05 14:47:13 	PASASON20230305144511 	Patrick 	Saint-Louis 	success 	4
2023-03-05 14:47:46 	MAJOAST20230305144548 	Marie 	    Jourdain 	    failure 	6
2023-03-05 14:48:08 	JODAPOK20230305144617 	Jonathan 	David 	        incomplete 	5
*/
