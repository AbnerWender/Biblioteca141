<?php
require_once("controller/LivroController.php");
require_once("controller/UsuarioController.php");
require_once("controller/LoginController.php");
require_once("controller/EmprestimoController.php");


// Ações para o livro
// $acaoLivro = isset($_GET['acaoLivro']) ? $_GET['acaoLivro'] : '';
// switch ($acaoLivro) {
//     case 'cadastrar': // pega as informações do formulário
//         if (isset($_POST['titulo'],
//                   $_POST['autor'],
//                   $_POST['genero'], 
//                   $_POST['isbn'], 
//                   $_POST['estaDisponivel'])) {
//             $LivroController = new LivroController();
//             $LivroController->cadastrar($_POST['titulo'],
//                                          $_POST['autor'], 
//                                         $_POST['genero'],
//                                           $_POST['isbn'],
//                                 $_POST['estaDisponivel']);
//         }
//         break;
//     default:
//         break;
//         }



$acao = isset($_GET['acao']) ? $_GET['acao'] : '';

switch ($acao) {
    case 'login':
        require_once("view/src/pages/login.php");
        // precisa fazer validação para verificar se esta logado ou nao
        if (isset($_POST['email'], $_POST['senha'])) {
            $usuario = new UsuarioController();
            $usuario->cadastrar($_POST['email'], $_POST['senha']);
        }

    case 'usuario':
        if(count($_POST) < 1){
            require_once 'controller/UsuarioController.php';
            require_once 'view/src/pages/CadastrarUsuario.php';
        }
        else{
            
        }
    default:
        include("view/src/pages/login.php");
        break;
}
