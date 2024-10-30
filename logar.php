<?PHP
if (isset($_POST['email']) && !empty($_POST['email']) && isset($_POST['senha']) && !empty($_POST['senha'])) {
    
    require "log.php";
    $senha = addcslashes($_POST["senha"]);
    $login = addcslashes($_POST["email"]);
}else(
    header("Location: login.php");
)


?>