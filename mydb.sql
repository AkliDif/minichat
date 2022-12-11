DROP TABLE client;
DROP TABLE message;


CREATE TABLE if not exists client
(
    id_client INT NOT NULL PRIMARY KEY AUTO_INCREMENT,
    nom VARCHAR(50),
    prenom VARCHAR(50),
    adr_mail VARCHAR(50),
    photo varchar(250) NOT NULL,
    mdp VARCHAR(50),
    statut int NOT NULL DEFAULT '0'
);


CREATE TABLE if not exists message
(
    id_message INT NOT NULL UNIQUE AUTO_INCREMENT,
    id_sender   INT NOT NULL REFERENCES client(id_client),
    id_receiver   INT NOT NULL REFERENCES client(id_client),
    message VARCHAR(2550),
    date_heure DATETIME,

    PRIMARY KEY(id_message, id_sender, id_receiver)
);