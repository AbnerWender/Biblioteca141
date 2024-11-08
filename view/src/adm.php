<!-- Page Admin -->


 <!DOCTYPE html>
 <html lang="en">
 <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/adm.css">
    <title>Document</title>
 </head>
 <body>
    <?php include('header.php')?>

    <div class="btn-group">
        <button>Usuários</button>
        <button>Livro</button>
        <button>Emprestimos</button>
    </div>

    <input type="text" id="myInput" onkeyup="myFunction()" placeholder="Pesquisar">

    <?php 
        require_once "../../config/database.php";
        $Banco = new Banco();
        $Banco->conectar();
        $selectUsuarios = $Banco->conexao->query('select * from usuario');
        $rowUsuario = $selectUsuarios->fetch_all(MYSQLI_ASSOC);
        foreach ($rowUsuario as $Usuario){
            echo $Usuario['nome'];
        };
    ?>


 </body>
 </html>