create database bdsistema default char set utf8;

use bdsistema;

create table usuario(
	id int auto_increment,
    email varchar(60),
    nome varchar(50),
    idade int,
    login varchar(30),
    senha varchar(500),
    primary key(id)
);

create table hemocentro(
	id int auto_increment,
    nome varchar(50),
    endereco varchar(100),
    telefone varchar(30),
    primary key(id)
);

create table evento(
	id int auto_increment,
    id_local int not null,
    id_organizador int not null,
    data dateTime,
    nome varchar(40),
    primary key(id),
    foreign key (id_local) references hemocentro(id),
    foreign key (id_organizador) references usuario(id)
);

create table eventousuario(
	id_evento int not null,
    id_usuario int not null,
    primary key(id_evento, id_usuario),
    foreign key(id_evento) references evento(id),
    foreign key(id_usuario) references usuario(id)
);