use hotel;

create table if not exists users(
	id int primary key auto_increment,
	nameUser varchar(255) NOT NULL,
	email varchar(255)NOT NULL,
	password varchar(255) NOT NULL
);

create table if not exists perros(
	id int primary key auto_increment,
	name varchar(255) NOT NULL,
	age int NOT NULL,
	numberDays int NOT NULL, 
	type VARCHAR(255)NOT NULL,
	raza VARCHAR(255)NOT NULL,
	muerde int NOT NULL
);


INSERT INTO perros (name, age, numberDays, type, raza, muerde)
VALUES ('Filomena', 4, 10, 'Grande', 'Labrador', 0);


INSERT INTO perros (name, age, numberDays, type, raza, muerde)
VALUES ('Bimba', 7, 12, 'Pequeño', 'Pincher', 1);

INSERT INTO perros (name, age, numberDays, type, raza, muerde)
VALUES ('Jerry', 11, 5, 'Grande', 'Mestizo', 0);


