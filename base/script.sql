create database garage;
CREATE TABLE Slots(
   Id_Slots INT AUTO_INCREMENT,
   intitule CHAR(1) ,
   PRIMARY KEY(Id_Slots)
);

CREATE TABLE Service(
   Id_Service INT AUTO_INCREMENT,
   intitule VARCHAR(30) ,
   duree INT,
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
   Id_Slots INT NOT NULL,
   PRIMARY KEY(Id_Rdv),
   FOREIGN KEY(Id_Service) REFERENCES Service(Id_Service),
   FOREIGN KEY(Id_Client) REFERENCES Client(Id_Client),
   FOREIGN KEY(Id_Slots) REFERENCES Slots(Id_Slots)
);

CREATE TABLE Paiement(
   Id_Paiement INT AUTO_INCREMENT,
   datePaiement DATETIME,
   Id_Rdv INT NOT NULL,
   PRIMARY KEY(Id_Paiement),
   UNIQUE(Id_Rdv),
   FOREIGN KEY(Id_Rdv) REFERENCES Rdv(Id_Rdv)
);
