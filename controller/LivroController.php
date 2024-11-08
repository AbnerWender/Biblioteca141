<?php
require __DIR__ . '/../config/database.php';
require __DIR__ . '/../model/livro.php';

class LivroController{
    public $livro;
    public $database;

    public function conectarBd(){
        $this->database = new Banco();
        return $this->database->conectar();
    }

    public function cadastrarLivro($titulo, $autor, $genero, $isbn, $estaDisponivel){
        $livro = new Livro($this->conectarBd());

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

    public function buscarLivro($livro){
        $livro = new Livro($this->conectarBd());
        $livro->id_livro = $id_livro;

        if($livro->read()){
            header('Location: index.php');
        } else{
            echo "<script>alert(Livro não encontrado!)</script>";
        }
    }

    public function atualizarLivro($livro){
        $livro = new Livro($this->conectarBd());
        $livro->id_livro = $id_livro;

        if($livro->read()){
            $livro->update();
        } else{
            echo "<script>alert(Erro ao atualizar livro!)</script>";
        }
    }

    public function deletarLivro($livro){
        $livro = new Livro($this->conectarBd());
        $livro->id_livro = $id_livro;

        if($livro->read()){
            $livro->delete();
        } else{
            echo "<script>alert(Erro ao deletar livro!)</script>";
        }
    }
}