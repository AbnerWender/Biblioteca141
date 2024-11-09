<div class="card-livro">
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

<?php
