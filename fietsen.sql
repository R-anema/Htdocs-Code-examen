Drop database if EXISTS winkel;
CREATE database winkel;

USE winkel;

CREATE TABLE fietsen (
	fietsen_id INT AUTO_INCREMENT NOT NULL PRIMARY KEY,
    naam VARCHAR(255) NOT NULL,
    rating DECIMAL(2,1) NULL,
    samenvatting VARCHAR(100) NOT NULL
);

CREATE TABLE klant (
    klant_id INT AUTO_INCREMENT NOT NULL PRIMARY KEY,
    naam VARCHAR(255) NOT NULL,
    wachtwoord VARCHAR(255) NOT NULL,
    created_at DATE,
    updated_at TIMESTAMP
);

CREATE TABLE reservering (
    reservering_id INT AUTO_INCREMENT NOT NULL PRIMARY KEY,
    datum DATE,
    tijd TIMESTAMP,
    klant INT,
    aantal INT,
    reservering ENUM('ja', 'nee') NOT NULL,
    opmerkingen VARCHAR(255),
    FOREIGN KEY(klant) REFERENCES klant(klant_id)
);

INSERT INTO `fietsen`(`naam`, `rating`, `samenvatting`) VALUES ('damesfiets','4','een standaard damesfiets');