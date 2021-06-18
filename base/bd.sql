create database Handy;

use Handy;

create table usuarios(
	idUsuario int primary key auto_increment,
    nome varchar(255) not null,
    idade smallint not null,
    genero varchar(255) default null,
    telefone varchar(20) not null,
    foto varchar(255) not null,
    estado varchar(255) not null,
    cidade varchar(255) not null,
    email varchar(255) not null,
    senha varchar(255) not null
);

create table servicos(
	idServico int primary key auto_increment,
    descricao varchar(255)
);

create table usuario_servicos(
	idUsuarioServicos int primary key auto_increment,
    idUsuario int,
    idServico int,
    cidade_atendimento varchar(255)
);

ALTER TABLE 
	usuario_servicos
ADD CONSTRAINT 
	fk_usuario 
FOREIGN KEY ( idUsuario ) REFERENCES usuarios ( idUsuario ) ;

ALTER TABLE 
	usuario_servicos
ADD CONSTRAINT 
	fk_servico 
FOREIGN KEY ( idServico ) REFERENCES servicos ( idServico ) ;


