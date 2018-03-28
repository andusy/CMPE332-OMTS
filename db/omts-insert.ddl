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
	('Toei Animation', '2-10-5 Higashioizumi', 'Tokyo', 'NA', '1234567891', 'Doflamingo', 'Donquixote'),
	('Warner Bros. Pictures', '4000 Warner Blvd', 'Burbank', 'NA', '4162508384', 'Tyrone', 'Williams')
;

INSERT INTO Movie (title, runTime, plotSynopsis, director, productionCompany, supplierName, startDate, endDate, rating) VALUES
	('Avengers: Infinity War', 156, "Iron Man, Thor, the Hulk and the rest of the Avengers unite to battle their most powerful enemy yet -- the evil Thanos. On a mission to collect all six Infinity Stones, Thanos plans to use the artifacts to inflict his twisted will on reality. The fate of the planet and existence itself has never been more uncertain as everything the Avengers have fought for has led up to this moment.", 'Anthony Russo', 'Marvel Studios', (SELECT lname FROM Supplier WHERE companyName = 'Marvel Studios'), '2018-02-22', '2018-05-30','PG-13'),
	('Black Panther', 135, "After the death of his father, T'Challa returns home to the African nation of Wakanda to take his rightful place as king. When a powerful enemy suddenly reappears, T'Challa's mettle as king -- and as Black Panther -- gets tested when he's drawn into a conflict that puts the fate of Wakanda and the entire world at risk. Faced with treachery and danger, the young king must rally his allies and release the full power of Black Panther to defeat his foes and secure the safety of his people.", 'Ryan Coogler', 'Marvel Studios', (SELECT lname FROM Supplier WHERE companyName = 'Marvel Studios'), '2018-01-29', '2018-05-30', 'PG-13'),
	('Guardians Of The Galaxy', 122, "Brash space adventurer Peter Quill (Chris Pratt) finds himself the quarry of relentless bounty hunters after he steals an orb coveted by Ronan, a powerful villain. To evade Ronan, Quill is forced into an uneasy truce with four disparate misfits: gun-toting Rocket Raccoon, treelike-humanoid Groot, enigmatic Gamora, and vengeance-driven Drax the Destroyer. But when he discovers the orb's true power and the cosmic threat it poses, Quill must rally his ragtag group to save the universe.", 'James Gunn', 'Marvel Studios', (SELECT lname FROM Supplier WHERE companyName = 'Marvel Studios'), '2017-06-18', '2017-10-31','PG-13'),
	('One Piece Film: Gold', 120, "The Straw Hat Pirates take on Gild Tesoro, one of the richest and most ambitious men in the world.", 'Hiroaki Miyamoto', 'Toei Animation', (SELECT lname FROM Supplier WHERE companyName = 'Toei Animation'), '2018-03-07', '2018-08-25','PG-13'),
	('Wonder Woman', 149, "Before she was Wonder Woman (Gal Gadot), she was Diana, princess of the Amazons, trained to be an unconquerable warrior. Raised on a sheltered island paradise, Diana meets an American pilot (Chris Pine) who tells her about the massive conflict that's raging in the outside world. Convinced that she can stop the threat, Diana leaves her home for the first time. Fighting alongside men in a war to end all wars, she finally discovers her full powers and true destiny.", 'Patty Jenkins','Warner Bros. Pictures', (SELECT lname FROM Supplier WHERE companyName = 'Warner Bros. Pictures'), '2018-04-27', '2018-09-01','PG-13'),
	('Justice League', 120, "Fueled by his restored faith in humanity and inspired by Superman's selfless act, Bruce Wayne enlists newfound ally Diana Prince to face an even greater threat. Together, Batman and Wonder Woman work quickly to recruit a team to stand against this newly awakened enemy. Despite the formation of an unprecedented league of heroes -- Batman, Wonder Woman, Aquaman, Cyborg and the Flash -- it may be too late to save the planet from an assault of catastrophic proportions.", 'Zack Snyder','Warner Bros. Pictures', (SELECT lname FROM Supplier WHERE companyName = 'Warner Bros. Pictures'), '2018-01-18', '2018-04-31','PG-13' )
;

INSERT INTO CustomerReview (movieTitle, reviewText, rating, accountNumber) VALUES
	((SELECT title FROM Movie WHERE title = "Black Panther") , 'Sublime', 'Good', (SELECT accountNumber FROM Customer WHERE fname = 'Andus' AND lname = 'Yu')),
	((SELECT title FROM Movie WHERE title = "Avengers: Infinity War") , "It's aight", 'Good', (SELECT accountNumber FROM Customer WHERE fname = 'Darian' AND lname = 'Lio')),
	((SELECT title FROM Movie WHERE title = "One Piece Film: Gold") , "I'm gonna be the pirate king", 'Good', (SELECT accountNumber FROM Customer WHERE fname = 'Andus' AND lname = 'Yu')),
	((SELECT title FROM Movie WHERE title = "Black Panther") , 'Sub-par representation of African Culture.', 'Bad', (SELECT accountNumber FROM Customer WHERE fname = 'Sean' AND lname = 'Lee'))
;

INSERT INTO Showing(theatreCompID, theatreNumber, startTime, title) VALUES
	(1, 1, TIMESTAMP '2018-3-27 21:00:00', "Black Panther"),
	(2, 1, TIMESTAMP '2018-3-27 21:00:00', "Black Panther"),
	(3, 1, TIMESTAMP '2018-3-27 20:30:00', "Black Panther"),
	(1, 2, TIMESTAMP '2018-3-27 19:30:00', "One Piece Film: Gold"),
	(3, 2, TIMESTAMP '2018-3-27 16:00:00', "Avengers: Infinity War")
;

/*
INSERT INTO Reservation (showingID, accountNumber, ticketsReserved) VALUES
;
*/

INSERT INTO MainActors(movieTitle, fname, lname) VALUES
	('Black Panther', 'Chadwick', 'Boseman'),
	('Black Panther', 'Michael', 'Jordan'),
	('Avengers: Infinity War', 'Chadwick', 'Boseman'),
	('Avengers: Infinity War', 'Chris', 'Evans'),
	('Avengers: Infinity War', 'Chris', 'Hemsworth'),
	('Avengers: Infinity War', 'Robert', 'Downey Jr.'),
	('Guardians Of The Galaxy', 'Chris', 'Pratt'),
	('One Piece Film: Gold', 'Mayumi', 'Tanaka'),
	('One Piece Film: Gold', 'Kappei', 'Yamaguchi'),
	('One Piece Film: Gold', 'Kazuya', 'Nakai'),
	('Wonder Woman', 'Gal', 'Gadot'),
	('Justice League', 'Gal', 'Gadot'),
	('Justice League', 'Ben', 'Affleck'),
	('Justice League', 'Henry', 'Cavill')
;