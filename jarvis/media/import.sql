Drop database if EXISTS media;
CREATE database media;

USE media;

CREATE TABLE items (
	items_id INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
    titel VARCHAR(100) NOT NULL,
    rating DECIMAL(2,1) NULL,
    samenvatting VARCHAR(100) NOT NULL,
    awards BIT NOT NULL,
    lengte VARCHAR(100) NOT NULL,
    releasedatum DATE NOT NULL,
    seizoenen INT NOT NULL,
    land ENUM('NL', 'UK') NOT NULL,
    taal ENUM('NL', 'EN') NOT NULL,
    trailerid INT NOT NULL,
    mediatype ENUM('serie', 'film') NOT NULL
);

INSERT INTO `items`(`titel`, `rating`, `samenvatting`, `awards`, `lengte`, `releasedatum`, `seizoenen`, `land`, `taal`, `trailerid`, `mediatype`) VALUES 
('Ponyo','4','Over Ponyo die een mens wil worden.','7','2 Uur','1998-02-06','0','UK','EN','https://www.youtube.com/watch?v=CsR3KVgBzSM','film'),
('Dark Crystal AOR', '5', 'Wanneer de Skeksis de Gelfling ontvoeren is het tijd om ze te verslaan.', 1, '5-10 uur', '2010', 1, 'UK', 'EN', 'https://www.youtube.com/watch?v=a3_owZfYVR8', 'serie');

CREATE TABLE gebruikers (
    gebruikers_id INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
    username VARCHAR(20) NOT NULL,
    wachtwoord VARCHAR(20) NOT NULL,
);

INSERT INTO `gebruikers`(`username`, `wachtwoord`) VALUES ('testpersoon','wachtwoord');

CREATE TABLE fancy_tabel (
    gebruikers_id INT auto_increment not null,
    username VARCHAR(20) NOT NULL,
    wachtwoord VARCHAR(20) NOT NULL,
    created_at DATE,
    updated_at TIMESTAMP,
    PRIMARY KEY(gebruikers_id)
);