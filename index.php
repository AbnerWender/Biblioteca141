<?php
session_start();

// Verifica o login, se o usuário estiver logado manda para home.php
/*if (isset($_SESSION['usuario_email'])) {
    header("Location: home.php");
    exit();
} else{
    include './view/src/login.php';
}*/

require_once './controller/LivroController.php';
require_once './controller/UsuarioController.php';

// Ações para o livro
$acaoLivro = isset($_GET['acaoLivro']) ? $_GET['acaoLivro'] : '';
switch ($acaoLivro) {
    case 'cadastrar': // pega as informações do formulário
        if (isset($_POST['titulo'], $_POST['autor'], $_POST['genero'], $_POST['isbn'], $_POST['estaDisponivel'])) {
            $LivroController = new LivroController();
            $LivroController->cadastrar($_POST['titulo'], $_POST['autor'], $_POST['genero'], $_POST['isbn'], $_POST['estaDisponivel']);
        } else {
            echo "<script>alert('Preencha todos os campos para cadastrar o livro!');</script>";
            include 'view/cadastrarLivro.php'; // manda para o formulário dnv
        }
        break;

    case 'buscar': // vai pegar o id da url
            if (isset($_GET['id_livro'])) {
                $LivroController = new LivroController();
                $LivroController->buscar($_GET['id_livro']);
            } else {
                echo "<script>alert('ID do livro não fornecido!');</script>";
                include 'view/??????.php';
            }
            break;

    case 'atualizar': // atualiza as informações do livro
        if (isset($_GET['id_livro'])) {
            $LivroController = new LivroController();
            $LivroController->atualizar($_GET['id_livro']);
        } else {
            echo "<script>alert('ID do livro não fornecido para atualização!');</script>";
            include 'view/????.php';
        }
        break;

    case 'deletar': // deleta o livro
        if (isset($_GET['id_livro'])) {
            $LivroController = new LivroController();
            $LivroController->deletar($_GET['id_livro']);
        } else {
            echo "<script>alert('ID do livro não fornecido para exclusão!');</script>";
            include 'view/????..php';
        }
        break;

    default:
        // se não for nenhuma das ações manda para o login.php
        include 'view/src/formCadastrarLivro.php';
        break;
}

// Ação para o usuário
$acaoUsuario = isset($_GET['acaoUsuario']) ? $_GET['acaoUsuario'] : '';
switch ($acaoUsuario) {
    case 'cadastrar': // pega as informações do formulário
        if (isset($_POST['nome'], $_POST['email'], $_POST['senha'], $_POST['cpf'])) {
            $LivroController = new LivroController();
            $LivroController->cadastrar($_POST['nome'], $_POST['email'], $_POST['senha'], $_POST['cpf']);
        } else {
            echo "<script>alert('Preencha todos os campos para cadastrar!');</script>";
            include 'view/cadastroUsuario.php'; // manda para o formulário dnv
        }
        break;

    case 'buscar': // vai pegar o id da url
            if (isset($_GET['id_usuario'])) {
                $UsuarioController = new UsuarioController();
                $UsuarioController->buscar($_GET['id_usuario']);
            } else {
                echo "<script>alert('ID do livro não fornecido!');</script>";
                include 'view/??????.php';
            }
            break;

    case 'atualizar': // atualiza
        if (isset($_GET['id_usuario'])) {
            $UsuarioController = new UsuarioController();
            $UsuarioController->atualizar($_GET['id_usuario']);
        } else {
            echo "<script>alert('ID do usuario não fornecido para atualização!');</script>";
            include 'view/????.php';
        }
        break;

    case 'deletar': // deleta
        if (isset($_GET['id_usuario'])) {
            $UsuarioController = new UsuarioController();
            $UsuarioController->deletar($_GET['id_usuario']);
        } else {
            echo "<script>alert('ID do usuario não fornecido para exclusão!');</script>";
            include 'view/????..php';
        }
        break;

    default:

        // se não for nenhuma das ações manda para o login.php
        //include 'view/src/formCadastrarLivro.php';
        break;

        include 'view/src/login.php';

}