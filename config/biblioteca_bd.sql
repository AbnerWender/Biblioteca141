create database Biblioteca141;
use Biblioteca141;

create table usuario(
	id int primary key auto_increment,
    nome varchar(150),
    email varchar(100),
    senha varchar(40),
    dataNasc date    
);

create table livro(
	id int primary key auto_increment,
	titulo varchar(100),
    autor varchar(100),
    descricao varchar(300),
    genero varchar(100)
);

create table emprestimo(
	id int primary key auto_increment,
    id_usuario int,
    id_livro int,
    dataEmprestimo date,
    dataDevolucao date,
    foreign key (id_usuario) references usuario(id),
    foreign key (id_livro) references livro(id)
);