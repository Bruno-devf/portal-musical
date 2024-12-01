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
    <title>Portal Para o Mundo da Música</title>
    <style>
        .card {
            margin-bottom: 20px;
            transition: transform 0.3s ease, box-shadow 0.3s ease;
            border: none;
        }

        .card-img-top {
            object-fit: cover;
            height: 300px;
        }

        .card-body {
            padding: 20px;
        }

        .card-body h5 {
            font-size: 24px;
            margin-bottom: 15px;
        }

        .card-body p {
            font-size: 16px;
            color: #555;
        }

        /* Hover: aumentar o tamanho do card e adicionar sombra 3D */
        .card:hover {
            transform: translateY(-10px); 
            box-shadow: 0 10px 20px rgba(0, 0, 0, 0.2); 
        }

        /* Responsividade: ajusta as colunas dependendo do tamanho da tela */
        @media (max-width: 768px) {
            .card-img-top {
                height: 200px;
            }
        }

        @media (max-width: 576px) {
            .card-img-top {
                height: 150px;
            }
        }

        /* Footer */
        footer {
            background-color: #f8f9fa;
            padding: 20px 0;
            text-align: center;
            border-top: 1px solid #ddd;
        }

        footer p {
            margin: 0;
            font-size: 14px;
            color: #555;
        }

    </style>
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
                    <span class="navbar-text mr-3">Bem-vindo, Leitor!</span>
                </li>
                <li class="nav-item">
                    <a class="btn btn-outline-secondary" href="login.php">Entrar na Conta</a>
                </li>
            </ul>
        </div>
    </nav>

    <div class="container mt-4">
        <div class="row">
            <?php while ($row = $result->fetch_assoc()): ?>
                <div class="col-md-4 col-sm-6 col-12">
                    <div class="card">
                        <img src="<?php echo $row['imagem']; ?>" class="card-img-top" alt="Imagem da Notícia">
                        <div class="card-body">
                            <h5 class="card-title"><?php echo $row['titulo']; ?></h5>
                            <p class="card-text"><?php echo $row['conteudo']; ?></p>
                        </div>
                    </div>
                </div>
            <?php endwhile; ?>
        </div>
    </div>

    <!-- Footer -->
    <footer>
        <p>&copy; 2024 ETEC de Guarulhos. Todos os direitos reservados.</p>
    </footer>

    <!-- Scripts do Bootstrap -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.0.7/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
