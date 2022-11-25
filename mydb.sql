CREATE TABLE client
(
    id_client INT NOT NULL PRIMARY KEY,
    nom VARCHAR(50),
    prenom VARCHAR(50), 
    adr_mail VARCHAR(50),
    sexe ENUM('m','f'),
    date_naissance DATE,
    mdp VARCHAR(50),
    client_admin boolean
);