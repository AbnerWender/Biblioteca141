<link rel="stylesheet" href="../css/form.css">

<div class="box-cad-livro">

    <h3>Cadastrar Livro</h3>

    <form action="index.php?acao=cadastrarLivro" method="get">
        <label for="titulo">Titulo do Livro: </label>
        <input type="text" name="titulo" id="titulo">

        <label for="autor">Autor do Livro: </label>
        <input type="text" name="autor" id="autor">

        <label for="genero">Gênero do Livro: </label>
        <input type="text" name="genero" id="genero">


        <label for="descricao">Sinópse: </label>
        <input type="text" name="descricao" id="descricao">

        <input type="submit" value="Cadastrar Livro">
    </form>

</div>