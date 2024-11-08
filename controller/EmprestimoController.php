<?php

// class EmprestimoController{
//     public $emprestimo;
//     public $database;

//     public function conectarBd(){
//         $this->database = new Banco();
//         return $this->database->conectar();
//     }

//     public function cadastrarEmprestimo($id_usuario, $id_livro, $ativo){
//         $emprestimo = new Emprestimo($this->conectarBd());

//         $this->emprestimo = $id_usuario;
//         $this->emprestimo = $id_livro;
//         $this->emprestimo = $ativo;

//         if($this->emprestimo->create()){
//             header('Location: index.php');
//         } else{
//             echo "Erro ao cadastrar empréstimo!";
//         }
//     }

//     public function lerEmprestimo($emprestimo){
//         $emprestimo = new Emprestimo($this->conectarBd());

//         if($emprestimo->read()){
//             header('Location: index.php');
//         } else{
//             echo "Erro ao ler empréstimo!";
//         }
//     }

//     public function atualizarEmprestimo($emprestimo){
//         $emprestimo = new Emprestimo($this->conectarBd());

//         if($emprestimo->update()){
//             header('Location: index.php');
//         } else{
//             echo "Erro ao atualizar empréstimo!";
//         }
//     }

//     public function deletarEmprestimo($emprestimo){
//         $emprestimo = new Emprestimo($this->conectarBd());

//         if($emprestimo->delete()){
//             header('Location: index.php');
//         } else{
//             echo "Erro ao deletar empréstimo!";
//         }
//     }
// }