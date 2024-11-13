<?php

require_once "C:/xampp/htdocs/Biblioteca141/model/Livro.php";

class LivroController {
    private $database;
    private $conexao;

    public function __construct() {
        $this->database = new Banco();
        $this->conexao = $this->database->conectar();
    }

    public function cadastrar($titulo, $autor, $genero, $isbn, $estaDisponivel) {
        $livro = new Livro($this->conexao);
        $livro->titulo = $titulo;
        $livro->autor = $autor;
        $livro->genero = $genero;
        $livro->isbn = $isbn;
        $livro->estaDisponivel = $estaDisponivel;

        if($livro->create()){    
            header("Location: index.php?acaoLivro=livro&isbn={$livro->isbn};");
        }
    }

    
    public function buscar($livro){
        $livro = new Livro($this->conexao);
        $livro->id_livro = $id_livro;

        if($livro->read()){
            header('Location: index.php');
        } else{
            echo "<script>alert(Livro não encontrado!)</script>";
        }
    }

    public function atualizar($livro){
        $livro = new Livro($this->conexao);
        $livro->id_livro = $id_livro;

        if ($livro->read('id_livro', $id_livro)) {
            $valores = [
                'titulo' => $_POST['titulo'],
                'autor' => $_POST['autor'],
                'genero' => $_POST['genero'],
                'isbn' => $_POST['isbn'],
                'estaDisponivel' => $_POST['estaDisponivel']
            ];
            
            $livro->update($valores);
            header('Location: index.php');
        } else {
            echo "<script>alert('Livro não encontrado!')</script>";
        }
    }

    public function deletar($livro){
        $livro = new Livro($this->conexao);
        $livro->id_livro = $id_livro;

        if ($livro->read('id_livro', $id_livro)) {
            $livro->delete();
            header('Location: index.php');
        } else {
            echo "<script>alert('Livro não encontrado!')</script>";
        }
    }

    // public function buscarLivro($livro){
    //     $livro = new Livro($this->conectarBd());
    //     $livro->id_livro = $id_livro;

    //     if($livro->read()){
    //         header('Location: index.php');
    //     } else{
    //         echo "<script>alert(Livro não encontrado!)</script>";
    //     }
    // }

    // public function atualizarLivro($livro){
    //     $livro = new Livro($this->conectarBd());
    //     $livro->id_livro = $id_livro;

    //     if($livro->read()){
    //         $livro->update();
    //     } else{
    //         echo "<script>alert(Erro ao atualizar livro!)</script>";
    //     }
    // }

    // public function deletarLivro($livro){
    //     $livro = new Livro($this->conectarBd());
    //     $livro->id_livro = $id_livro;

    //     if($livro->read()){
    //         $livro->delete();
    //     } else{
    //         echo "<script>alert(Erro ao deletar livro!)</script>";
    //     }
    // }

}

