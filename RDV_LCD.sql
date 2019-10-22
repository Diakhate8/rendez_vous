#------------------------------------------------------------
#        Script MySQL.
#------------------------------------------------------------


#------------------------------------------------------------
# Table: services
#------------------------------------------------------------

CREATE TABLE services(
        Id_Service  Int  Auto_increment  NOT NULL ,
        Nom_Service Varchar (50) NOT NULL
	,CONSTRAINT services_PK PRIMARY KEY (Id_Service)
)ENGINE=InnoDB;


#------------------------------------------------------------
# Table: Specialites
#------------------------------------------------------------

CREATE TABLE Specialites(
        Id_Specialite  Int  Auto_increment  NOT NULL ,
        Nom_Specialite Varchar (50) NOT NULL ,
        Id_Service     Int NOT NULL
	,CONSTRAINT Specialites_PK PRIMARY KEY (Id_Specialite)

	,CONSTRAINT Specialites_services_FK FOREIGN KEY (Id_Service) REFERENCES services(Id_Service)
	,CONSTRAINT Specialites_services_AK UNIQUE (Id_Service)
)ENGINE=InnoDB;


#------------------------------------------------------------
# Table: Secretaires
#------------------------------------------------------------

CREATE TABLE Secretaires(
        Id_Secretaire          Int  Auto_increment  NOT NULL ,
        Prenom_Secretaire      Varchar (50) NOT NULL ,
        Nom_Secretaire         Varchar (50) NOT NULL ,
        Datedenaiss_Secretaire Date NOT NULL ,
        Adresse_Secretaire     Varchar (50) NOT NULL ,
        Telephone_Secretaire   Int NOT NULL ,
        Id_Service             Int NOT NULL
	,CONSTRAINT Secretaires_PK PRIMARY KEY (Id_Secretaire)

	,CONSTRAINT Secretaires_services_FK FOREIGN KEY (Id_Service) REFERENCES services(Id_Service)
	,CONSTRAINT Secretaires_services_AK UNIQUE (Id_Service)
)ENGINE=InnoDB;


#------------------------------------------------------------
# Table: Domaines
#------------------------------------------------------------

CREATE TABLE Domaines(
        Id_Domaine  Int  Auto_increment  NOT NULL ,
        Nom_Domaine Varchar (50) NOT NULL
	,CONSTRAINT Domaines_PK PRIMARY KEY (Id_Domaine)
)ENGINE=InnoDB;


#------------------------------------------------------------
# Table: Medecins
#------------------------------------------------------------

CREATE TABLE Medecins(
        Id_Medecin          Int  Auto_increment  NOT NULL ,
        Prenom_Medecin      Varchar (50) NOT NULL ,
        Nom_Medecin         Varchar (50) NOT NULL ,
        Datedenaiss_Medecin Date NOT NULL ,
        Adresse_Medecin     Varchar (50) NOT NULL ,
        Telephone_Medecin   Int NOT NULL ,
        Id_Domaine          Int NOT NULL ,
        Id_Service          Int NOT NULL
	,CONSTRAINT Medecins_PK PRIMARY KEY (Id_Medecin)

	,CONSTRAINT Medecins_Domaines_FK FOREIGN KEY (Id_Domaine) REFERENCES Domaines(Id_Domaine)
	,CONSTRAINT Medecins_services0_FK FOREIGN KEY (Id_Service) REFERENCES services(Id_Service)
)ENGINE=InnoDB;


#------------------------------------------------------------
# Table: Patients
#------------------------------------------------------------

CREATE TABLE Patients(
        Id_Patient          Int  Auto_increment  NOT NULL ,
        Prenom_Patient      Varchar (50) NOT NULL ,
        Nom_Patient         Varchar (50) NOT NULL ,
        Datedenaiss_Patient Date NOT NULL ,
        Adresse_Patient     Varchar (50) NOT NULL ,
        Telephone_Patient   Int NOT NULL
	,CONSTRAINT Patients_PK PRIMARY KEY (Id_Patient)
)ENGINE=InnoDB;


#------------------------------------------------------------
# Table: RDV
#------------------------------------------------------------

CREATE TABLE RDV(
        Id_RDV        Int  Auto_increment  NOT NULL ,
        Date_RDV      Date NOT NULL ,
        Heure_RDV     Time NOT NULL ,
        Duree_RDV     Time NOT NULL ,
        Id_Secretaire Int NOT NULL ,
        Id_Patient    Int NOT NULL ,
        Id_Medecin    Int NOT NULL
	,CONSTRAINT RDV_PK PRIMARY KEY (Id_RDV)

	,CONSTRAINT RDV_Secretaires_FK FOREIGN KEY (Id_Secretaire) REFERENCES Secretaires(Id_Secretaire)
	,CONSTRAINT RDV_Patients0_FK FOREIGN KEY (Id_Patient) REFERENCES Patients(Id_Patient)
	,CONSTRAINT RDV_Medecins1_FK FOREIGN KEY (Id_Medecin) REFERENCES Medecins(Id_Medecin)
)ENGINE=InnoDB;

