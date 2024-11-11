<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/cardUsuario.css">
    <title>Document</title>
</head>
<body>
    <div class="usuario-card">
        <header class="header-card">
            <?php
                require_once "../../config/database.php";
                $Banco = new Banco();
                $conn = $Banco->conectar();
                
            ?>
            <img src="../imagens/perfilIMG.png" alt="User_Icon" class="usuario-card-img">

            <div class="informacoes">
                <h2 class="usuario-card-titulo">Nome: <p class="usuario-card-texto"><?= $usuario['nome']?></p></h2>
                <h2 class="usuario-card-titulo">Email: <p class="usuario-card-texto"><?= $usuario['email']?></p></h2>
                <h2 class="usuario-card-titulo">Cpf: <p class="usuario-card-texto"><?= $usuario['cpf']?></p></h2>
                
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