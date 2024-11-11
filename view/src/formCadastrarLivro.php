<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/form.css">
    <title>Document</title>
</head>
<body>
    <?php include('header.php')?>

    <div class="box-cad-livro">

        <h3>Cadastrar Livro</h3>

        <form action="index.php?acaoLivro=cadastrar" method="POST">
            <label for="titulo">Titulo: </label>
            <input type="text" name="titulo" id="titulo">

            <label for="autor">Autor: </label>
            <input type="text" name="autor" id="autor">

            <label for="genero">Gênero: </label>
            <input type="text" name="genero" id="genero">

            <label for="isbn">ISBN: </label>
            <input type="number" name="isbn" id="isbn">

            <label for="estaDisponivel">Disponivel</label>
            <input type="radio" name="estaDisponivel" id="disponivel" value="True">

            <label for="estaDisponivel">Indisponivel</label>
            <input type="radio" name="estaDisponivel" id="indisponivel" value="False">

            <input type="submit" value="Cadastrar Livro">
        </form>

        <?php
            if (isset($_GET['acaoLivro']) && $_GET['acaoLivro'] === 'cadastrar' && $_SERVER['REQUEST_METHOD'] === 'POST') {
                $Banco = new Banco();
                $conn = $Banco->conectar();
        
                $livro = new Livro($conn);

                $livro->titulo = $_POST['titulo'];
                $livro->autor = $_POST['autor'];
                $livro->genero = $_POST['genero'];
                $livro->isbn = $_POST['isbn'];
                $livro->estaDisponivel = $_POST['estaDisponivel'] === '1' ? true : false;

                if ($livro->create()) {
                    echo "<script>alert('Livro cadastrado com sucesso!');</script>";
                } else {
                    echo "<script>alert('Erro ao cadastrar o livro.');</script>";
                }
            }


        ?>
    </div>
</body>

