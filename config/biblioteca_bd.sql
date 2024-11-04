create database Biblioteca141;
use Biblioteca141;

create table usuario(
	id int primary key auto_increment,
    nome varchar(150),
    email varchar(100),
    senha varchar(40),
    cpf varchar(11)
);

create table livro(
	id int primary key auto_increment,
	titulo varchar(100),
    autor varchar(100),
    descricao varchar(300),
    isbn varchar(13),
    genero varchar(100)
    estaDisponivel Boolean
);

create table  emprestimo(
	id int primary key auto_increment,
    idUsuario int,
    idLivro int,
    dataEmprestimo date,
    dataDevolucao date,
    foreign key (idUsuario) references usuario(id),
    foreign key (idLivro) references livro(id)
);

-- FALTA ADICIONAR O STATUS DO LIVRO