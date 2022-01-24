USE netland;

CREATE TABLE films (
	volgnummer MEDIUMINT NOT NULL AUTO_INCREMENT PRIMARY KEY,
    filmtitel VARCHAR(100) NOT NULL,
    filmduur INT NOT NULL,
    filmdatum DATE,
    filmuitkomst VARCHAR(100),
    filmomschrijving TEXT NOT NULL,
    trailerid INT NOT NULL
);

INSERT INTO films (`filmtitel`, `filmduur`, `filmdatum`, `filmuitkomst`, `filmomschrijving`, `trailerid`)
VALUES 
	('Spirited Away', 2, 1998-03-04, 'Ergens rond 2010', 'Ze wordt verwelkomd door Michael, de \'architect\' van het utopische dorpje waar ze voor eeuwig gaat wonen.', 1);

INSERT INTO films (`filmtitel`, `filmduur`, `filmdatum`, `filmuitkomst`, `filmomschrijving`, `trailerid`)
VALUES 
	('Lost', 2, 1998-03-04, 'Ergens rond 2010', 'Alleen op een eiland.', 2),
    ('Liverpool', 2, 1998-03-04, 'Ergens rond 2010', 'Voetbalfilm.', 3),
    ('Ponyo', 2, 1998-03-04, 'Ergens rond 2010', 'Over een vis die een jongetje ontmoet en mens wil worden.', 4),
    ('HastagAlive', 2, 2010-03-04, 'Ergens rond 2010', 'Een zombie flick in quarantaine.', 5);