<?php
    $host = "localhost"; 
    $user = "root";
    $pass = "";
    $base = "login";

    global $pdo;

        try {
                $pdo = new PDO("mysql:dbname=" .$base. ";host=".$host, $user, $pass);
                $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                
        } catch (PDOExcepcion $e) {
                echo "ERRO: ".$e->getMessage();
                EXIT;
        }
    

    
?>
