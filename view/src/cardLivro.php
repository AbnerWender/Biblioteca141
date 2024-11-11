<link rel="stylesheet" href="../css/cardLivro.css">
<div class="livro-card">
    <header class="header-card">
        <?php
            require_once "../../config/database.php";
            $Banco = new Banco();
            $conn = $Banco->conectar();
            
        ?>
        <img src="../imagens/livro.png" alt="User_Icon" class="livro-card-img">

        <div class="informacoes">
        <h2 class="livro-card-titulo">ID: <p class="livro-card-texto"><?= $livro['id_livro']?></p></h2>
            <h2 class="livro-card-titulo">Titulo: <p class="livro-card-texto"><?= $livro['titulo']?></p></h2>
            <h2 class="livro-card-titulo">Autor: <p class="livro-card-texto"><?= $livro['autor']?></p></h2>
            <h2 class="livro-card-titulo">Descrição: <p class="livro-card-texto"><?= $livro['descricao']?></p></h2>
            <h2 class="livro-card-titulo">Isbn: <p class="livro-card-texto"><?= $livro['isbn']?></p></h2>
            <h2 class="livro-card-titulo">Genero: <p class="livro-card-texto"><?= $livro['genero']?></p></h2>
            <h2 class="livro-card-titulo">Disponivel: <p class="livro-card-texto"><?php if($livro['esta_disponivel'] == 1){echo 'Sim';}else{echo 'Não';}?></p></h2>
        </div>
        
        <?php
            $conn->close();
        ?>
    </header>

    <footer class="footer-card">
        <button class="botao"><a href="#" class="link-botao">Editar</a></button>
    </footer>
</div>
