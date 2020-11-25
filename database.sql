CREATE TABLE IF NOT EXISTS Utilisateur(
	idUtilisateur INT(11) NOT NULL AUTO_INCREMENT,
	login VARCHAR(20),
	password TEXT,
	photoProfil TEXT,
	PRIMARY KEY(idUtilisateur)
);

CREATE TABLE IF NOT EXISTS Administrateur(
	idAdministrateur INT(11) NOT NULL AUTO_INCREMENT,
	libelle TEXT,
	agence TEXT,
	Utilisateur INT(11),
	PRIMARY KEY(idAdministrateur),
	CONSTRAINT UtilisateurAdministrateur FOREIGN KEY (utilisateur) REFERENCES Utilisateur(idUtilisateur)
);

CREATE TABLE IF NOT EXISTS Privillege(
	idPrivillege INT(11) NOT NULL AUTO_INCREMENT,
	libellePrivillege TEXT,
	PRIMARY KEY(idPrivillege)
);

CREATE TABLE IF NOT EXISTS Permission(
	idPermission INT(11) NOT NULL AUTO_INCREMENT,
	privillege INT(11),
	utilisateur INT(11),
	CONSTRAINT PrivilegesPermission FOREIGN KEY (privillege) REFERENCES `Privillege`(idPrivillege),
	CONSTRAINT UtilisateurPermission FOREIGN KEY (utilisateur) REFERENCES Utilisateur(idUtilisateur),
	PRIMARY KEY(idPermission)
);
CREATE TABLE IF NOT EXISTS Utilisateur(
	idUtilisateur INT(11) NOT NULL AUTO_INCREMENT,
	login VARCHAR(20),
	password TEXT,
	photoProfil TEXT,
	PRIMARY KEY(idUtilisateur)
);

CREATE TABLE IF NOT EXISTS Administrateur(
	idAdministrateur INT(11) NOT NULL AUTO_INCREMENT,
	libelle TEXT,
	agence TEXT,
	Utilisateur INT(11),
	PRIMARY KEY(idAdministrateur),
	CONSTRAINT UtilisateurAdministrateur FOREIGN KEY (utilisateur) REFERENCES Utilisateur(idUtilisateur)
);

CREATE TABLE IF NOT EXISTS Privillege(
	idPrivillege INT(11) NOT NULL AUTO_INCREMENT,
	libellePrivillege TEXT,
	PRIMARY KEY(idPrivillege)
);

CREATE TABLE IF NOT EXISTS Permission(
	idPermission INT(11) NOT NULL AUTO_INCREMENT,
	privillege INT(11),
	utilisateur INT(11),
	CONSTRAINT PrivilegesPermission FOREIGN KEY (privillege) REFERENCES `Privillege`(idPrivillege),
	CONSTRAINT UtilisateurPermission FOREIGN KEY (utilisateur) REFERENCES Utilisateur(idUtilisateur),
	PRIMARY KEY(idPermission)
);

CREATE TABLE IF NOT EXISTS Departement(
	idDepartement INT(11) NOT NULL AUTO_INCREMENT,
	nomDepartement TEXT,
	PRIMARY KEY(idDepartement)
);

CREATE TABLE IF NOT EXISTS Ville(
	idVille INT(11) NOT NULL AUTO_INCREMENT,
	nomVille TEXT,
	departement INT(11),
	CONSTRAINT DepartementVille FOREIGN KEY (departement) REFERENCES Departement(idDepartement),
	PRIMARY KEY(idVille)
);

CREATE TABLE IF NOT EXISTS Quartier(
	idQuartier INT(11) NOT NULL AUTO_INCREMENT,
	nomQuartier TEXT,
	ville INT(11),
	CONSTRAINT VilleQuartier FOREIGN KEY (ville) REFERENCES Ville(idVille),
	PRIMARY KEY(idQuartier)
);

CREATE TABLE IF NOT EXISTS Proprietaire(
	idProprietaire INT(11) NOT NULL AUTO_INCREMENT,
	nomProprietaire TEXT,
	prenomProprietaire TEXT,
	dateNaissance DATE,
	lieuNaissance TEXT,
	profession TEXT,
	adresse TEXT,
	telephone TEXT,
	quartierDeResidence INT(11),
	CONSTRAINT QuartierProprietaire FOREIGN KEY (quartierDeResidence) REFERENCES Quartier(idQuartier),
	PRIMARY KEY(idProprietaire)
);

CREATE TABLE IF NOT EXISTS Energie(
	idEnergie INT(11) NOT NULL AUTO_INCREMENT,
	libelleEnergie TEXT,
	PRIMARY KEY(idEnergie)
);

CREATE TABLE IF NOT EXISTS Carosserie(
	idCarosserie INT(11) NOT NULL AUTO_INCREMENT,
	libelleCarosserie TEXT,
	PRIMARY KEY(idCarosserie)
);

