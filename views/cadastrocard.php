<?php
    include('../processamento/funcoesBD.php');

    if ($_SERVER['REQUEST_METHOD'] === 'POST') {

        $nome = $_POST['inputNome'];
        $posicao = $_POST['inputPosicao'];
        $imagemTmp = $_FILES['inputImagem']['tmp_name'];

        $imagemBinario = addslashes(file_get_contents($imagemTmp));

        InserirCard($nome, $posicao, $imagemBinario);

        header('Location: cadastrocard.php?sucesso=1');
        exit;
    }
?> 

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../assets/basestyle.css">
    <title>Cadastro Card</title>
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

        <h2>Cadastro de Card</h2>

        <form method="POST" action="" enctype="multipart/form-data">
            
            <input type="text" placeholder="Jogador" name="inputNome" required>
            <input type="text" placeholder="Posição" name="inputPosicao" required>
            <input type="file" placeholder="Imagem" name="inputImagem" required>
            <input id="botao-cadastro-card" type="submit" value="Cadastrar">
            
        </form>

    </section>

    <footer>

        <hr>
        <h3>Barcelona DreamTeam</h3>

    </footer>

</body>
</html>