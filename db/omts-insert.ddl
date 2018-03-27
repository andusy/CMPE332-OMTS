use omtsdb;

/*
	Insert the theatre complexes
*/
INSERT INTO TheatreComplex (address, city, postalCode, phone) VALUES
	('8725 Yonge St', 'Richmond Hill', 'L4C6Z1', '9057098755'),
	('179 Enterprise Blvd', 'Markham', 'L6G0E7', '9054791778'),
	('1800 Sheppard Ave E Y007', 'North York', 'M2J5A7', '4166447746')
;

/*  Theatres for location with postal code L4C6Z1  */
INSERT INTO Theatres (screenSize, maxSeats, theatreCompID) VALUES
	('L', 255, (SELECT theatreCompID FROM TheatreComplex WHERE postalCode = 'L4C6Z1')),
	('M', 200, (SELECT theatreCompID FROM TheatreComplex WHERE postalCode = 'L4C6Z1')),
	('L', 255, (SELECT theatreCompID FROM TheatreComplex WHERE postalCode = 'L4C6Z1'))
;

/*  Reset auto increment  */
ALTER TABLE Theatres AUTO_INCREMENT = 1;

/*  Theatres for location with postal code L4C6Z1  */
INSERT INTO Theatres (screenSize, maxSeats, theatreCompID) VALUES
	('L', 255, (SELECT theatreCompID FROM TheatreComplex WHERE postalCode = 'L6G0E7')),
	('L', 255, (SELECT theatreCompID FROM TheatreComplex WHERE postalCode = 'L6G0E7')),
	('L', 255, (SELECT theatreCompID FROM TheatreComplex WHERE postalCode = 'L6G0E7'))
;

/*  Reset auto increment  */
ALTER TABLE Theatres AUTO_INCREMENT = 1;

/*  Theatres for location with postal code L4C6Z1  */
INSERT INTO Theatres (screenSize, maxSeats, theatreCompID) VALUES
	('L', 255, (SELECT theatreCompID FROM TheatreComplex WHERE postalCode = 'M2J5A7')),
	('M', 200, (SELECT theatreCompID FROM TheatreComplex WHERE postalCode = 'M2J5A7')),
	('S', 150, (SELECT theatreCompID FROM TheatreComplex WHERE postalCode = 'M2J5A7'))
;

INSERT INTO Customer (fname, lname, address, city, postalCode, emailAddress, phoneNumber, username, password) VALUES
	('Andus', 'Yu', '1 ABC Street', 'North York', '123456', 'ay@gmail.com', '123456789', 'ay', 'pwd'),
	('Darian', 'Lio', '2 DEF Street', 'Richmond Hill', '789123', 'dl@gmail.com', '456789123', 'dl', 'pwd'),
	('Sean', 'Lee', '1 Microsoft Way', 'Redmond', '98052', 'SeanBrianLee@Microsoft.com', '789123456', 'sl', 'pwd')
;

INSERT INTO CreditCardInfo (creditNo, expiryDate, secCode, accountNumber) VALUES
	('1234567890123456', '1019', '123', (SELECT accountNumber FROM Customer WHERE fname = 'Andus' AND lname = 'Yu')),
	('1111111111111111', '0220', '111', (SELECT accountNumber FROM Customer WHERE fname = 'Darian' AND lname = 'Lio')),
	('2222222222222222', '0420', '222', (SELECT accountNumber FROM Customer WHERE fname = 'Sean' AND lname = 'Lee'))
;

INSERT INTO Admin (fname, lname, address, city, postalCode, emailAddress, phoneNumber, username, password) VALUES
	('Andus', 'Yu', '1 ABC Street', 'North York', '123456', 'ay@gmail.com', '123456789', 'ay', 'pwd'),
	('Darian', 'Lio', '2 DEF Street', 'Richmond Hill', '789123', 'dl@gmail.com', '456789123', 'dl', 'pwd'),
	('Sean', 'Lee', '1 Microsoft Way', 'Redmond', '98052', 'SeanBrianLee@Microsoft.com', '789123456', 'sl', 'pwd')
;

INSERT INTO Supplier (companyName, address, city, postalCode, phoneNumber, fname, lname) VALUES
	('Marvel Studios', '500 S. Buena Vista Street', 'Burbank', '91521', '2125764000', 'John', 'Smith'),
	('Toei Animation', '2-10-5 Higashioizumi', 'Tokyo', 'NA', '1234567891', 'Doflamingo', 'Donquixote')
;

