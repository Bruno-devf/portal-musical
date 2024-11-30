<?php
require 'config.php';

$result = $conn->query("SELECT * FROM noticias WHERE status = 'aprovado' ORDER BY data_criacao DESC");
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="css/principal.css">
    <title>Portal Para o mundo da Música</title>
</head>


<body>
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <a class="navbar-brand" href="#">Mundo da Música</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav ml-auto">
                <li class="nav-item">
                    <span class="navbar-text mr-3">Bem-vindo, Leitor !</span>
                </li>
                <li class="nav-item">
                    <a class="btn btn-outline-secondary" href="login.php">Entrar na Conta</a>
                </li>
            </ul>
        </div>
    </nav>

    <div class="container mt-4">
        <div class="card">
        <h1>Notícias Publicadas</h1>
    <?php while ($row = $result->fetch_assoc()): ?>
        <h2><?php echo $row['titulo']; ?></h2>
        <p><?php echo $row['conteudo']; ?></p>
        <hr>
    <?php endwhile; ?>
        </div>
    </div>
    





    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.0.7/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
