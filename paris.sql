
drop database if exists paris ; 

create database paris ; 

use paris ; 

create table evenement (
	idevent int (5) not null auto_increment, 
	designation varchar (50), 
	dateevent date , 
	heureevent time, 
	description text, 
	prixplace float ,
	primary key (idevent)
);

create table personne (
	idpers int(5) not null auto_increment, 
	nom varchar(50), 
	prenom varchar (50), 
	email varchar (50), 
	telephone varchar(20), 
	adresse varchar (100),
	primary key (idpers)
);

create table participer (
	idpers int(5) not null, 
	idevent int(5) not null, 
	nbplaces int (2), 
	prixtotal float, 
	dateachat date, 
	commentaire text,
	primary key (idpers, idevent), 
	foreign key (idpers) references personne (idpers), 
	foreign key (idevent) references evenement (idevent)
 );
insert into evenement values (null, "Pièce de théâtre", "2020-05-11", "10:30", "Opéra de Paris", 25), 
	(null, "Match de foot", "2020-05-12", "21:00", "Stade de France vous accueille", 120); 

insert into personne values (null, "Paul", "Pierre","p@gmail.com", "0101010101", "20 rue de Paris"), 
	(null, "Olivier", "Kévin", "o@gmail.com", "02020202020", "20 rue de Lyon "); 

insert into participer values (1, 1, 3, 75, "2020-04-29", "Paiement effectué par carte"), 
	(2,1,2, 50, "2020-04-29", "Paiement par virement"); 

create view viewParticipations as (
	select e.designation, e.dateevent, p.nom, p.prenom, e.idevent, p.idpers, pr.nbplaces, pr.prixtotal, pr.dateachat, pr.commentaire
	from evenement e, personne p, participer pr
	where pr.idpers = p.idpers
	and pr.idevent = e.idevent
);

create table user (
	iduser int (5) not null auto_increment, 
	email varchar(100) not null, 
	mdp varchar(100) not null, 
	nom varchar(100), 
	prenom varchar(100), 
	telephone varchar(20), 
	droits varchar(20),
	primary key (iduser)
);

insert into user values (null, "a@gmail.com", "123", "Adrien", "Théo", "0101010101", "admin"), 
	(null, "b@gmail.com", "456", "Lucas", "Tristan", "0202020202", "user"); 


