DROP DATABASE IF EXISTS Etudiants;
CREATE DATABASE Etudiants;

USE Etudiants;

CREATE TABLE etudiant
(
	idE int NOT NULL AUTO_INCREMENT PRIMARY KEY,
	diplome varchar(70) NOT NULL,
	numDiplome int(5),
	anneeCertification int(4) NOT NULL,
	campus varchar(30),
	classe varchar(30),
	nom varchar(30) NOT NULL,
	prenom varchar(30) NOT NULL,
	statut_6m varchar(70) NOT NULL,
	nomEntreprise_6m varchar(255),
	statut_actuel varchar(70) NOT NULL,
	nomEntreprise_actuel varchar(255),
	mail varchar(40), 
	tel varchar(13),
	dateContact DATE,
	idCom int(6),
	diplomeOrigine varchar(70),
	expImmo char(10),
	entrepriseAlt varchar(255)
)
ENGINE=INNODB;

CREATE TABLE utilisateur (
    idU int NOT NULL AUTO_INCREMENT PRIMARY KEY,
    identifiant varchar(50) NOT NULL UNIQUE,
    passe varchar(255) NOT NULL,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
  	updated_at DATETIME DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
);

