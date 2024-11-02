<?php
require_once "./config/database.php";

class Usuario implements Crud{
    private $conexao;
    private $tabela = 'usuario';
    public $id_usuario;
    public $nome;
    public $email;
    public $senha;
    public $dataNasc;
    
    public function __construct($db){
        $this->conexao = $db;
    }

    public function create(){
        $query =  "insert into usuario(nome, email, senha, dataNasc) values(".$this->nome.",".$this->email.",".$this->email.",".$this->senha.",".$this->dataNasc.");";
        $resultado = $this->conexao->query($query);
        return $resultado;
    }

    public function read(){
        $query = "select * from usuario where nome = ".$this->id_usuario.";";
        $resultado = $this->conexao->query($query);
        return $resultado;
    }

    public function update($valores){
        $query = "update usuario set ";
        $colunasArray = array_keys($valores);

        for($contador = 0; $contador < count($valores); $contador ++){
            $coluna = $colunasArray[$contador];
            $valor = $valores[$coluna];

            $query .= $contador != (count($valores)-1) ? $coluna . '= "'. $valor .'", ': $coluna . '= "'. $valor .'" ';
        }

        $query += 'where id_usuario = "'.$this->id_usuario.'";';
        $resultado = $this->conexao->query($query);
        return $resultado;
    }

    public function delete(){
        $query =  "delete from usuario where id_usuario = ".$this->id_usuario.";";
        $resultado = $this->conexao->query($query);
        return $resultado;
    }
}
