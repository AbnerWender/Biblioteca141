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
}
