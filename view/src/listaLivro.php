<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/listaLivro.css">
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
                require "../../model/Livro.php";
                $Banco = new Banco();
                $conn = $Banco->conectar();
                
                $valor = isset($_GET['search']) ? $_GET['search'] : '';
                $livro = new Livro($conn);

                if($valor == ''){
                    $selectLivros = $livro->read('');
                    $rowLivro = $selectLivros->fetch_all(MYSQLI_ASSOC);
                    foreach ($rowLivro as $livro){
                        include 'cardLivro.php';
                    };
                }else{
                    $selectLivros = $livro->read($valor);
                    $rowLivro = $selectLivros->fetch_all(MYSQLI_ASSOC);
                    if(count($rowLivro ) == 0){
                        echo "<h1 class='aviso'>Livro não encontrado</h1>";
                    }else{
                        foreach ($rowLivro as $livro){
                            include 'cardLivro.php';
                        };
                    }
                }
                
            ?>
        </div>
    </div>
</body>
</html>