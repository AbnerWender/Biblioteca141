<?php
require_once "./config/database.php";
require_once "./model/livro.php";

class LivroController{
    public $livro;
    public $database;

    public function conectarBd(){
        $this->database = new Banco();
        return $this->database->conectar();
    }

    public function cadastrar($titulo, $autor, $genero, $isbn, $estaDisponivel){
        $this->livro = new Livro($this->conectarBd());

        $this->livro = $titulo;
        $this->livro = $autor;
        $this->livro = $genero;
        $this->livro = $isbn;
        $this->livro = $estaDisponivel;
        if($this->livro->create()){
            header('Location: index.php');
        } else{
            echo "<script>alert(Erro ao cadastrar livro!)</script>";
        }
    }

    public function buscar($livro){
        $livro = new Livro($this->conectarBd());
        $livro->id_livro = $id_livro;

        if($livro->read()){
            header('Location: index.php');
        } else{
            echo "<script>alert(Livro não encontrado!)</script>";
        }
    }

    public function atualizar($livro){
        $livro = new Livro($this->conectarBd());
        $livro->id_livro = $id_livro;

        if ($livro->read('id_livro', $id_livro)) {
            $valores = [
                'titulo' => $_POST['titulo'],
                'autor' => $_POST['autor'],
                'genero' => $_POST['genero'],
                'isbn' => $_POST['isbn'],
                'estaDisponivel' => $_POST['estaDisponivel']
            ];
            
            $livro->update($valores);
            header('Location: index.php');
        } else {
            echo "<script>alert('Livro não encontrado!')</script>";
        }
    }

    public function deletar($livro){
        $livro = new Livro($this->conectarBd());
        $livro->id_livro = $id_livro;

        if ($livro->read('id_livro', $id_livro)) {
            $livro->delete();
            header('Location: index.php');
        } else {
            echo "<script>alert('Livro não encontrado!')</script>";
        }
    }
}