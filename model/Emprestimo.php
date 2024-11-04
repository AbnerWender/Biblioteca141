<?php
require_once "./config/database.php";
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

    public function create($usuario, $livro){
        if(self::maxEmprestimo >= 3 and $estaDisponivel == false){
            return "Não foi Possivel realizar emprestimo";
        };
        $query = "INSERT INTO {$this->tabela} (id_usuario, id_livro, dataEmprestimo, dataDevolucao) VALUES ('{$this->id_usuario}', '{$this->id_livro}', '{$this->dataEmprestimo}', '{$this->dataDevolucao}');";
        $resultado = $this->conexao->query($query);
        return $resultado;
    }

    public function read(){
        $query = "SELECT * FROM {$this->tabela} WHERE id_emprestimo = {$this->id_emprestimo};";
        $resultado = $this->conexao->query($query);
        return $resultado;
    }
}