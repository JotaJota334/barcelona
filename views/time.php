<?php
    session_start();
    require_once('../processamento/funcoesBD.php');

    // Verificar se o usuário selecionou um jogador
    if (isset($_GET['posicao']) && isset($_GET['jogador'])) {
        $_SESSION[$_GET['posicao']] = $_GET['jogador'];
    }

    // Carregar jogadores da posição
    $goleiros = buscarPorPosicao('Goleiro');

    // Verificar se há goleiro na sessão e buscar imagem
    $goleiroSelecionado = isset($_SESSION['Goleiro']) ? $_SESSION['Goleiro'] : null;
    $imagemGoleiro = $goleiroSelecionado ? buscarImagemPorNome($goleiroSelecionado) : null;

    // 🔥 Se o jogador não existir mais no banco, limpar da sessão
    if ($goleiroSelecionado && !$imagemGoleiro) {
        unset($_SESSION['Goleiro']);
        $goleiroSelecionado = null;
    }
?>


<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../assets/time.css">
    <title>Escalação</title>
</head>
<body>

    <nav class="navbar">
        <img src="../assets/img/barcelona.png">
        <ul>
            <li><a href="#">Barça Lineup</a></li>
            <li><a href="#">Cards</a></li>
            <li><a href="#">Visualizar Cards</a></li>
            <li><a href="#">Highlights</a></li>
            <li><a href="#">Visualizar Highlights</a></li>
            <li><a href="#">Visualizar Users</a></li>
        </ul>
    </nav>


    <section class="box-time">

        <h1>LINE UP</h1>

        <section class="posicoes">
            <ul>
                <li><button><a href="#">Goleiro</a></button></li>
                <li><button><a href="#">Defensores</a></button></li>
                <li><button><a href="#">Meio-Campistas</a></button></li>
                <li><button><a href="#">Atacantes</a></button></li>
                <li><button><a href="#">Treinador</a></button></li>
            </ul>
        </section>

        <section class="box-time">

            <section class="box-cards">

                <h2>Goleiro</h2>

                <section class="cards">
                    <?php if ($goleiroSelecionado): ?>
                        <img src="data:image/jpeg;base64,<?php echo $imagemGoleiro; ?>" alt="<?php echo $goleiroSelecionado; ?>">
                        <p><?php echo $goleiroSelecionado; ?></p>
                    <?php else: ?>
                        <a href="?posicao=Goleiro">
                            <img src="../assets/img/plus.png">
                        </a>
                    <?php endif; ?>
                </section>

                <!-- LISTA DE JOGADORES SE FOR CLICADO -->
                <?php if (isset($_GET['posicao']) && $_GET['posicao'] == 'Goleiro'): ?>
                    <div class="lista-jogadores">
                        <h3>Selecione um Goleiro:</h3>
                        <ul>
                            <?php foreach ($goleiros as $goleiro): ?>
                                <li>
                                    <a href="?posicao=Goleiro&jogador=<?php echo urlencode($goleiro); ?>">
                                        <?php echo htmlspecialchars($goleiro); ?>
                                    </a>
                                </li>
                            <?php endforeach; ?>
                        </ul>
                    </div>
                <?php endif; ?>

            </section>

        </section>

    </section>

    <footer>

        <hr>
        <h3>Barcelona DreamTeam</h3>

    </footer>


</body>
</html>