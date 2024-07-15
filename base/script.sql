create database garage;
use garage;
CREATE TABLE Slot(
   Id_Slot INT AUTO_INCREMENT,
   intitule CHAR(1) ,
   PRIMARY KEY(Id_Slot)
);

CREATE TABLE Service(
   Id_Service INT AUTO_INCREMENT,
   intitule VARCHAR(30) ,
   duree DECIMAL(10,2) ,
   prix DECIMAL(15,2)  ,
   PRIMARY KEY(Id_Service)
);

CREATE TABLE Client(
   Id_Client INT AUTO_INCREMENT,
   numero VARCHAR(8) ,
   type VARCHAR(30) ,
   PRIMARY KEY(Id_Client),
   UNIQUE(numero)
);

CREATE TABLE Rdv(
   Id_Rdv INT AUTO_INCREMENT,
   dateHdebut DATETIME,
   Id_Service INT NOT NULL,
   Id_Client INT NOT NULL,
   Id_Slot INT NOT NULL,
   PRIMARY KEY(Id_Rdv),
   FOREIGN KEY(Id_Service) REFERENCES Service(Id_Service),
   FOREIGN KEY(Id_Client) REFERENCES Client(Id_Client),
   FOREIGN KEY(Id_Slot) REFERENCES Slot(Id_Slot)
);

CREATE TABLE Paiement(
   Id_Paiement INT AUTO_INCREMENT,
   datePaiement DATETIME,
   Id_Rdv INT NOT NULL,
   PRIMARY KEY(Id_Paiement),
   UNIQUE(Id_Rdv),
   FOREIGN KEY(Id_Rdv) REFERENCES Rdv(Id_Rdv)
);

CREATE TABLE SlotOccupe(
    Id_SlotOccupe INT PRIMARY KEY AUTO_INCREMENT,
    dateDOccupe DATETIME,
    dateFOccupe DATETIME,
    Id_Slot INT NOT NULL,
    FOREIGN KEY(Id_Slot)  REFERENCES Slot(Id_Slot)
);
CREATE TABLE Admin(
   id_Admin INT PRIMARY KEY AUTO_INCREMENT,
   email VARCHAR(100) NOT NULL,
   mdp VARCHAR(50)
);
---Data--------------------------------
INSERT INTO Slot (intitule) VALUES
('A'),
('B'),
('C');
INSERT INTO Service (intitule, duree, prix) VALUES
('Reparation Simple',1, 150000),
('Reparation standard', 2, 250000),
('Complexe', 8, 800000),
('Entretien', 2.5, 300000);
 INSERT INTO Admin (email, mdp) VALUES ('admin@gmail.com', 'adminmdp');
