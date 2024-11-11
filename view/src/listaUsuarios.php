<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/listaUsuario.css">
    <title>Document</title>
</head>
<body>
    <?php include('header.php')?>

    <div class="content">
        <div class="top-content">
            <form class="search-form" role="search">
                <input class="form-input" type="search" name="search" placeholder="Search" aria-label="Search">
                <button class="search-btn" type="submit">Buscar</button>
            </form>

            <button class="cadastrar-btn"><a href="#" class="cadastrar-link">Cadastrar</a></button>
        </div>
        

        <div class="card-container">
            <?php
                require_once "../../config/database.php";
                require "../../model/Usuario.php";
                $Banco = new Banco();
                $conn = $Banco->conectar();
                
                $valor = isset($_GET['search']) ? $_GET['search'] : '';
                $usuario = new Usuario($conn);

                if($valor == ''){
                    $selectUsuarios = $usuario->read('');
                    $rowUsuario = $selectUsuarios->fetch_all(MYSQLI_ASSOC);
                    foreach ($rowUsuario as $usuario){
                        include 'cardUsuario.php';
                    };
                }else{
                    $selectUsuarios = $usuario->read($valor);
                    $rowUsuario = $selectUsuarios->fetch_all(MYSQLI_ASSOC);
                    if(count($rowUsuario ) == 0){
                        echo "<h1 class='aviso'>Usuário não encontrado</h1>";
                    }else{
                        foreach ($rowUsuario as $usuario){
                            include 'cardUsuario.php';
                        };
                    }
                }
                
            ?>
        </div>
    </div>
</body>
</html>