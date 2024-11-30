<?php
session_start();  // Certifique-se de que a sessão seja iniciada

// Verifica se o usuário está logado, ou seja, se o 'user_id' está presente na sessão
if (!isset($_SESSION['user_id'])) {
    echo "Você precisa estar logado para adicionar notícias.";
    exit();
}

// Restante do código de adição de notícias
require 'config.php';

// Verifica se o formulário foi enviado
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Coleta os dados do formulário
    $titulo = $_POST['titulo'];
    $conteudo = $_POST['conteudo'];
    $autor_id = $_SESSION['user_id']; // Obtém o ID do autor (usuário logado)

    // Processamento da imagem (se houver)
    if (isset($_FILES['imagem']) && $_FILES['imagem']['error'] === UPLOAD_ERR_OK) {
        // Lê o conteúdo da imagem em binário
        $imagem = file_get_contents($_FILES['imagem']['tmp_name']);
    } else {
        $imagem = null; // Se não houver imagem, define como null
    }

    // Prepara a consulta para inserir a notícia
    $stmt = $conn->prepare("INSERT INTO noticias (titulo, conteudo, autor_id, imagem) VALUES (?, ?, ?, ?)");
    $stmt->bind_param("ssib", $titulo, $conteudo, $autor_id, $imagem); // 'b' para binário

    // Executa a consulta e verifica se ocorreu sucesso
    if ($stmt->execute()) {
        echo "Notícia adicionada com sucesso!";
    } else {
        echo "Erro ao adicionar notícia: " . $stmt->error;
    }

    $stmt->close();
    $conn->close();
}
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <title>Adicionar Notícia</title>
</head>
<body>
    <div class="container mt-4">
        <h2>Adicionar Notícia</h2>
        <form action="addnew.php" method="POST" enctype="multipart/form-data">
            <div class="form-group">
                <label for="titulo">Título</label>
                <input type="text" class="form-control" id="titulo" name="titulo" required>
            </div>
            <div class="form-group">
                <label for="conteudo">Conteúdo</label>
                <textarea class="form-control" id="conteudo" name="conteudo" rows="5" required></textarea>
            </div>
            <div class="form-group">
                <label for="imagem">Imagem</label>
                <input type="file" class="form-control-file" id="imagem" name="imagem">
            </div>
            <button type="submit" class="btn btn-primary">Adicionar Notícia</button>
        </form>
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.0.7/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
