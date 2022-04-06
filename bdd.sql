CREATE DATABASE utilisateurs;
USE utilisateurs;
CREATE TABLE utilisateur(
        id_util     Int  PRIMARY KEY Auto_increment  NOT NULL ,
        nom_util    Varchar (50) NOT NULL ,
        prenom_util Varchar (50) NOT NULL ,
        mail_util   Varchar (50) NOT NULL ,
        mdp_util    Varchar (100) NOT NULL ,
        img_util    Varchar (100) NULL
)ENGINE=InnoDB;