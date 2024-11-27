create database ipi_2;
use ipi_2;

create table if not exists usuario (
    id int auto_increment primary key,
    nome varchar(60) not null,
    data_nascimento date not null,
    email varchar(100) not null unique,
    telefone varchar(15) not null,
    cep varchar(15) not null,
    rua varchar(100) not null,
    numero int not null,
    bairro varchar(20) not null,
    cidade varchar(30) not null,
    estado varchar(2) not null,
    complemento varchar(4) not null,
    assunto varchar(100) not null,
    mensagem varchar(120) not null,
    senha varchar(1000) not null,
    cpf varchar(20) not null, 
    rg varchar(20) not null,
    data_registro timestamp
);