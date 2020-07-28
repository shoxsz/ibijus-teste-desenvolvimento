create database MeusLocais;
use MeusLocais;

create table Locais(
  id int(10) primary key auto_increment,
  nome varchar(100),
  cep varchar(8),
  logradouro varchar(150),
  complemento varchar(100),
  numero varchar(6),
  bairro varchar(100),
  uf varchar(2),
  cidade varchar(100),
  data date
);