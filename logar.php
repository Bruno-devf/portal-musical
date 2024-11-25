<?php
session_start();
require 'config.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $login = $_POST['email'];
    $senha = $_POST['senha'];

    $stmt = $conn->prepare("SELECT * FROM usuario WHERE login = ?");
    $stmt->bind_param("s", $login);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        $user = $result->fetch_assoc();
        if ($senha === $user['senha']) {
            $_SESSION['user'] = $user['nome'];
            header('Location: index1.php');
            exit();
        } else {
            echo "Login ou senha incorretos.";
        }
    } else {
        echo "Login ou senha incorretos.";
    }
}
?>
