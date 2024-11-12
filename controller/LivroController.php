<?php
require_once "../config/database.php";
require_once "../model/livro.php";

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
            header("Location: ../index.php?acaoLivro=cadastrar");
            echo "<script>alert('DEU CERTO!');</script>";
        }
    }
}

$livro = new LivroController();
$livro->cadastrar("TESTE", "TESTE", "TESTE", "2141412412", True);
$livro->cadastrar("TESTE", "TESTE", "TESTE", "2141412412", True);

