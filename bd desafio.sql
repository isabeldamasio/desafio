create database desafio;
use desafio;

create table cliente(
	id int NOT NULL primary key auto_increment,
    nome varchar(100) not null,
    email varchar(256) not null,
    telefone char(20) not null
);

create table colaborador(
	id int NOT NULL primary key auto_increment,
    nome varchar(100) not null,
    email varchar(256) not null,
    telefone char(20) not null
);

create table chamado(
	id int NOT NULL primary key auto_increment,
	descricao_problema varchar (10000) not null,
	criticidade varchar (5) not null,
	status varchar (12) not null,
	data_abertura date not null,
    id_colaborador int,
foreign key (id_colaborador) references colaborador (id),
    id_cliente int not null,
foreign key (id_cliente) references cliente (id)
);

select * from cliente;