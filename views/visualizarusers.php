<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Álbum de Figurinhas BARÇA</title>
    <link rel="stylesheet" href="../assets/loginstyle.css">
</head>
<body>

    <nav class="navbar">
        <img src="../assets/img/barcelona.png">
        <ul>
            <li><a href="time.php">Barça Lineup</a></li>
            <li><a href="cadastrocard.php">Cards</a></li>
            <li><a href="visualizarcards.php">Visualizar Cards</a></li>
            <li><a href="cadastrohighlights.php">Highlights</a></li>
            <li><a href="visualizarhighlights.php">Visualizar Highlights</a></li>
            <li><a href="#">Visualizar Users</a></li>
        </ul>
    </nav>

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

    <footer>

        <hr>
        <h3>Barcelona DreamTeam</h3>

    </footer>

</body>
</html>
