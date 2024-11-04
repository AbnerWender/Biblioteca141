<?php
require "../config/database.php";
require "../model/Livro.php";

class LivroController{
    public $livro;

    public function cadastrarLivro($titulo, $autor, $genero, $isbn, $estaDisponivel){
        $database = new Banco();
        $bd = $database->conectar();

        $this->livro = new Livro($bd);
        $this->livro = $titulo;
        $this->livro = $autor;
        $this->livro = $genero;
        $this->livro = $isbn;
        $this->livro = $estaDisponivel;

        if($this->livro->create()){
            header('Location: index.php');
        } else{
            echo "<script>alert(Erro ao cadastrar livro!)</script>";
        }
    }

    public function lerLivro($livro){
        $database = new Banco();
        $bd = $database->conectar();

        if($livro->read()){
            header('Location: index.php');
        } else{
            echo "Erro ao ler livro!";
        }
    }

    public function atualizarLivro($livro){
        $database = new Banco();
        $bd = $database->conectar();

        if($livro->update()){
            header('Location: index.php');
        } else{
            echo "<script>alert(Erro ao atualizar livro!)</script>";
        }
    }

    public function deletarLivro($livro){
        $database = new Banco();
        $bd = $database->conectar();

        if($livro->delete()){
            header('Location: index.php');
        } else{
            echo "Erro ao deletar livro!";
        }
    }
}
$livro = new LivroController();

$livro->cadastrarLivro("Dom Casmurro", "Henrique Verao", "Comedia", "111111111111", True);

var_dump($livro);