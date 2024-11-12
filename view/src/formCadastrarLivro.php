<?php

include('header.php');  
include('../template/formCadastrarLivro.php');



if (isset($_GET['acaoLivro']) && $_GET['acaoLivro'] === 'cadastrar') {
    $Banco = new Banco();
    $conn = $Banco->conectar();

    $livro = new Livro($conn);

    $livro->titulo = $_POST['titulo'];
    $livro->autor = $_POST['autor'];
    $livro->genero = $_POST['genero'];
    $livro->isbn = $_POST['isbn'];
    $livro->estaDisponivel = $_POST['estaDisponivel'] === '1' ? true : false;

    if ($livro->create()) {
        echo "<script>alert('Livro cadastrado com sucesso!');</script>";
    } else {
        echo "<script>alert('Erro ao cadastrar o livro.');</script>";
    }
}
