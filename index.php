<?php

//codigo professor
$acao = isset($_GET['acao']) ? $_GET['acao'] : '';

switch($acao){
    case 'livro':
        require_once './view/src/pages/listaLivros.php';
        break;
    case 'login':
        require_once './controller/UsuarioController.php';
        $controller = new UsuarioController();
        $controller->logarUsuario($_POST['usuario'], $_POST['senha']);
        break;
    case 'usuario':
        require_once './controller/UsuarioController.php';
        require_once './view/src/cardUsuario.php';
        break;
    default:
        require_once './view/src/pages/login.php';
}

// Ações para o livro
/*
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
*/