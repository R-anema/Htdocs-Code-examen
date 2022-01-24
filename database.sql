drop database if exists diner;
create database diner;
use diner;

create table bestellingen (
    bestellingen_id int auto_increment not null,
    reservering_id int,
    menuitem_id int,
    aantal int,
    gereserveerd tinyint,
    PRIMARY KEY (bestellingenID),
    FOREIGN KEY (reservering_id) REFERENCES reserveringen(reserveringen_id), 
    FOREIGN KEY (menuitem_id) REFERENCES menuitems(menuitems_id)
);

create table gerechtcategorien (
    gerechtcategorienID int auto_increment not null primary key,
    code varchar(3),
    naam varchar(20),
    UNIQUE(code)
);

create table gerechtsoorten (
    gerechtsoorten_id int auto_increment not null,
    code varchar(3) unique,
    naam varchar(20),
    gerechtcategorie_id int,
    PRIMARY KEY (gerechtsoorten_id),
    FOREIGN KEY (gerechtcategorie_id) REFERENCES gerechtcategorien(gerechtcategorien_id),
    UNIQUE(code)
);

create table klanten (
    klanten_id int auto_increment not null,
    naam varchar(20),
    telefoon varchar(20),
    email varchar(128),
    PRIMARY KEY (klanten_id)
);

create table medewerker (
    medewerker_id int not null,
    naam varchar(20) not null,
    password varchar(20) not null,
    admin INT not null,
    PRIMARY KEY (medewerker_id)
);

create table menuitems (
    menuitems_id int auto_increment not null,
    code varchar(4),
    naam varchar(30),
    prijs varchar(20) not null,
    gerechtsoort_id int,
    PRIMARY KEY (menuitems_id),
    FOREIGN KEY (gerechtsoort_id) REFERENCES gerechtsoorten(gerechtsoorten_id),
    unique(code)
);

create table reserveringen (
    reserveringen_id int auto_increment not null,
    tafel int,
    datum date unique,
    tijd time unique,
    klant_id int,
    aantal int,
    status tinyint(1),
    datum_toegevoegd timestamp,
    aantal_k int,
    allergieen text,
    opmerkingen text,
    PRIMARY KEY (reserveringen_id),
    FOREIGN KEY (klant_id) REFERENCES klanten(klanten_id)
);

use diner;
CREATE UNIQUE INDEX bestellignindex ON bestellingen(reservering_id, menuitem_id);
CREATE UNIQUE INDEX gerechtsoortenindex ON gerechtsoorten(code);
CREATE UNIQUE INDEX menuitemsindex ON menuitems(gerechtsoort_id);
CREATE UNIQUE INDEX reserveringindex ON reserveringen(klant_id);

insert into medewerker('naam', 'password') values ('testkok', '1234');

insert into klanten('naam', 'telefoon', 'email') values ('Hans', '00000000', 'hanskok@mail.com');

alter table menuitems add prijs varchar(20);

insert into 'gerechtcategorien'('code', 'naam') values
('drk', 'Dranken'),
('hap', 'Hapjes'),
('hog', 'Hoofdgerechten'),
('nag', 'Nagerechten'),
('vog', 'Voorgerechten');

insert into 'gerechtsoorten'('gerechtsoorten_id', 'code', 'naam', 'gerechtcategorie_id') values
(1, 'Wa', 'Warme dranken', '2' ),
(2, 'Ko', 'Koude dranken', '2'),
(3, 'Br', 'Bieren', '2'),
(4, 'Frs', 'Frisdranken', '2'),
(5, 'Wjn', 'Wijnen', '2'),
(6, 'Kh', 'Koude Hapjes', '6'),
(7, 'Wh', 'Warme Hapjes', '6'),
(8, 'Vg', 'Vegetarisch', '4');

insert into 'menuitems'('menuitems_id', 'code', 'naam', 'gerechtsoort_id', 'prijs') values (1, 'Ko', 'Pilsner', 2, 5)

insert into 'menuitems'('menuitems_id', 'code', 'naam', 'gerechtsoort_id', 'prijs') values (1, 'Kh', 'Vla', 6, 4)

insert into klanten ('naam', 'telefoon', 'email') values ('Karen Slinky', '0908340096', 'karenslink@hotmail.com')

insert into reserveringen ('reserveringen_id', 'tafel', 'datum', 'tijd', 'klant_id', 'aantal', 'status', 'datum_toegevoegd', 'aantal_k', 'allergieen', 'opmerkingen') values
('1', '4', '2010-04-06', '2008', '2', '6', 'bezet', '2021', '4', 'geen', 'geen')

insert into 'bestellingen'('bestellingen_id', 'reservering_id', 'menuitem_id', 'aantal', 'gereserveerd') values (1, 1, 2, 3, 4)