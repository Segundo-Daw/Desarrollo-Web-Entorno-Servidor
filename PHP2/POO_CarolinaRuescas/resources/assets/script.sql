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

