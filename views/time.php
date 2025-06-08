<?php
session_start();

require_once('../processamento/funcoesBD.php');

// Verificar se o usuário selecionou um jogador
if (isset($_GET['posicao']) && isset($_GET['jogador'])) {
    if ($_GET['posicao'] === 'Defensores') {
        $_SESSION['Defensores'][] = $_GET['jogador'];
    } else {
        $_SESSION[$_GET['posicao']] = $_GET['jogador'];
    }
}

// Carregar jogadores por posição
$goleiros = buscarPorPosicao('Goleiro');
$defensores = buscarPorPosicao('Defensor');

// Goleiro
$goleiroSelecionado = isset($_SESSION['Goleiro']) ? $_SESSION['Goleiro'] : null;
$imagemGoleiro = $goleiroSelecionado ? buscarImagemPorNome($goleiroSelecionado) : null;

// Se o jogador não existir mais no banco, limpar da sessão
if ($goleiroSelecionado && !$imagemGoleiro) {
    unset($_SESSION['Goleiro']);
    $goleiroSelecionado = null;
}

// Defensores
$defensoresSelecionados = isset($_SESSION['Defensores']) ? $_SESSION['Defensores'] : [];
$imagensDefensores = [];

foreach ($defensoresSelecionados as $defensor) {
    $imagem = buscarImagemPorNome($defensor);
    if ($imagem) {
        $imagensDefensores[] = ['nome' => $defensor, 'imagem' => $imagem];
    } else {
        // Se não existe mais, remover da sessão
        if (($key = array_search($defensor, $_SESSION['Defensores'])) !== false) {
            unset($_SESSION['Defensores'][$key]);
        }
    }
}
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../assets/time.css">
    <title>Escalação</title>
    <style>
        .lista-jogadores {
            display: none;
            background-color: white;
            border: 1px solid #ccc;
            padding: 10px;
            position: absolute;
            z-index: 100;
        }
        .lista-jogadores ul {
            list-style: none;
            padding: 0;
        }
        .lista-jogadores li {
            margin: 5px 0;
        }
        .lista-jogadores li a {
            text-decoration: none;
            color: black;
            font-weight: bold;
        }
        .lista-jogadores li a:hover {
            color: blue;
        }
    </style>
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
                <li><button onclick="abrirLista('listaGoleiros')">Goleiro</button></li>
                <li><button onclick="abrirLista('listaDefensores')">Defensores</button></li>
                <li><button>Meio-Campistas</button></li>
                <li><button>Atacantes</button></li>
                <li><button>Treinador</button></li>
            </ul>
        </section>

        <section class="box-cards">

            <!-- Goleiro -->
            <h2>Goleiro</h2>
            <section class="cards">
                <?php if ($goleiroSelecionado): ?>
                    <img src="data:image/jpeg;base64,<?php echo $imagemGoleiro; ?>" alt="<?php echo htmlspecialchars($goleiroSelecionado); ?>">
                    <p><?php echo htmlspecialchars($goleiroSelecionado); ?></p>
                <?php else: ?>
                    <button onclick="abrirLista('listaGoleiros')">
                        <img src="../assets/img/plus.png" alt="Adicionar">
                    </button>
                <?php endif; ?>
            </section>

            <!-- Defensores -->
            <h2>Defensores</h2>
        
            <section class="cards-defensores">
                
                <?php foreach ($imagensDefensores as $defensor): ?>
                    <section class="cards">
                        <img src="data:image/jpeg;base64,<?php echo $defensor['imagem']; ?>" alt="<?php echo htmlspecialchars($defensor['nome']); ?>">
                        <p><?php echo htmlspecialchars($defensor['nome']); ?></p>
                    </section>
                <?php endforeach; ?>

                <!-- Botão para adicionar defensor -->
                <section class="cards">
                    <button onclick="abrirLista('listaDefensores')">
                        <img src="../assets/img/plus.png" alt="Adicionar">
                    </button>
                </section>

                
            </section>

            <!-- Lista de Goleiros -->
            <section class="lista-jogadores" id="listaGoleiros">
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
            </section>

            <!-- Lista de Defensores -->
            <section class="lista-jogadores" id="listaDefensores">
                <h3>Selecione um Defensor:</h3>
                <ul>
                    <?php foreach ($defensores as $defensor): ?>
                        <li>
                            <a href="?posicao=Defensores&jogador=<?php echo urlencode($defensor); ?>">
                                <?php echo htmlspecialchars($defensor); ?>
                            </a>
                        </li>
                    <?php endforeach; ?>
                </ul>
            </section>

        </section>

    </section>

    <footer>
        <hr>
        <h3>Barcelona DreamTeam</h3>
    </footer>

    <!-- JavaScript -->
    <script>
        function abrirLista(id) {
            document.getElementById(id).style.display = 'block';
        }

        window.addEventListener('click', function(event) {
            const listas = document.querySelectorAll('.lista-jogadores');
            const botao = event.target.closest('button');
            const dentroDaLista = event.target.closest('.lista-jogadores');

            if (!dentroDaLista && !botao) {
                listas.forEach(lista => lista.style.display = 'none');
            }
        });
    </script>

</body>
</html>
