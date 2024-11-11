<?php 
include('./view/src/header.php');
?>
<link rel="stylesheet" href="../css/loginUsuario.css">

<section class="login-screen">

    <form action="index.php?acao=loginUsuario" id="form-login">
        <h1>Login</h1>
        <div class="row">
            <label for="email">Email</label>
            <input type="text" id="email" placeholder="insira seu email" name="email">
        </div>
        
        <div class="row">
            <label for="password">Senha</label>
            <input type="password" id="password" placeholder="insira sua senha" name="senha" required>
        </div>

        <div id="forget-pass">
            <a href="#" id="btn-forget-pass">Esqueceu a senha?</a>
        </div>

        <div id="btn-entrar">
            <button href="#" id="btn-entrar" type="submit">
                <p>Entrar</p>
            </button>
        </div>
        <p id="faca-cadastro">Não possue login? <a href="./view/src/cadastroUsuario.php" id="btn-registro">Faça Cadastro</a></p>
    </form>
</section>
</section>