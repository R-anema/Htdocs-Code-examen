drop database if exists flowerinc;
create database flowerinc;
use flowerinc;

create table medewerkers(
    medewerker_id int auto_increment not null,
    voornaam varchar(20),
    achternaam varchar(20),
    gebruikersnaam varchar(20),
    wachtwoord varchar(20),
    admin TINYINT not null,
    PRIMARY KEY (medewerker_id)
);

create table magazijnen(
    magazijn_id int auto_increment not null,
    magazijnnaam varchar(20),
    locatie varchar(20),
    PRIMARY KEY (magazijn_id)
);

create table bloemen(
    bloem_id int auto_increment not null,
    magazijn_id int,
    bloemnaam varchar(20),
    locatie varchar(20),
    prijs varchar(20) not null,
    PRIMARY KEY (bloem_id),
    FOREIGN KEY (magazijn_id) REFERENCES magazijnen(magazijn_id)
);

INSERT INTO `medewerkers`(`medewerker_id`, `voornaam`, `achternaam`, `gebruikersnaam`, `wachtwoord`, `admin`) VALUES (1,'John','Doe','username','password','null');
INSERT INTO `magazijnen`(`magazijn_id`, `magazijnnaam`, `locatie`) VALUES (1,'Magazijn1','Venendaal');
INSERT INTO `bloemen`(`magazijn_id`, `bloemnaam`, `locatie`, `prijs`) VALUES (1,'roos','Venendaal','4,55');