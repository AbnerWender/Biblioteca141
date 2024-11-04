<?php
require_once "../config/database.php";

class Livro implements Crud{
    private $conexao;
    private $tabela = 'livro';

    public $id_livro;
    public $titulo;
    public $autor;
    public $isbn;
    public $genero;
    public $estaDisponivel = true;

    public function __construct($db){
        $this->conexao = $db;
    }

    public function getIdLivro($id_livro){
        $query = "SELECT * FROM {$this->tabela} WHERE id = {$this->id_livro}";
        $resultado = $this->conexao->query($query);
        return $resultado->fetch_all(MYSQLI_ASSOC);
    }

    public function emprestar(){
        
    }

    public function create(){
        $verificarIsbn = "SELECT COUNT(*) FROM {$this->tabela} WHERE isbn = '{$this->isbn}';";
        $resultadoVerificacao = $this->conexao->query($verificarIsbn);

        if ($resultadoVerificacao && $resultadoVerificacao->fetchColumn() > 0) {
            return "Livro já cadastrado";
        }

        $query = "INSERT INTO {$this->tabela} (titulo, autor, genero) VALUES ('{$this->titulo}', '{$this->autor}', '{$this->genero}');";
        $resultado = $this->conexao->query($query);
        return $resultado;
    }

    public function read($coluna, $valor){
        $query = "SELECT * FROM {$this->tabela} WHERE {$coluna} = {$valor};";
        $resultado = $this->conexao->query($query);
        return $resultado;
    }

    public function update($valores){
        $verificaSeExiste = "SELECT COUNT(*) FROM {$this->tabela} WHERE id = '{$this->id_livro}';";
        $resultadoVerificacao = $this->conexao->query($verificaSeExiste);
    
        if ($resultadoVerificacao && $resultadoVerificacao->fetchColumn() === 0) {
            return "Livro não encontrado";
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
        if($this->estaDisponivel == false){
            return "Não é possivel deletar livro emprestado.";
        };

        $query = "DELETE FROM {$this->tabela} WHERE id_livro = {$this->id_livro};";
        $resultado = $this->conexao->query($query);
        return $resultado;
    }
}



