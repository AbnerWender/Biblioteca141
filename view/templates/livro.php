<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Bootstrap demo</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>

<body>

    <div class="card" style="width: 18rem;">

        <div class="card-body">
            <h5 class="card-title">Nome Livro</h5>
            <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
            <a href="#" class="btn btn-primary">Ver Livro</a>
        </div>
    </div>
<!-- //////////////////////////////////////////////////////////////////// -->
    <div class="card mb-3" style="max-width: 500px;">
        <div class="row g-0">
            <div class="col-md-4">
                <img src="../imagens/livroTemplate.png" class="img-fluid rounded-start" alt="template">
            </div>
            <div class="col-md-8">
                <div class="card-body">
                    <h5 class="card-title">Nome Livro</h5>
                    <p class="card-text">This is a wider card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p>
                    <a href="#" class="btn btn-primary">Ver Livro</a>
                </div>
            </div>
        </div>
    </div>
<!-- /////////////////////////////////////////////////////////////////////// -->
    <div class="card-group" style="max-width: 800px;">
        <div class="card">
            <img src="../imagens/livroTemplate.png" class="card-img-top" alt="...">
            <div class="card-body">
                <h5 class="card-title">Card title</h5>
                <p class="card-text">This is a wider card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p>
            </div>
            <div class="card-footer">
                <small class="text-body-secondary">Last updated 3 mins ago</small>
            </div>
        </div>
        <div class="card">
            <img src="../imagens/livroTemplate.png" class="card-img-top" alt="...">
            <div class="card-body">
                <h5 class="card-title">Card title</h5>
                <p class="card-text">This card has supporting text below as a natural lead-in to additional content.</p>
            </div>
            <div class="card-footer">
                <small class="text-body-secondary">Last updated 3 mins ago</small>
            </div>
        </div>
        <div class="card">
            <img src="../imagens/livroTemplate.png" class="card-img-top" alt="...">
            <div class="card-body">
                <h5 class="card-title">Card title</h5>
                <p class="card-text">This is a wider card with supporting text below as a natural lead-in to additional content. This card has even longer content than the first to show that equal height action.</p>
            </div>
            <div class="card-footer">
                <small class="text-body-secondary">Last updated 3 mins ago</small>
            </div>
        </div>
    </div>



    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js" integrity="sha384-0pUGZvbkm6XF6gxjEnlmuGrJXVbNuzT9qBBavbLwCsOGabYfZo0T0to5eqruptLy" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>

</html>


<!-- <div class="card-livro">
    <header>
        <h2>ID: <?= $livro['id_livro'] ?></h2>
        <p>Título: <?= $livro['titulo'] ?></p>
        <p>Autor: <?= $livro['autor'] ?></p>
        <p>Sinópse: <?= $livro['descricao'] ?></p>
        <p>ISBN: <?= $livro['isbn'] ?></p>
        <p>Gênero: <?= $livro['genero'] ?></p>
        <p>Disponibilidade: <?= $livro['disponibilidade'] ?></p>
    </header>

    <footer>
        <a href="#"><span>ID:<?= $livro['id'] ?></span></a>
    </footer>
</div>