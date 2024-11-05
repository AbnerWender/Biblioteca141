<?php
require_once "../config/database.php";

class Usuario implements Crud{
    private $conexao;
    private $tabela = 'usuario';
    public $id_usuario;
    public $nome;
    public $email;
    public $senha;
    public $cpf;
    public $livrosEmprestados = [];
    const maxEmprestimo = 3;
    
    public function __construct($db){
        $this->conexao = $db;
    }

    public function getIdUsuario($id_usuario){
        $query = "SELECT * FROM {$this->tabela} WHERE id = {$this->id_usuario}";
        $resultado = $this->conexao->query($query);
        return $resultado->fetch_all(MYSQLI_ASSOC);
    }

    public function emprestar($livro){
        if(count($this->livrosEmprestados) >= self::maxEmprestimo){
            return "Limite máximo de empréstimo atingido";
        }
        array_push($this->livrosEmprestados, $livro);
    }

    public function devolver($livro){
        if(in_array($livro, $this->livrosEmprestados)){
            $posicao = array_search($livro, $this->livrosEmprestados);
            unset($this->livros_emprestados[$posicao]);
        }else{
            return "Livro não encontrado";
        }
    }

    public function create(){
        $query = "INSERT INTO {$this->tabela} (nome, email, senha, cpf) VALUES ('{$this->nome}', '{$this->email}', '{$this->senha}', '{$this->cpf}');";
        $resultado = $this->conexao->query($query);
        return $resultado;
    }

    public function read($coluna, $valor){}

    public function update($valores){
        $verificaSeExiste = "SELECT COUNT(*) FROM {$this->tabela} WHERE id = '{$this->id_usuario}';";
        $resultadoVerificacao = $this->conexao->query($verificaSeExiste);
    
        if ($resultadoVerificacao && $resultadoVerificacao->fetchColumn() === 0) {
            return "Usuário não encontrado";
        }

        if(in_array("cpf", $valores)){
            unset($valores['cpf']);
        };

        $query = "UPDATE {$this->tabela} SET ";
        $colunasArray = array_keys($valores);

        for($contador = 0; $contador < count($valores); $contador ++){
            $coluna = $colunasArray[$contador];
            $valor = $valores[$coluna];

            $query .= $contador != (count($valores)-1) ? $coluna . '= "'. $valor .'", ': $coluna . '= "'. $valor .'" ';
        }

        $query += "WHERE id_usuario = {$this->id_usuario};";
        $resultado = $this->conexao->query($query);
        return $resultado;
    }

    public function delete(){
        if(self::maxEmprestimo > 0){
            return "Não foi possivel deletar usuário\nUsuário com emprestimo ativo";
        };

        $query = "DELETE FROM {$this->tabela} WHERE id_livro = {$this->id_usuario};";
        $resultado = $this->conexao->query($query);
        return $resultado;
    }
}
