<?php

session_start();
require_once __DIR__ . "../../../config/database.php";
require_once '../../model/Usuario.php';

$Banco = new Banco();
$conn = $Banco->conectar();

if (isset($_POST['id_usuario'])) {
    $id_usuario = $_POST['id_usuario'];

    $Banco = new Banco();
    $conn = $Banco->conectar();
    $usuario = new Usuario($conn);

    $dadosUsuario = $usuario->getIdUsuario($id_usuario);

    if (!$dadosUsuario) {
        echo "<script>alert('Usuário não encontrado!'); window.location.href='listaUsuarios.php';</script>";
        exit;
    }
} else {
    header('Location: listaUsuarios.php');
    exit;
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $valores = [
        'nome' => $_POST['nome'],
        'email' => $_POST['email'],
        'cpf' => $_POST['cpf'],
        'status' => $_POST['status']
    ];

    $resultado = $usuario->update($valores);

    if ($resultado === true) {
        echo "<script>alert('Usuário atualizado com sucesso!'); window.location.href='listaUsuarios.php';</script>";
    } else {
        echo "<script>alert('Erro ao atualizar o usuário. Tente novamente.');</script>";
    }
}

    session_start();
    require_once __DIR__ . "../../../config/database.php";
    require_once '../../model/Usuario.php';

    $Banco = new Banco();
    $conn = $Banco->conectar();

    if (isset($_POST['id_usuario'])) {
        $id_usuario = $_POST['id_usuario'];

        $Banco = new Banco();
        $conn = $Banco->conectar();
        $usuario = new Usuario($conn);

        $dadosUsuario = $usuario->getIdUsuario($id_usuario);

        if (!$dadosUsuario) {
            echo "<script>alert('Usuário não encontrado!'); window.location.href='listaUsuarios.php';</script>";
            exit;
        }
    } else {
        header('Location: listaUsuarios.php');
        exit;
    }

    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $valores = [
            'nome' => $_POST['nome'],
            'email' => $_POST['email'],
            'cpf' => $_POST['cpf'],
            'status' => $_POST['status']
        ];

        $resultado = $usuario->update($valores);
    
        if ($resultado === true) {
            echo "<script>alert('Usuário atualizado com sucesso!'); window.location.href='listaUsuarios.php';</script>";
        } else {
            echo "<script>alert('Erro ao atualizar o usuário. Tente novamente.');</script>";
        }
    }

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/updateUsuario.css">
    <title>Document</title>
</head>

<body>
    <?php include('header.php') ?>

    <link rel="stylesheet" href="../css/cadastroUsuario.css">

    <section class="box-cad-usuario">

        <form action="index.php?acao=atualizarUsuario" method="POST" id="form-cadastro">
            <h1>Atualizar Usuário</h1>

            <div class="row-75">
                <div>
                    <input type="text" name="usuario" id="usuario" placeholder="Nome Completo ">
                </div>
            </div>

            <div class="row-75">
                <div>
                    <input type="email" id="email" name="email" placeholder="Email ">
                </div>

                <div>
                    <input type="date" id="dtNasc" name="dtNasc" placeholder="Data de Nasc ">
                </div>
            </div>

            <div class="row-50">
                <div>
                    <input type="password" name="senha" id="senha" placeholder="Senha ">
                </div>

                <div>
                    <input type="password" name="senha" id="confirma-senha" placeholder="Confirmar Senha ">
                </div>
            </div>

            <div id="btn-cadastrar">
                <button href="../src/home.php" id="btn-cadastrar" type="submit">
                    <p>Atualizar</p>
                </button>
            </div>







=======
    <link rel="stylesheet" href="../css/cadastroUsuario.css">
 
<section class="box-cad-usuario">

    <form action="index.php?acao=atualizarUsuario" method="POST" id="form-cadastro">
        <h1>Atualizar Usuário</h1>

        <div class="row-75">
            <div>
                <input type="text" name="usuario" id="usuario" placeholder="Nome Completo ">
            </div>
        </div>

        <div class="row-75">
            <div>
                <input type="email" id="email" name="email" placeholder="Email ">
            </div>

            <div>
                <input type="date" id="dtNasc" name="dtNasc" placeholder="Data de Nasc ">
            </div>
        </div>

        <div class="row-50">
            <div>
                <input type="password" name="senha" id="senha" placeholder="Senha ">
            </div>
            
            <div>
                <input type="password" name="senha" id="confirma-senha" placeholder="Confirmar Senha ">
            </div>
        </div>

        <div id="btn-cadastrar">
            <button href="../src/home.php" id="btn-cadastrar" type="submit">
                <p>Atualizar</p>
            </button>
        </div>





    

</body>

</html>