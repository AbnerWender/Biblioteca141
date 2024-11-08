<?php

require_once './controller/LivroController.php';

$acao = isset($_GET['acao']) ? $_GET['acao'] : '';

switch($acao){
    case 'cadastrarLivro':
        $LivroController = new LivroController();
        $LivroController->cadastrarLivro($_POST['titulo'], $_POST['autor'], $_POST['genero'], $_POST['isbn'], $_POST['estaDisponivel']);
        break;
    default:
        include 'view/login.php';
}