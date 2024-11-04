<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/login.css">
    <title>Login</title>
</head>
<body>
    <form class = "form" action="logar.php" method="POST">
        <div class = "card">
            <div class="card-top">
                <img class="img-login"src="img/perfil.png" alt="">
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
            <div class="card-group btn">   
                <button type="submit">Acessar</button>
            </div>
        </div>

    </form>
</body>
</html>