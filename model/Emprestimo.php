<?php
require_once "../config/database.php";
require 'Livro.php';
require 'Usuario.php';

class Emprestimo {
    private $conexao;
    private $tabela = 'emprestimo';
    public $id_emprestimo;
    public $id_usuario;
    public $id_livro;
    public $ativo;

    public function __construct($db){
        $this->conexao = $db;
    }

    public function getIdEmprestimo($id_emprestimo){
        $query = "SELECT * FROM {$this->tabela} WHERE id = {$this->id_emprestimo}";
        $resultado = $this->conexao->query($query);
        return $resultado->fetch_all(MYSQLI_ASSOC);
    }

    public function emprestar($usuario, $livro){
        $query = "INSERT INTO {$this->tabela} (id_usuario, id_livro, ativo) VALUES ('{$usuario->id_usuario}', '{$livro->id_livro}', '{$this->ativo}');";
        $resultado = $this->conexao->query($query);
        return $resultado;
    }

    public function devolver(){
        $query = "UPDATE {$this->tabela} SET ativo = false;";
        $resultado = $this->conexao->query($query);
        return $resultado;
    }

}