<?php
require_once __DIR__ . "/../config/database.php";
require "Crud.php";

class Livro implements Crud{
    private $conexao;
    private $tabela = 'livro';

    public $id_livro;
    public $titulo;
    public $autor;
    public $isbn;
    public $genero;
    public $usuario;
    public $estaDisponivel = true;

    public function __construct($db){
        $this->conexao = $db;
    }

    public function getIdLivro($id_livro){
        $query = "SELECT * FROM {$this->tabela} WHERE id = {$this->id_livro}";
        $resultado = $this->conexao->query($query);
        return $resultado->fetch_all(MYSQLI_ASSOC);
    }

    // public function emprestar($usuario){
    //     if($this->estaDisponivel == false){
    //         return '<script>alert("Livro já está emprestado")</script>';
    //     }
    //     $this->usuario = $usuario;
    //     $this->estaDisponivel = false;
    // }

    // public function devolver(){
    //     if($this->estaDisponivel == true){
    //         echo 'Livro não está emprestado';
    //         return;
    //     }
    //     $this->usuario = null;
    //     $this->estaDisponivel = true;
    // }

    public function create(){
        $verificarIsbn = "SELECT COUNT(*) FROM {$this->tabela} WHERE isbn = '{$this->isbn}';";
        $resultadoVerificacao = $this->conexao->query($verificarIsbn);

        if ($resultadoVerificacao && $resultadoVerificacao->fetchColumn() > 0) {
            return "<script>alert('Livro já cadastrado')</script>";
        }

        $query = "INSERT INTO {$this->tabela} (titulo, autor, genero) VALUES ('{$this->titulo}', '{$this->autor}', '{$this->genero}');";
        $resultado = $this->conexao->query($query);
        return $resultado;
    }

    public function read($valor){
        $query = "SELECT * FROM {$this->tabela} WHERE titulo = '{$valor}' OR autor = '{$valor}' OR isbn = '{$valor}' OR genero = '{$valor}';";
        $resultado = $this->conexao->query($query);
        return $resultado;
    }

    public function update($valores){
        $verificaSeExiste = "SELECT COUNT(*) FROM {$this->tabela} WHERE id = '{$this->id_livro}';";
        $resultadoVerificacao = $this->conexao->query($verificaSeExiste);
    
        if ($resultadoVerificacao && $resultadoVerificacao->fetchColumn() === 0) {
            return "<script>alert('Livro não encontrado')</script>";
        }

        if(in_array("isbn", $valores)){
            unset($valores['isbn']);
        };

        $query = "UPDATE {$this->tabela} SET ";
        $colunasArray = array_keys($valores);

        for($contador = 0; $contador < count($valores); $contador ++){
            $coluna = $colunasArray[$contador];
            $valor = $valores[$coluna];

            $query .= $contador != (count($valores)-1) ? $coluna . '= "'. $valor .'", ': $coluna . '= "'. $valor .'" ';
        }

        $query += "WHERE id_livro = {$this->id_livro};";
        $resultado = $this->conexao->query($query);
        return $resultado;
    }

    public function delete(){
        if(!$this->estaDisponivel){
            return "<script>alert('Não é possivel deletar livro emprestado')</script>";
        };

        $query = "DELETE FROM {$this->tabela} WHERE id_livro = {$this->id_livro};";
        $resultado = $this->conexao->query($query);
        return $resultado;
    }
}



