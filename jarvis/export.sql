create Database Sterrenstelsel;

CREATE TABLE planeten (
    planeetid int,
    planeetnaam varchar(255));

USE planeten;
INSERT INTO planeten (planeetid, planeetnaam)
VALUES ('1,Zon', '2,Mercurius', '3,Venus', '4,Aarde', '5,Mars');

USE sterrenstelsel;
TRUNCATE TABLE planeten;

USE sterrenstelsel;
ALTER TABLE planeten
ADD planeetdiameter int,
ADD planeetafstand int,
ADD planeetmassa int;

USE sterrenstelsel;
INSERT INTO planeten (planeetnaam, planeetdiameter, planeetafstand, planeetmassa)
VALUES
('Zon', 1392000, 0, 332946),
('Mercurius', 4880, 57910000, 0),
('Venus', 12104, 108208930, 1),
('Aarde', 12756, 149597870,1),
('Mars', 6794, 227936640,0);

USE sterrenstelsel;
ALTER TABLE planeten ALTER COLUMN planeetnaam varchar(255) NOT NULL;

USE sterrenstelsel;
ALTER TABLE planeten ALTER COLUMN planeetdiameter int NOT NULL;

USE sterrenstelsel;
ALTER TABLE planeten ALTER COLUMN planeetafstand int NOT NULL;

USE sterrenstelsel;
ALTER TABLE planeten ALTER COLUMN planeetmassa int NOT NULL;


USE sterrenstelsel;
ALTER TABLE planeten MODIFY planeetnaam varchar(255) NOT NULL;

USE sterrenstelsel;
ALTER TABLE planeten MODIFY planeetdiameter int NOT NULL;

USE sterrenstelsel;
ALTER TABLE planeten MODIFY planeetafstand int NOT NULL;

USE sterrenstelsel;
ALTER TABLE planeten MODIFY planeetafstand int NOT NULL;

USE sterrenstelsel;
ALTER TABLE planeten ADD planeetdiameter int;

USE sterrenstelsel;
ALTER TABLE planeten ADD id INT NOT NULL AUTO_INCREMENT PRIMARY KEY;

USE sterrenstelsel;
INSERT INTO planeten (planeetnaam, planeetdiameter, planeetafstand, planeetmassa)
VALUES ('Mars', 6794, 227936640,0);

USE sterrenstelsel;
UPDATE planeten
SET planeetnaam = 'Teenalp' WHERE id = 6;