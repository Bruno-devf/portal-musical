<?php
session_start();
require 'config.php';  // Conecta ao banco de dados

// Verifica se o formulário foi enviado
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $login = $_POST['email'];
    $senha = $_POST['senha'];

    // Prepara a consulta para verificar se o login existe no banco de dados
    $stmt = $conn->prepare("SELECT * FROM usuario WHERE login = ?");
    $stmt->bind_param("s", $login);
    $stmt->execute();
    $result = $stmt->get_result();

    // Verifica se o usuário existe
    if ($result->num_rows > 0) {
        $user = $result->fetch_assoc();

        // Verifica se a senha é correta utilizando password_verify
        if (password_verify($senha, $user['senha'])) {
            // Salva os dados do usuário na sessão
            $_SESSION['user_id'] = $user['id'];  // O ID do usuário
            $_SESSION['user'] = $user['nome'];   // Nome do usuário
            $_SESSION['role'] = $user['role'];   // Função do usuário (admin, escritor, etc.)

            // Redireciona com base no papel do usuário
            if ($user['role'] === 'admin') {
                header('Location: index3.php'); // Página para administradores
            } elseif ($user['role'] === 'escritor') {
                header('Location: index1.php'); // Página para escritores
            }
            exit(); // Termina a execução após o redirecionamento
        } else {
            // Senha incorreta
            echo "Login ou senha incorretos.";
        }
    } else {
        // Usuário não encontrado
        echo "Login ou senha incorretos.";
    }

    // Fecha a conexão e a declaração
    $stmt->close();
    $conn->close();
}
?>
