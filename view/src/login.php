    <link rel="stylesheet" href="../css/loginUsuario.css">

<section class="login-screen">

    
    <form action="index.php?acao=loginUsuario" id="form-login">
        <h2>Login</h2>
        <div class="row">
            <label for="email">Email</label>
            <input type="text" id="email">
        </div>

        <label for="password">Senha</label>
        <input type="text" id="password">
        
        <div id="forget-pass">
            <a href="#" id="btn-forget-pass">Esqueceu a senha?</a>
        </div>

        <div id="btn">
            <button href="#" id="btn-enter" type="submit">
                <h2>Entrar</h2>
            </button>
            <p>Não possue login? <a href="#" id="btn-register">Faça Cadastro</a></p>
        </div>
    </form>
</section>