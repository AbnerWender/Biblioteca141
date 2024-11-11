<!DOCTYPE html>

<body>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</body>

<div class="card mb-3" style="max-width: 500px;">
    <div class="row g-0">
        <div class="col-md-4 p-3">
            <img src="../imagens/livroExemplo.png" class="img-fluid rounded-start" alt="...">
        </div>
        <div class="col-md-8">
            <div class="card-body">
                <h5 class="card-title"><?= $titulo['titulo']?></h5>
                <p class="card-text">Lorem ipsum dolor sit amet consectetur adipisicing elit. Facilis doloremque quis saepe dolorem repellendus culpa necessitatibus.</p>
                <p class="card-text"><small class="text-body-secondary"><?= $autor['autor'] ?></small></p>
            </div>
        </div>
    </div>
</div>
</html>