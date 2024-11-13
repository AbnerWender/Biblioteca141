create database Biblioteca141;
use Biblioteca141;

create table usuario (
    id_usuario int primary key auto_increment,
    nome varchar(150) not null,
    email varchar(100) not null unique,
    senha varchar(255) not null,
    cpf char(11) not null unique
);

create table livro (
    id_livro int primary key auto_increment,
    titulo varchar(100) not null,
    autor varchar(100) not null,
    descricao varchar(300) not null,
    isbn char(13) not null,
    genero varchar(100) not null,
    esta_disponivel boolean not null default true
);

create table emprestimo (
    id_emprestimo int primary key auto_increment,
    id_usuario int not null,
    id_livro int not null,
    data_emprestimo date not null,
    data_devolucao date not null,
    foreign key (id_usuario) references usuario(id_usuario),
    foreign key (id_livro) references livro(id_livro)
)