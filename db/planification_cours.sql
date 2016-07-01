create table if not exists Ue(
	id int primary key auto_increment,
	nomUe varchar(200) ,
	nbreMatiere int 
);

create table if not exists Matiere(
	id int primary key auto_increment,
	nomMatiere varchar(200) ,
	id_prof int ,
	id_ue int,
	Quantum int ,
	coefficient int
);

 alter table Matiere 
 	add constraint fk_matiere_prof foreign key (id_prof) references enseignant_chercheur(id),
 	add constraint fk_matiere_ue foreign key (id_ue) references Ue(id);
