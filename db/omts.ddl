use omtsdb;

CREATE TABLE TheatreComplex(
	street		VARCHAR(30) NOT NULL,
	city		VARCHAR(30) NOT NULL, 
	postalCode 	CHAR(6)	NOT NULL,
	phone		CHAR(10) NOT NULL, 
	theatreCompID INT UNSIGNED NOT NULL AUTO_INCREMENT PRIMARY KEY
);

CREATE TABLE Theatres(
	screenSize	ENUM('S', 'M', 'L') NOT NULL,
	maxSeats TINYINT UNSIGNED NOT NULL,
	theatreCompID INT UNSIGNED NOT NULL,
	theatreNumber INT UNSIGNED NOT NULL AUTO_INCREMENT PRIMARY KEY,
	FOREIGN KEY (theatreCompID) REFERENCES theatreComplex(theatreCompID)
);

CREATE TABLE Customer(
	fname VARCHAR(30) NOT NULL, 
	lname VARCHAR(30) NOT NULL, 
	street VARCHAR(30) NOT NULL, 
	city VARCHAR(30) NOT NULL, 
	postalCode CHAR(6) NOT NULL,
	emailAddress VARCHAR(30) NOT NULL, 
	phoneNumber CHAR(10) NOT NULL, 
	username VARCHAR(30) NOT NULL, 
	password VARCHAR(30) NOT NULL, 
	accountNumber INT UNSIGNED NOT NULL AUTO_INCREMENT PRIMARY KEY
);

CREATE TABLE Reservation(
	accountNumber INT UNSIGNED NOT NULL, 
	ticketsReserved TINYINT UNSIGNED NOT NULL, 
	reservationID INT UNSIGNED NOT NULL AUTO_INCREMENT PRIMARY KEY, 
	FOREIGN KEY (accountNumber) REFERENCES Customer(accountNumber)
);

CREATE TABLE CreditCardInfo(
	creditNo CHAR(16) NOT NULL,
	expiryDate CHAR(4) NOT NULL,
	secCode CHAR(3) NOT NULL,
	accountNumber INT UNSIGNED NOT NULL,
	PRIMARY KEY(creditNo, expiryDate, secCode, accountNumber),
	FOREIGN KEY (accountNumber) REFERENCES Customer(accountNumber)
);

CREATE TABLE CustomerReview(
	reviewNum INT UNSIGNED NOT NULL AUTO_INCREMENT,
	reviewText VARCHAR(300) NOT NULL, 
	rating ENUM('Good', 'Bad') NOT NULL,
	accountNumber INT UNSIGNED NOT NULL,
	PRIMARY KEY (reviewNum, accountNumber),
	FOREIGN KEY (accountNumber) REFERENCES Customer (accountNumber)
);

CREATE TABLE Admin (
	EID INT UNSIGNED NOT NULL AUTO_INCREMENT,
	fname VARCHAR(30) NOT NULL,
	lname VARCHAR(30) NOT NULL,
	street VARCHAR(30) NOT NULL,
	city VARCHAR(30) NOT NULL,
	postalCode VARCHAR(6) NOT NULL,
	emailAddress VARCHAR(30) NOT NULL,
	phoneNumber VARCHAR(30) NOT NULL,
	username VARCHAR(30) NOT NULL,
	password VARCHAR(30) NOT NULL, 
	PRIMARY KEY (EID)
);

CREATE TABLE Supplier(
	companyName VARCHAR(40) NOT NULL,
	street VARCHAR(30) NOT NULL,
	city VARCHAR(30) NOT NULL,
	postalCode VARCHAR(6) NOT NULL,
	phoneNumber VARCHAR(20) NOT NULL,
	fname VARCHAR(30) NOT NULL,
	lname VARCHAR(30) NOT NULL,
	PRIMARY KEY (companyName)
);

CREATE TABLE Movie (
	title VARCHAR(30) NOT NULL,
	runTime INT UNSIGNED NOT NULL,
	plotSynopsis VARCHAR(1000) NOT NULL, 
	director VARCHAR(30) NOT NULL, 
	productionCompany VARCHAR(30) NOT NULL,
	supplierName VARCHAR(30) NOT NULL,
	startDate DATE NOT NULL,
	endDate DATE NOT NULL,
	rating INT UNSIGNED NOT NULL,
	PRIMARY KEY (title),
	FOREIGN KEY (supplierName) REFERENCES Supplier(CompanyName)
);

CREATE TABLE Showing(
	theatreNumber INT UNSIGNED NOT NULL, 
	startTime TIMESTAMP NOT NULL,
	seatsAvailable TINYINT UNSIGNED NOT NULL, 
	title VARCHAR(30) NOT NULL, 
	PRIMARY KEY(theatreNumber, startTime, seatsAvailable, title),
	FOREIGN KEY (title) REFERENCES Movie(title)
);

CREATE TABLE MainActors(
	actorID INT UNSIGNED NOT NULL AUTO_INCREMENT,
	movieTitle VARCHAR(30) NOT NULL,
	fname VARCHAR(30) NOT NULL,
	lname VARCHAR(30) NOT NULL,
	PRIMARY KEY (actorID),
	FOREIGN KEY (movieTitle) REFERENCES Movie(title)
);