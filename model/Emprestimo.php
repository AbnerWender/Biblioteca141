<?php


// require_once __DIR__ . "../config/database.php";
require 'Livro.php';
require 'Usuario.php';

// require_once "../config/database.php";
// require 'Livro.php';
// require 'Usuario.php';


// class Emprestimo {
//     private $conexao;
//     private $tabela = 'emprestimo';
//     public $id_emprestimo;
//     public $id_usuario;
//     public $id_livro;
//     public $ativo;

//     public function __construct($db){
//         $this->conexao = $db;
//     }

//     public function getIdEmprestimo($id_emprestimo){
//         $query = "SELECT * FROM {$this->tabela} WHERE id = {$this->id_emprestimo}";
//         $resultado = $this->conexao->query($query);
//         return $resultado->fetch_all(MYSQLI_ASSOC);
//     }

require_once "../config/database.php";
require 'Livro.php';
require 'Usuario.php';

class Emprestimo{
    private $conexao;
    private $tabela = 'emprestimo';
    public $id_emprestimo;
    public $id_usuario;
    public $id_livro;
    public $ativo;

    public function __construct($db){
        $this->conexao = $db;
    }

    public function getIdEmprestimo($id){
        $query = "SELECT * FROM {$this->tabela} WHERE id = {$this->id_emprestimo}";
        $resultado = $this->conexao->query($query);
        return $resultado->fetch_all(MYSQLI_ASSOC);
    }

    public function realizarEmprestimo($usuario, $livro){}

    public function devolverEmprestimo(){}
}

