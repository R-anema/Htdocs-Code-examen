Drop database if EXISTS hotel;
Create database hotel;
use hotel;

CREATE TABLE usertype (
    usertype_id int not null,
    TYPE INT,
    created_at DATE,
    updated_at TIMESTAMP,
    PRIMARY KEY(usertype_id)
);

CREATE TABLE overzicht (
    overzicht_id int not null,
    type int,
    reservering_overzicht int not null,
    klant_overzicht int not null,
    reserveringsperiode_overzicht int not null,
    PRIMARY KEY(overzicht_id),
    FOREIGN KEY(klant_overzicht) REFERENCES klant(klant_id),
    FOREIGN KEY(reservering_overzicht) REFERENCES reservering(reservering_id),
    FOREIGN KEY(reserveringsperiode_overzicht) REFERENCES reserveringsperiode(reserveringsperiode_id)
);

CREATE TABLE reserveringsperiode (
    reserveringsperiode_id int not null,
    incheckdatum DATE,
    uitcheckdatum DATE,
    gereserveerde_periode varchar(255),
    PRIMARY KEY(reserveringsperiode_id)
);

CREATE TABLE reservering (
    reservering_id int not null,
    reservering_klant int,
    reserveringsnummer_klant int,
	PRIMARY KEY(reservering_id),
    FOREIGN KEY(reservering_klant) REFERENCES klant(klant_id)
);

CREATE TABLE klant (
    klant_id int not null,
    kamernummer_klant int,
    naam_klant varchar(255),
    adres_klant varchar(255),
    plaats_klant varchar(255),
    postcode_klant varchar(255),
    telefoon_klant varchar(255)
);