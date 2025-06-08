<?php

    require_once('../processamento/funcoesBD.php');

    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $nome = $_POST['inputNome'];
        $email = $_POST['inputEmail'];
        $senha = $_POST['inputSenha'];

        InserirUser($nome, $email, $senha);

        header('Location:cadastrouser.php');

        die();
    }


?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../assets/loginstyle.css">
    <title>Cadastro Usuário</title>
</head>
<body>
    <section class="box-login">
        <img src="../assets/img/barcelona.png">
        <h2>FC BARCELONA</h2>
        <form method="POST" action="">
            <input type="text" placeholder="Nome" name="inputNome" required>
            <input type="email" placeholder="Email" name="inputEmail" required>
            <input type="password" placeholder="Senha" name="inputSenha" required>
            <input type="submit" id="botao-cadastro-user" value="Cadastrar">
        </form>
    </section>
</body>
</html>