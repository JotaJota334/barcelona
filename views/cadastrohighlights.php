<?php
    require_once('../processamento/funcoesBD.php');

    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $highlight = $_POST['inputHighlight'];

        $imagemTmp = $_FILES['inputImagem']['tmp_name'];

        $imagemBinario = addslashes(file_get_contents($imagemTmp));

        InserirHighlight($highlight, $imagemBinario);

        header('Location:cadastrohighlights.php');
        die();
    }
?> 

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../assets/basestyle.css">
    <title>Registro Highlights</title>
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

        <h2>Registro Highlight</h2>

        <form method="POST" action="" enctype="multipart/form-data">
            
            <input type="text" placeholder="Highlight" name="inputHighlight" required>
            <input type="file" placeholder="Imagem" name="inputImagem" required>
            <input id="botao-cadastro-card" type="submit" value="Registrar Highlight">
            
        </form>

    </section>

    <footer>

        <hr>
        <h3>Barcelona DreamTeam</h3>

    </footer>

</body>
</html>