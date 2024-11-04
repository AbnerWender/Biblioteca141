<?php
require "./config/database.php";
require "./model/Usuario.php";

class UsuarioController{
    public $usuario;

    public function cadastrarUsuario($nome, $email){
        $database = new Banco();
        $bd = $database->conectar();

        $this->usuario = new Usuario($bd);
        $this->usuario = $nome;
        $this->usuario = $email;

        if($usuario->create()){
            header('Location: index.php');
        } else{
            echo "Erro ao cadastrar usuario!";
        }
    }

    public function lerUsuario($usuario){
        $database = new Banco();
        $bd = $database->conectar();

        if($usuario->read()){
            header('Location: index.php');
        } else{
            echo "Erro ao ler usuario!";
        }
    }

    public function atualizarUsuario($usuario){
        $database = new Banco();
        $bd = $database->conectar();

        if($usuario->update()){
            header('Location: index.php');
        } else{
            echo "Erro ao atualizar usuario!";
        }
    }

    public function deletarUsuario($usuario){
        $database = new Banco();
        $bd = $database->conectar();

        if($usuario->delete()){
            header('Location: index.php');
        } else{
            echo "Erro ao deletar usuario!";
        }
    }
}