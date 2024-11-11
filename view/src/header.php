<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./view/css/style.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>

    <link href="https://fonts.googleapis.com/css2?family=Barlow:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&family=Rubik+Mono+One&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Barlow:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&family=Roboto+Flex:opsz,wght@8..144,100..1000&family=Rubik+Mono+One&display=swap" rel="stylesheet">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">

    <title>Biblioteca 141</title>
</head>

<body>

    <div vw class="enabled">
        <div vw-access-button class="active"></div>
        <div vw-plugin-wrapper>
            <div class="vw-plugin-top-wrapper"></div>
        </div>
    </div>
    <script src="https://vlibras.gov.br/app/vlibras-plugin.js"></script>
    <script>
        new window.VLibras.Widget('https://vlibras.gov.br/app');
    </script>
    <style>
        * {
            list-style: none;
            text-decoration: none;
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        #header #biblioteca-nome p {
            font-family: "Rubik Mono One", serif;
            font-weight: 400;
            font-style: normal;

        }

        #header {
            display: flex;
            justify-content: space-around;
            height: 100px;
            align-items: center;
            
            background-color: black;
        }

        .nav-list {
            display: flex;
            align-items: center;
            gap: 80px;
            font-family: "Roboto Flex", sans-serif;
            font-weight: 400;
            font-style: normal;
        }

        #header nav ul li {
            position: relative;
        }

        #header nav ul li::after {
            content: '';
            position: absolute;
            bottom: 0;
            left: 0;
            height: 2px;
            width: 0;
            background-color: white;
            transition: ease-in 3ms;
        }

        #header nav ul li:hover::after {
            width: 100%;
            animation: hoverItem 0.5s ease-in-out;
        }

        #header nav ul li::not(:hover)::after {
            animation: removeHoverItem 0.5s ease-in-out;
        }

        @keyframes hoverItem {
            from {
                width: 0%;
            }

            to {
                width: 100%;
            }
        }

        header #biblioteca-nome {
            color: white;
        }

        header nav ul li a {
            color: white;
        }
    </style>
    <header id="header">

        <div id="biblioteca-nome">
            <p>Biblioteca</p>
        </div>

        <nav id="nav-header">
            <ul class="nav-list">
                <li><a href="./view/src/home.php">Inicio</a></li>
                <li><a href="#">Livors</a></li>
                <li><a href="#">Meu Carrinho</a></li>
            </ul>
        </nav>

        <nav class="navbar bg-body-black">
            <div class="container-fluid">
                <form class="d-flex" role="search">
                    <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
                    <button class="btn btn-outline-success" type="submit">Buscar</button>
                </form>
            </div>
        </nav>

        <div class="img-perfil">
            <a href="../src/cadastroUsuario.php">
                <img src="../imagens/perfilIMG.png" alt="perfil" width="50px" height="50px">
            </a>
        </div>


    </header>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js" integrity="sha384-0pUGZvbkm6XF6gxjEnlmuGrJXVbNuzT9qBBavbLwCsOGabYfZo0T0to5eqruptLy" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>