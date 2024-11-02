<?php
require "./config/database.php";
require "./model/Livro.php";

class LivroController{
    public $livro;

    public function cadastrarLivro($titulo, $autor, $genero){
        $database = new Banco();
        $bd = $database->conectar();

        $this->livro = new Livro($bd);
        $this->livro = $titulo;
        $this->livro = $autor;
        $this->livro = $genero;

        if($livro->create()){
            header('Location: index.php');
        } else{
            echo "Erro ao cadastrar livro";
        }
    }

    public function lerLivro($livro){
        $database = new Banco();
        $bd = $database->conectar();

        if($livro->read()){
            header('Location: index.php');
        } else{
            echo "Erro ao ler livro";
        }
    }

    public function atualizarLivro($livro){
        $database = new Banco();
        $bd = $database->conectar();

        if($livro->update()){
            header('Location: index.php');
        } else{
            echo "Erro ao atualizar livro";
        }
    }

    public function deletarLivro($livro){
        $database = new Banco();
        $bd = $database->conectar();

        if($livro->delete()){
            header('Location: index.php');
        } else{
            echo "Erro ao deletar livro";
        }
    }
}