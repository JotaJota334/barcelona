<?php
    require_once('../processamento/funcoesBD.php');

    $cards = RecuperarCard();
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../assets/basestyle.css">
    <title>Visualizar Cards</title>
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

        <h1>CARDS</h1>

        <section class="box-cards">

            <?php if (!empty($cards)): ?>
                <?php foreach($cards as $card): ?>

                    <section class="cards">
                        <img 
                            src="data:image/jpeg;base64,<?php echo base64_encode($card['imagem']); ?>" 
                            alt="<?php echo htmlspecialchars($card['nome']); ?>">

                        <section class="info-jogador">
                            <p><strong>Nome:</strong> <?php echo htmlspecialchars($card['nome']); ?></p>
                            <p><strong>Posição:</strong> <?php echo htmlspecialchars($card['posicao']); ?></p>
                        </section>
                    </section>

                <?php endforeach; ?>
            <?php else: ?>
                <p>Nenhum card encontrado.</p>
            <?php endif; ?>

        </section>

    </section>

    

    <footer>

        <hr>
        <h3>Barcelona DreamTeam</h3>

    </footer>


</body>
</html>