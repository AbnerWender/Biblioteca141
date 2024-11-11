<?php
require "./config/database.php";
require "./model/Usuario.php";

class UsuarioController{
    public $usuario;
    public $database;

    public function conectarBd(){
        $this->database = new Banco();
        return $this->database->conectar();
    }

    public function cadastrar($nome, $email){
        $usuario = new Usuario($this->conectarBd());

        $this->usuario = $nome;
        $this->usuario = $email;

        if($this->usuario->create()){
            header('Location: home.php');
        } else{
            echo "<script>alert(Erro ao cadastrar usuário!)</script>";
        }
    }

    public function buscar($usuario){
        $usuario = new Usuario($this->conectarBd());
        $usuario->id_usuario = $id_usuario;

        if($usuario->read()){
            header('Location: index.php');
        } else{
            echo "<script>alert(Usuário não encontrado!)</script>";
        }
    }

    public function atualizar($usuario){
        $usuario = new Usuario($this->conectarBd());
        $usuario->id_usuario = $id_usuario;

        if ($usuario->read('id_usuario', $id_usuario)) {
            $valores = [
                'nome' => $_POST['nome'],
                'email' => $_POST['email'],
                'senha' => $_POST['senha'],
                'cpf' => $_POST['cpf']
            ];
            
            $usuario->update($valores);
            header('Location: index.php');
        } else {
            echo "<script>alert('Usuario não encontrado!')</script>";
        }
    }

    public function deletar($usuario){
        $usuario = new Usuario($this->conectarBd());
        $usuario->id_usuario = $id_usuario;

        if ($usuario->read('id_usuario', $id_usuario)) {
            $usuario->delete();
            header('Location: index.php');
        } else {
            echo "<script>alert('Usuario não encontrado!')</script>";
        }
    }
}