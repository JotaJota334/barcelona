<?php
    require_once('../processamento/funcoesBD.php');

    $highlights = RecuperarHighlights();
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../assets/highlights.css">
    <title>Visualizar Highlights</title>
</head>
<body>
    
    <nav class="navbar">
        <img src="../assets/img/barcelona.png">
        <ul>
            <li><a href="time.php">Barça Lineup</a></li>
            <li><a href="cadastrocard.php">Cards</a></li>
            <li><a href="visualizarcards.php">Visualizar Cards</a></li>
            <li><a href="cadastrohighlights.php">Highlights</a></li>
            <li><a href="#">Visualizar Highlights</a></li>
            <li><a href="visualizarusers.php">Visualizar Users</a></li>
        </ul>
    </nav>



    <section class="box-highlights">

        <h1>HIGHLIGHTS</h1>

        

        <?php if (!empty($highlights)): ?>

            <?php foreach($highlights as $highlight): ?>

                <section class="highlights">

                    <img src="data:image/jpeg;base64,<?php echo base64_encode($highlight['imagem']); ?>">
                    
                    <p><?php echo ($highlight['highlights'])?></p>

                </section>

            <?php endforeach; ?>

        <?php else: ?>

            <p>Nenhum highlight encontrado.</p>

        <?php endif; ?>

    </section>

    

    <footer>

        <hr>
        <h3>Barcelona DreamTeam</h3>

    </footer>


</body>
</html>