Drop database if EXISTS flowerpower;
Create database flowerpower;
use flowerpower;

CREATE TABLE usertype (
    usertype_id int not null,
    TYPE INT,
    created_at DATE,
    updated_at TIMESTAMP,
    PRIMARY KEY(usertype_id)
);

CREATE TABLE account (
    account_id int not null,
    type int,
	email varchar(255) not null,
	password varchar(255) not null,
    admin INT not null,
    created_at DATE,
    updated_at TIMESTAMP,
    PRIMARY KEY(account_id),
    Foreign Key (type) REFERENCES Usertype(usertype_id)
);

CREATE TABLE medewerker (
    medewerkers_id int not null,
    account_id int,
	naam varchar(255) not null,
    tussenvoegsel varchar (255),
	achternaam varchar(255) not null,
    gebruikersnaam varchar(255) not null,
    admin INT not null,
    created_at DATE,
    updated_at TIMESTAMP,
    PRIMARY KEY(medewerkers_id),
    FOREIGN KEY(account_id) REFERENCES Account(account_id)
);

//klant id kan id worden.
CREATE TABLE klant (
    klant_id int not null,
    account_id int,
	naam varchar(255) not null,
    tussenvoegsel varchar (255),
	achternaam varchar(255) not null,
    gebruikersnaam varchar(255) not null,
    created_at DATE,
    updated_at TIMESTAMP,
    PRIMARY KEY(klant_id),
    FOREIGN KEY(account_id) REFERENCES Account(account_id)
);

create table artikel (
    artikel_id int not null,
    account_id int,
    artikel VARCHAR(255) not null,
    Prijs varchar(255) not null,
    created_at DATE,
    updated_at TIMESTAMP,
    PRIMARY KEY(artikel_id),
    Foreign Key(account_id) REFERENCES Account(account_id)
);

create table winkel(
    winkel_id int not null,
    vestiging varchar(255) not null,
    vestigingplaats varchar(255) not null,
    adres varchar(255) not null,
    postcode varchar(255) not null,
    telefoonnummer varchar(255) not null,
    created_at DATE,
    updated_at TIMESTAMP,
    PRIMARY KEY(winkel_id)
);

create table bestelling(
    bestelling_id int not null,
    Artikel varchar(255) not null,
    Winkel varchar(255) not null,
    Aantal varchar(255) not null,
    Klant varchar(255) not null,
    Medewerker varchar(255) not null,
    created_at DATE,
    updated_at TIMESTAMP,
    PRIMARY KEY (bestelling_id)
);

create table factuur(
    factuur_id int not null,
    Factuurregel varchar(255) not null,
    Factuurdatum varchar(255) not null,
    Klant varchar(255) not null,
    created_at DATE,
    updated_at TIMESTAMP,
    PRIMARY KEY(factuur_id)
);

create table factuurregel(
    factuurregel_id int not null,
    Artikel varchar(255) not null,
    Aantal varchar(255) not null,
    created_at DATE,
    updated_at TIMESTAMP,
    PRIMARY KEY(factuurregel_id)
);


Insert into Account(email, password)
Values ('Rianne@inmail.com','1234');

Insert into Persoon(account_id, naam, tussenvoegsel, achternaam, gebruikersnaam)
Values (1, 'Rianne', '', 'Anema', 'Rianneanema');
