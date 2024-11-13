<!-- Page Admin -->
<link rel="stylesheet" href="../../css/adm.css">
<?php include('../header.php') ?>

<div class="adm-content">
    <div class="adm-card">
        <header class="header-card">
            <?php
            require_once "../../../config/database.php";
            $Banco = new Banco();
            $conn = $Banco->conectar();

            ?>
            <img src="../../imagens/AdmIcon.png" alt="Adm_Icon" class="adm-card-img">

            <div class="informacoes">
                <h2 class="adm-card-titulo">Nome: <p style="color: black;display:contents;">Jorginho</p></h2>
                
                <h2 class="adm-card-titulo">Email: <p style="color: black;display:contents;">jorginhogameplays@gmail.com</p></h2>
                
                <h2 class="adm-card-titulo">Cpf: <p style="color: black;display:contents;">123.456.789-10</p></h2>
                
            </div>

            <?php
            $conn->close();
            ?>
        </header>

        <footer class="footer-card">
            <button class="botao"><a href="#" class="link-botao">Editar</a></button>
        </footer>
    </div>

    <div class="container-botao">
        <button class="botao"><a href="listaUsuarios.php" class="link-botao">Usuários</a></button>
        <button class="botao"><a href="listaLivro.php" class="link-botao">Livros</a></button>
        <button class="botao"><a href="#" class="link-botao">Empréstimos</a></button>
    </div>
</div>

<?php include('../footer.php') ?>
</body>

</html>