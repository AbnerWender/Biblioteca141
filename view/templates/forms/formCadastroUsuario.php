<link rel="stylesheet" href=".../css/cadastroUsuario.css">

<section class="box-cad-usuario">

    <form action="index.php?acaoUsuario=cadastrarUsuario" method="post" id="form-cadastro">
        <h1>Cadastrar Usuário</h1>

        <div class="row-75">
            <div>
                <input type="text" name="usuario" id="usuario" placeholder="Nome Completo *">
            </div>

            <div>
                <input type="number" name="cpf" id="cpf" placeholder="CPF *">
            </div>
        </div>

        <div class="row-75">
            <div>
                <input type="email" id="email" name="email" placeholder="Email *">
            </div>

            <div>
                <input type="date" id="dtNasc" name="dtNasc" placeholder="Data de Nasc *">
            </div>
        </div>

        <div class="row-50">
            <div>
                <input type="password" name="senha" id="senha" placeholder="Senha *">
            </div>

            <div>
                <input type="password" name="senha" id="confirma-senha" placeholder="Confirmar Senha *">
            </div>
        </div>

        <div id="btn-cadastrar">
            <button href="../src/home.php" id="btn-cadastrar" type="submit">
                <p>Cadastrar</p>
            </button>
        </div>
        <p id="faca-login">Já possui cadastro? <a href="index.php" id="btn-register">Faça Login</a></p>

    </form>

</section>