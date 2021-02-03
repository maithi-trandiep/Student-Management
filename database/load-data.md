# Load data from csv file to MYSQL database

LOAD DATA LOCAL INFILE '/Applications/MAMP/htdocs/stage-etudiant/DB/etudiants.csv' INTO TABLE etudiant FIELDS TERMINATED BY ';' LINES TERMINATED BY '\r\n' IGNORE 1 LINES (idE, diplome, @vnumDiplome, anneeCertification, @vcampus, @vclasse, nom, prenom, statut_6m, @vnomEntreprise_6m, statut_actuel, @vnomEntreprise_actuel, @vmail, @vtel, @vdateContact, @vidCom, @vdiplomeOrigine, expImmo, @ventrepriseAlt) SET idE = NULL, numDiplome = NULLIF(@vnumDiplome,''), campus = NULLIF(@vcampus,''), classe = NULLIF(@vclasse,''), nomEntreprise_6m = NULLIF(@vnomEntreprise_6m,''), nomEntreprise_actuel = NULLIF(@vnomEntreprise_actuel,''), mail = NULLIF(@vmail,''), tel = NULLIF(@vtel,''), dateContact = NULLIF(@vdateContact,''), idCom = NULLIF(@vidCom,''), diplomeOrigine = NULLIF(@vdiplomeOrigine,''), entrepriseAlt = NULLIF(@ventrepriseAlt,'');