CREATE TABLE IF NOT EXISTS Voiture(
	idVoiture INT(11) NOT NULL AUTO_INCREMENT,
	marque TEXT,
	type TEXT,
	puissance DOUBLE,
	poidVide DOUBLE,
	chargeUtile DOUBLE,
	poidTotal DOUBLE,
	placeAssise INT(3),
	numeroChassis TEXT,
	numeroMoteur TEXT,
	1immatriculation DATE,
	genre TEXT,
	energie INT(11),
	carosserie INT(11),
	proprietaire INT(11),
	immatriculation TEXT,
	DateImmatriculation DATETIME,
	CONSTRAINT EnergieVoiture FOREIGN KEY (energie) REFERENCES Energie(idEnergie),
	CONSTRAINT CarosserieVoiture FOREIGN KEY (carosserie) REFERENCES Carosserie(idCarosserie),
	CONSTRAINT ProprietaireVoiture FOREIGN KEY (proprietaire) REFERENCES Proprietaire(idProprietaire),
	PRIMARY KEY(idVoiture)
);

CREATE TABLE IF NOT EXISTS MaisonAssurance(
	idMaisonAssurance INT(11) NOT NULL AUTO_INCREMENT,
	nomAssureur TEXT,
	utilisateur INT(11),
	CONSTRAINT UtilisateurMaisonAssurance FOREIGN KEY (utilisateur) REFERENCES Utilisateur(idUtilisateur),
	PRIMARY KEY(idMaisonAssurance)
);

CREATE TABLE IF NOT EXISTS AgenceCNSR(
	idAgenceCNSR INT(11) NOT NULL AUTO_INCREMENT,
	libelleAgenceCNSR TEXT,
	utilisateur INT(11),
	CONSTRAINT UtilisateurAgenceCNSR FOREIGN KEY (utilisateur) REFERENCES Utilisateur(idUtilisateur),
	PRIMARY KEY(idAgenceCNSR)
);

CREATE TABLE IF NOT EXISTS AgenceAssurance(
	idAgenceAssurance INT(11) NOT NULL AUTO_INCREMENT,
	libelleAgence TEXT,
	contact TEXT,
	maisonAssurance INT(11),
	utilisateur INT(11),
	CONSTRAINT MaisonAssuranceAgenceAssurance FOREIGN KEY (maisonAssurance) REFERENCES MaisonAssurance(idMaisonAssurance),
	CONSTRAINT UtilisateurAgence FOREIGN KEY (utilisateur) REFERENCES Utilisateur(idUtilisateur),
	PRIMARY KEY(idAgenceAssurance)
);

CREATE TABLE IF NOT EXISTS Assurance(
	idAssurance INT(11) NOT NULL AUTO_INCREMENT,
	dateAssurance DATE,
	duree INT(11),
	uniteDuree VARCHAR(5),
	echeance DATE,
	voiture INT(11),
    maisonAssurance INT(11),
	utilisateur INT(11),
	CONSTRAINT VoitureAssurance FOREIGN KEY (voiture) REFERENCES Voiture(idVoiture),
	CONSTRAINT MaisonAssuranceAssurance FOREIGN KEY (maisonAssurance) REFERENCES MaisonAssurance(idMaisonAssurance),
	CONSTRAINT Utilisateur FOREIGN KEY (utilisateur) REFERENCES Utilisateur(idUtilisateur),
	PRIMARY KEY(idAssurance)
);

CREATE TABLE IF NOT EXISTS Tokens(
	idTokens INT(11) NOT NULL AUTO_INCREMENT,
	token TEXT,
	utilisateur INT(11),
	expire DATETIME,
	CONSTRAINT UtilisateurTokens FOREIGN KEY (utilisateur) REFERENCES Utilisateur(idUtilisateur),
	PRIMARY KEY(idTokens)
);

CREATE TABLE IF NOT EXISTS Inspecteur(
	idInspecteur INT(11) NOT NULL AUTO_INCREMENT,
	nomInspecteur TEXT,
	prenomInspecteur TEXT,
	agenceCNSR INT(11),
	utilisateur INT(11),
	CONSTRAINT AgenceCNSRInspecteur FOREIGN KEY (agenceCNSR) REFERENCES AgenceCNSR(idAgenceCNSR),
	CONSTRAINT UtilisateurInspecteur FOREIGN KEY (utilisateur) REFERENCES Utilisateur(idUtilisateur),
	PRIMARY KEY(idInspecteur)
);

CREATE TABLE IF NOT EXISTS Inspection(
	idInspection INT(11) NOT NULL AUTO_INCREMENT,
	verdicte TEXT,
	inspecteur INT(11),
	voiture INT(11),
	dateInspection DATETIME,
	CONSTRAINT VoitureInspection FOREIGN KEY (voiture) REFERENCES Voiture(idVoiture),
	CONSTRAINT InspectionInspecteur FOREIGN KEY (inspecteur) REFERENCES Inspecteur(idInspecteur),
	PRIMARY KEY(idInspection)
);

CREATE TABLE IF NOT EXISTS VisiteTechnique(
	idVisiteTechnique INT(11) NOT NULL AUTO_INCREMENT,
	dateVisite DATE,
	inspection INT(11),
	voiture INT(11),
	CONSTRAINT InspectionVisiteTechnique FOREIGN KEY (inspection) REFERENCES Inspection(idInspection),
	CONSTRAINT VoitureVisiteTechnique FOREIGN KEY (voiture) REFERENCES Voiture(idVoiture),
	PRIMARY KEY(idVisiteTechnique)
);