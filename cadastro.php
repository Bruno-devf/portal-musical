<?php
session_start();
require 'config.php';

// Processar o cadastro
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nome = $_POST['nome'];
    $login = $_POST['login']; // Alterado de 'email' para 'login'
    $senha = $_POST['senha'];

    // Verificar se o login já existe no banco de dados
    $stmt = $conn->prepare("SELECT * FROM usuario WHERE login = ?");
    $stmt->bind_param("s", $login);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        echo "Este login já está registrado. Tente outro.";
    } else {
        // Inserir o novo usuário no banco de dados
        $stmt = $conn->prepare("INSERT INTO usuario (nome, login, senha) VALUES (?, ?, ?)");
        $stmt->bind_param("sss", $nome, $login, $senha);
        
        if ($stmt->execute()) {
            echo "Cadastro realizado com sucesso!";
            header('Location: login.php'); // Redireciona para a página de login após o cadastro
            exit();
        } else {
            echo "Erro ao registrar usuário.";
        }
    }
}
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastro</title>
    <link rel="stylesheet" href="css/cadastro.css">
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<a href="login.php" class="btn btn-secondary" style="position: absolute; top: 10px; left: 40px;">Voltar</a>
    <form class="form" action="cadastro.php" method="POST">
        <div class="card">
            <div class="card-top">
                <img class="img-login" src="img/perfil.png" alt="">
                <h2 class="titulo">Cadastro</h2>
                <p>Preencha os campos abaixo para criar sua conta.</p>
            </div>
            <div class="card-group">
                <label>Nome</label>
                <input type="text" name="nome" placeholder="Digite seu nome" required>
            </div>
            <div class="card-group">
                <label>Login</label>
                <input type="text" name="login" placeholder="Digite seu Login (Email)" required>
            </div>
            <div class="card-group">
                <label>Senha</label>
                <input type="password" name="senha" placeholder="Digite sua Senha" required>
            </div>
            <div class="card-group btn">
                <button type="submit">Cadastrar</button>
            </div>
        </div>
    </form>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