INSERT INTO Movie (title, runTime, plotSynopsis, director, productionCompany, supplierName, startDate, endDate) VALUES
	('Avengers', 156, "When Thor's evil brother, Loki (Tom Hiddleston), gains access to the unlimited power of the energy cube called the Tesseract, Nick Fury (Samuel L. Jackson), director of S.H.I.E.L.D., initiates a superhero recruitment effort to defeat the unprecedented threat to Earth. Joining Fury's 'dream team' are Iron Man (Robert Downey Jr.), Captain America (Chris Evans), the Hulk (Mark Ruffalo), Thor (Chris Hemsworth), the Black Widow (Scarlett Johansson) and Hawkeye (Jeremy Renner).", 'Joss Whedon', 'Marvel Studios', (SELECT lname FROM Supplier WHERE companyName = 'Marvel Studios'), '2018-02-22', '2018-05-30'),
	('Black Panther', 135, "After the death of his father, T'Challa returns home to the African nation of Wakanda to take his rightful place as king. When a powerful enemy suddenly reappears, T'Challa's mettle as king -- and as Black Panther -- gets tested when he's drawn into a conflict that puts the fate of Wakanda and the entire world at risk. Faced with treachery and danger, the young king must rally his allies and release the full power of Black Panther to defeat his foes and secure the safety of his people.", 'Ryan Coogler', 'Marvel Studios', (SELECT lname FROM Supplier WHERE companyName = 'Marvel Studios'), '2018-01-29', '2018-05-30'),
	('Guardians Of The Galaxy', 122, "Brash space adventurer Peter Quill (Chris Pratt) finds himself the quarry of relentless bounty hunters after he steals an orb coveted by Ronan, a powerful villain. To evade Ronan, Quill is forced into an uneasy truce with four disparate misfits: gun-toting Rocket Raccoon, treelike-humanoid Groot, enigmatic Gamora, and vengeance-driven Drax the Destroyer. But when he discovers the orb's true power and the cosmic threat it poses, Quill must rally his ragtag group to save the universe.", 'James Gunn', 'Marvel Studios', (SELECT lname FROM Supplier WHERE companyName = 'Marvel Studios'), '2017-06-18', '2017-10-31'),
	('One Piece Film: Gold', 120, "The Straw Hat Pirates take on Gild Tesoro, one of the richest and most ambitious men in the world.", 'Hiroaki Miyamoto', 'Toei Animation', (SELECT lname FROM Supplier WHERE companyName = 'Toei Animation'), '2018-03-07', '2018-08-25')
;

INSERT INTO CustomerReview (movieTitle, reviewText, rating, accountNumber) VALUES
	((SELECT title FROM Movie WHERE title = "Black Panther") , 'Sublime', 'Good', (SELECT accountNumber FROM Customer WHERE fname = 'Andus' AND lname = 'Yu')),
	((SELECT title FROM Movie WHERE title = "Avengers") , "It's aight", 'Good', (SELECT accountNumber FROM Customer WHERE fname = 'Darian' AND lname = 'Lio')),
	((SELECT title FROM Movie WHERE title = "One Piece Film: Gold") , "I'm gonna be the pirate king", 'Good', (SELECT accountNumber FROM Customer WHERE fname = 'Andus' AND lname = 'Yu')),
	((SELECT title FROM Movie WHERE title = "Black Panther") , 'Sub-par representation of African Culture.', 'Bad', (SELECT accountNumber FROM Customer WHERE fname = 'Sean' AND lname = 'Lee'))
;

INSERT INTO Showing(theatreCompID, theatreNumber, startTime, title) VALUES
	(1, 1, TIMESTAMP '2018-3-27 21:00:00', "Black Panther"),
	(2, 1, TIMESTAMP '2018-3-27 21:00:00', "Black Panther"),
	(3, 1, TIMESTAMP '2018-3-27 20:30:00', "Black Panther"),
	(1, 2, TIMESTAMP '2018-3-27 19:30:00', "One Piece Film: Gold"),
	(3, 2, TIMESTAMP '2018-3-27 16:00:00', "Avengers")
;

/*
INSERT INTO Reservation (showingID, accountNumber, ticketsReserved) VALUES
;
*/

INSERT INTO MainActors(movieTitle, fname, lname) VALUES
	('Black Panther', 'Chadwick', 'Boseman'),
	('Black Panther', 'Michael', 'Jordan'),
	('Avengers', 'Chris', 'Evans'),
	('Avengers', 'Chris', 'Hemsworth'),
	('Avengers', 'Robert', 'Downey Jr.'),
	('Guardians Of The Galaxy', 'Chris', 'Pratt'),
	('Guardians Of The Galaxy', 'Chris', 'Pratt'),
	('One Piece Film: Gold', 'Mayumi', 'Tanaka'),
	('One Piece Film: Gold', 'Kappei', 'Yamaguchi'),
	('One Piece Film: Gold', 'Kazuya', 'Nakai')
;