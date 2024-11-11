<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/cardLivro.css">
    <title>Document</title>
</head>
<body>
    <div class="livro-card">
        <header class="header-card">
            <?php
                require_once "../../config/database.php";
                $Banco = new Banco();
                $conn = $Banco->conectar();
                
            ?>
            <img src="../imagens/livro.png" alt="User_Icon" class="livro-card-img">

            <div class="informacoes">
                <h2 class="livro-card-titulo">Titulo: <p class="livro-card-texto"><?= $livro['titulo']?></p></h2>
                <h2 class="livro-card-titulo">Autor: <p class="livro-card-texto"><?= $livro['autor']?></p></h2>
                <h2 class="livro-card-titulo">Isbn: <p class="livro-card-texto"><?= $livro['isbn']?></p></h2>
                <h2 class="livro-card-titulo">Genero: <p class="livro-card-texto"><?= $livro['genero']?></p></h2>
            </div>
            
            <?php
                $conn->close();
            ?>
        </header>

        <footer class="footer-card">
            <button class="botao"><a href="#" class="link-botao">Editar</a></button>
        </footer>
    </div>
</body>
</html>