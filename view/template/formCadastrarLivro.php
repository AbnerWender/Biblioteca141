<h3>Cadastrar Livro</h3>

<form action="index.php?acaoLivro=cadastrar" method="POST">
    <label for="titulo">Titulo: </label>
    <input type="text" name="titulo" id="titulo">

    <label for="autor">Autor: </label>
    <input type="text" name="autor" id="autor">

    <label for="genero">Gênero: </label>
    <input type="text" name="genero" id="genero">

    <label for="isbn">ISBN: </label>
    <input type="text" name="isbn" id="isbn">

    <label for="estaDisponivel">Disponivel</label>
    <input type="radio" name="estaDisponivel" id="disponivel" value="True">

    <label for="estaDisponivel">Indisponivel</label>
    <input type="radio" name="estaDisponivel" id="indisponivel" value="False">

    <input type="submit" value="Cadastrar Livro">
</form>