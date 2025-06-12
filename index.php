<?php
session_start();
require_once "processamento/funcoesBD.php";

$erro = "";


if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $email = $_POST['email'];
    $senha = $_POST['senha'];

    if (verificarLogin($email, $senha)) {
        $_SESSION['usuario'] = $email;
        header("Location: views/cadastrocard.php");
        exit();
    } else {
        $erro = "Nome ou senha incorretos!";
    }
}
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Álbum de Figurinhas BARÇA</title>
    <link rel="stylesheet" href="assets/loginstyle.css">
</head>
<body>

    <section class="box-login">
        <img src="assets/img/barcelona.png">
        <h2>FC BARCELONA</h2>

        <?php if (!empty($erro)) : ?>
            <p style="color: red; text-align: center;"><?php echo $erro; ?></p>
        <?php endif; ?>

        <form method="POST">
            <input type="text" name="email" placeholder="Email" required>
            <input type="password" name="senha" placeholder="Senha" required>
            <input type="submit" value="Entrar">
        </form>

        <section class="box-login-footer">
            <a href="views/senha.php">Esqueci Senha</a>
            <a href="views/cadastrouser.php">Realizar cadastro</a>
        </section>
    </section>

</body>
</html>
