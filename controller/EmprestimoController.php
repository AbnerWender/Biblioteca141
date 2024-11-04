<?php

class EmprestimoController{
    public $emprestimo;

    public function emprestarLivro(){
        $database = new Banco();
        $bd = $database->conectar();

        if($emprestimo->update()){
            header('Location: index.php');
        } else{
            echo "Erro ao emprestar livro!";
        }
    }

    public function devovlerLivro(){
        $database = new Banco();
        $bd = $database->conectar();

        if($emprestimo->update()){
            header('Location: index.php');
        } else{
            echo "Erro ao devolver livro!";
        }
    }
}