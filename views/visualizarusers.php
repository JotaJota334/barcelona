<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Álbum de Figurinhas BARÇA</title>
    <link rel="stylesheet" href="../assets/loginstyle.css">
</head>
<body>

    <section class="box-login">
        <img src="../assets/img/barcelona.png">

        <h2>Lista de E-mails dos Usuários</h2>
        <div class="emails">
            <?php
            // Inclui o arquivo com as funções
            require_once('../processamento/funcoesBD.php');

            // Recuperar e exibir os e-mails
            $emails = recuperarTodosEmails();
            foreach ($emails as $email) {
                echo '<p class="senha-recuperada"> -> ' . $email . '</p>';
            }
            ?>
        </div>
    </section>

</body>
</html>
