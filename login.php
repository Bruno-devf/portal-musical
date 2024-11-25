<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/login.css">
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <title>Login</title>
</head>
<body>    
    <a href="index.php" class="btn btn-secondary" style="position: absolute; top: 10px; left: 40px;">Voltar</a>

    <form class="form" action="logar.php" method="POST">
        <div class="card">
            <div class="card-top">
                <img class="img-login" src="img/perfil.png" alt="">
                <h2 class="titulo">Painel de Login</h2>
                <p>Insira seus dados</p>
            </div>
            <div class="card-group">
                <label>Email</label>
                <input type="email" name="email" placeholder="Digite seu Email" required>
            </div>
            <div class="card-group">
                <label>Senha</label>
                <input type="password" name="senha" placeholder="Digite sua Senha" required>
            </div>
            <a class="au" href="cadastro.php">Não tem conta? Cadastre-se aqui</a>
            <div class="card-group btn">
                <button type="submit">Acessar</button>
            </div>
        </div>
    </form>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
