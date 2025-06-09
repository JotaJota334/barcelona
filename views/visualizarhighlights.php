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
            <li><a href="#">Barça Lineup</a></li>
            <li><a href="#">Cards</a></li>
            <li><a href="#">Visualizar Cards</a></li>
            <li><a href="#">Highlights</a></li>
            <li><a href="#">Visualizar Highlights</a></li>
            <li><a href="#">Visualizar Users</a></li>
        </ul>
    </nav>



    <section class="">

        <h1>HIGHLIGHTS</h1>

        <section class="">

            <?php if (!empty($highlights)): ?>
                <?php foreach($highlights as $highlight): ?>

                    <section class="">
                        <img src="data:image/jpeg;base64,<?php echo base64_encode($highlight['imagem']); ?>">
                    </section>

                    <p><?php echo ($highlight['highlights'])?></p>

                <?php endforeach; ?>
            <?php else: ?>
                <p>Nenhum highlight encontrado.</p>
            <?php endif; ?>

        </section>

    </section>

    

    <footer>

        <hr>
        <h3>Barcelona DreamTeam</h3>

    </footer>


</body>
</html>