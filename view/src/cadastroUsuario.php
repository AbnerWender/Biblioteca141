<!-- Page Cadastro Usuario -->

 
<div class="box-cad-usuario">

    <h3>Cadastrar Usuário</h3>

    <form action="index.php?acao=cadastrarUsuario" method="get">
        <label for="titulo">Nome Completo: </label>
        <input type="text" name="usuario" id="usuario">

        <label for="email">Email: </label>
        <input type="email" name="email" id="email">

        <label for="senha">Senha: </label>
        <input type="password" name="senha" id="senha">

        <label for="dataNasc">CPF: </label>
        <input type="number" name="cpf" id="cpf">

        <input type="submit" value="Cadastrar">
    </form>

</div>