<?php

require_once './controller/LivroController.php';
require_once("view/src/pages/home.php");
require_once("view/src/pages/cadastrarLivro.php");


// Ações para o livro
$acaoLivro = isset($_GET['acaoLivro']) ? $_GET['acaoLivro'] : '';
switch ($acaoLivro) {
    case 'cadastrar': // pega as informações do formulário
        if (isset($_POST['titulo'],
                  $_POST['autor'],
                  $_POST['genero'], 
                  $_POST['isbn'], 
                  $_POST['estaDisponivel'])) {
            $LivroController = new LivroController();
            $LivroController->cadastrar($_POST['titulo'],
                                         $_POST['autor'], 
                                        $_POST['genero'],
                                          $_POST['isbn'],
                                $_POST['estaDisponivel']);
        }
        break;
    default:
        break;
        }

        
$acaoUsuario = isset($_GET['acaoUsuario']) ? $_GET['acaoUsuario'] : '';

switch ($acaoUsuario) {
    case 'login':
        require_once("view/src/pages/login.php");
        if (isset($_POST['email'], $_POST['senha'])) {
            // falta mandar pro banco 
        }


    default:
        break;
        
}