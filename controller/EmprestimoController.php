<?php

class EmprestimoController{
    public $emprestimo;
    public $database;

    public function conectarBd(){
        $this->database = new Banco();
        return $this->database->conectar();
    }

    public function cadastrar($id_usuario, $id_livro, $ativo){
        $emprestimo = new Emprestimo($this->conectarBd());

        $this->emprestimo = $id_usuario;
        $this->emprestimo = $id_livro;
        $this->emprestimo = $ativo;

        if($this->emprestimo->create()){
            header('Location: index.php');
        } else{
            echo "Erro ao cadastrar empréstimo!";
        }
    }

    public function buscar($emprestimo){
        $emprestimo = new Emprestimo($this->conectarBd());
        $emprestimo->id_emprestimo = $id_emprestimo;

        if($emprestimo->read()){
            header('Location: index.php');
        } else{
            echo "<script>alert(Empréstimo não encontrado!)</script>";
        }
    }

    public function atualizar($emprestimo){
        $emprestimo = new Emprestimo($this->conectarBd());
        $emprestimo->id_emprestimo = $id_emprestimo;

        if ($emprestimo->read('id_emprestimo', $id_emprestimo)) {
            $valores = [
                'id_usuario' => $_POST['id_usuario'],
                'id_livro' => $_POST['id_livro'],
                'ativo' => $_POST['ativo']
            ];
            
            $emprestimo->update($valores);
            header('Location: index.php');
        } else {
            echo "<script>alert('Empréstimo não encontrado!')</script>";
        }
    }

    public function deletar($emprestimo){
        $emprestimo = new Emprestimo($this->conectarBd());
        $emprestimo->id_emprestimo = $id_emprestimo;

        if ($emprestimo->read('id_emprestimo', $id_emprestimo)) {
            $emprestimo->delete();
            header('Location: index.php');
        } else {
            echo "<script>alert('Empréstimo não encontrado!')</script>";
        }
    }
}