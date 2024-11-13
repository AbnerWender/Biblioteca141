<?php
require_once __DIR__ . "/../config/database.php";
require "Crud.php";

class Livro {
    private $conexao;
    private $tabela = 'livro';

    public $id_livro;
    public $titulo;
    public $autor;
    public $isbn;
    public $genero;
    public $usuario;
    public $estaDisponivel = true;

    public function __construct($conexao) {
        $this->conexao = $conexao;
    }

    public function getIdLivro($id_livro){
        $query = "SELECT * FROM {$this->tabela} WHERE id = {$this->id_livro}";
        $resultado = $this->conexao->query($query);
        return $resultado->fetch_all(MYSQLI_ASSOC);
    }

    public function create() {
        // Verifica se o ISBN já está cadastrado
        $verificarIsbn = "SELECT COUNT(*) as total FROM {$this->tabela} WHERE isbn = '{$this->isbn}';";
        $resultadoVerificacao = $this->conexao->query($verificarIsbn);
    
        // Verifica se a consulta foi bem-sucedida e se o ISBN já existe
        if ($resultadoVerificacao) {
            $linha = $resultadoVerificacao->fetch_assoc();
            if ($linha['total'] > 0) {
                return "<script>alert('Livro já cadastrado');</script>";
            }
        }


        $query = "INSERT INTO {$this->tabela} (titulo, autor, genero, isbn, esta_disponivel) VALUES ('{$this->titulo}', '{$this->autor}', '{$this->genero}', '{$this->isbn}', '{$this->estaDisponivel}');";
        $resultado = $this->conexao->query($query);
        return $resultado;
    }

    public function read($valor){
        if($valor == ""){
            $query = "SELECT * FROM {$this->tabela};";
        }else{
            $query = "SELECT * FROM {$this->tabela} WHERE titulo = '{$valor}' OR autor = '{$valor}' OR isbn = '{$valor}' OR genero = '{$valor}';";
        }
        $resultado = $this->conexao->query($query);
        return $resultado;
    }

    public function update($valores){
        $verificaSeExiste = "SELECT COUNT(*) FROM {$this->tabela} WHERE id = '{$this->id_livro}';";
        $resultadoVerificacao = $this->conexao->query($verificaSeExiste);

    
        // Prepara a consulta SQL para inserir o novo livro
        $query = "INSERT INTO {$this->tabela} (titulo, autor, genero, isbn, estaDisponivel) VALUES (?, ?, ?, ?, ?);";
        
        // Prepara a declaração
        $stmt = $this->conexao->prepare($query);
        
        // Verifica se a preparação foi bem-sucedida
        if ($stmt === false) {
            return "<script>alert('Erro ao preparar a consulta');</script>";
        }
    
        // Liga os parâmetros
        $stmt->bind_param("ssssi", $this->titulo, $this->autor, $this->genero, $this->isbn, $this->estaDisponivel);
    
        // Executa a declaração
        if ($stmt->execute()) {
            return true; // Retorna true se a inserção foi bem-sucedida
        } else {
            return "<script>alert('Erro ao cadastrar livro');</script>";
        }
    }

    public function delete(){
         if(!$this->estaDisponivel){
             return "<script>alert('Não é possivel deletar livro emprestado')</script>";
         };

         $query = "DELETE FROM {$this->tabela} WHERE id_livro = {$this->id_livro};";
         $resultado = $this->conexao->query($query);
         return $resultado;
    }

    //     public function read($coluna, $valor){
//         $query = "SELECT * FROM {$this->tabela} WHERE {$coluna} = {$valor};";
//         $resultado = $this->conexao->query($query);
//         return $resultado;
//     }

//     public function update($valores){
//         $verificaSeExiste = "SELECT COUNT(*) FROM {$this->tabela} WHERE id = '{$this->id_livro}';";
//         $resultadoVerificacao = $this->conexao->query($verificaSeExiste);
    
//         if ($resultadoVerificacao && $resultadoVerificacao->fetchColumn() === 0) {
//             return "<script>alert('Livro não encontrado')</script>";
//         }

//         if(in_array("isbn", $valores)){
//             unset($valores['isbn']);
//         };

//         $query = "UPDATE {$this->tabela} SET ";
//         $colunasArray = array_keys($valores);

//         for($contador = 0; $contador < count($valores); $contador ++){
//             $coluna = $colunasArray[$contador];
//             $valor = $valores[$coluna];

//             $query .= $contador != (count($valores)-1) ? $coluna . '= "'. $valor .'", ': $coluna . '= "'. $valor .'" ';
//         }

//         $query += "WHERE id_livro = {$this->id_livro};";
//         $resultado = $this->conexao->query($query);
//         return $resultado;
//     }

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

}



