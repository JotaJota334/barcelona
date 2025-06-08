<?php  
    session_start();
    require_once('../processamento/funcoesBD.php');

    $mostrarNovaSenha = false;
    $email = '';
    $senhaRecuperada = '';
    $exibirSomenteSenha = false;

    if ($_SERVER['REQUEST_METHOD'] === 'POST') {

        if (isset($_POST['Recuperar'])) {
            $email = $_POST['inputEmail'] ?? '';
            $senhaRecuperada = RecuperarSenha($email);
            $exibirSomenteSenha = true;
        }

        else if (isset($_POST['Alterar'])) {
            $email = $_POST['inputEmail'] ?? '';
            $novaSenha = $_POST['novaSenha'] ?? '';

            if (!empty($email) && !empty($novaSenha)) {
                AlterarSenha($email, $novaSenha);
                $mostrarNovaSenha = false;
            } else {
                $mostrarNovaSenha = true;
            }
        }

        if (isset($_POST['Alterar']) && empty($_POST['novaSenha'])) {
            $mostrarNovaSenha = true;
        }
    }
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Senha</title>
    <link rel="stylesheet" href="../assets/loginstyle.css">
    <style>
        .senha-recuperada {
            background-color: #f0f0f0;
            padding: 10px;
            margin-top: 15px;
            border-radius: 5px;
            font-weight: bold;
            color: #444;
            text-align: center;
        }

        .box-login {
            display: flex;
            flex-direction: column;
            align-items: center;
            padding: 20px;
        }

        img {
            width: 150px;
        }
    </style>
</head>
<body>

<section class="box-login">
    <img src="../assets/img/barcelona.png" alt="Logo">

    <?php if ($exibirSomenteSenha): ?>
        <p class="senha-recuperada">Sua senha: <?= htmlspecialchars($senhaRecuperada) ?></p>
    <?php else: ?>
        <h2>FC BARCELONA</h2>
        <form method="POST" action="">
            <input 
                type="email" 
                placeholder="Informe seu Email" 
                name="inputEmail" 
                required 
                value="<?= htmlspecialchars($email) ?>"
            >

            <?php if ($mostrarNovaSenha): ?>
                <input type="password" placeholder="Nova Senha" name="novaSenha" required>
            <?php endif; ?>

            <input type="submit" name="Recuperar" id="botao-cadastro-user" value="Recuperar senha">
            <input type="submit" name="Alterar" id="botao-cadastro-user" value="Alterar senha">
        </form>
    <?php endif; ?>
</section>

</body>
</html>

