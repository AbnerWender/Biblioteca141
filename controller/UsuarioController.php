<?php
// require "../config/database.php";
// require "../model/Usuario.php";

// class UsuarioController{
//     public $usuario;
//     public $database;

//     public function conectarBd(){
//         $this->database = new Banco();
//         return $this->database->conectar();
//     }

//     public function cadastrarUsuario($nome, $email){
//         $usuario = new Usuario($this->conectarBd());

//         $this->usuario = $nome;
//         $this->usuario = $email;

//         if($this->usuario->create()){
//             header('Location: home.php');
//         } else{
//             echo "<script>alert(Erro ao cadastrar usuário!)</script>";
//         }
//     }

//     public function lerUsuario($usuario){
//         $usuario = new Usuario($this->conectarBd());
//         $usuario->id_usuario = $id_usuario;

//         if($usuario->read()){
//             header('Location: index.php');
//         } else{
//             echo "<script>alert(Usuário não encontrado!)</script>";
//         }
//     }

//     public function atualizarUsuario($usuario){
//         $usuario = new Usuario($this->conectarBd());
//         $usuario->id_usuario = $id_usuario;

//         if($usuario->read()){
//             $usuario->update();
//         } else{
//             echo "<script>alert(Erro ao atualizar usuário!)</script>";
//         }
//     }

//     public function deletarUsuario($usuario){
//         $usuario = new Usuario($this->conectarBd());
//         $usuario->id_usuario = $id_usuario;

//         if($usuario->read()){
//             $usuario->delete();
//         } else{
//             echo "<script>alert(Erro ao deletar usuário!)</script>";
//         }
//     }
// }