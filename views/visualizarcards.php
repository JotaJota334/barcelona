<?php
include('../processamento/funcoesBD.php');

$cards = BuscarCards();
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8" />
    <title>Visualizar Cards</title>
    <style>
        .card {
            border: 1px solid #ccc;
            padding: 10px;
            margin-bottom: 15px;
            max-width: 300px;
        }
        .card img {
            max-width: 100%;
            height: auto;
        }
    </style>
</head>
<body>

<h1>Cards cadastrados</h1>

<?php if (count($cards) === 0): ?>
    <p>Nenhum card cadastrado.</p>
<?php else: ?>
    <?php foreach ($cards as $card): ?>
        <div class="card">
            <h2><?php echo htmlspecialchars($card['nome']); ?></h2>
            <p><strong>Posição:</strong> <?php echo htmlspecialchars($card['posicao']); ?></p>
            <img src="data:image/jpeg;base64,<?php echo base64_encode($card['imagem']); ?>" alt="<?php echo htmlspecialchars($card['nome']); ?>" />
        </div>
    <?php endforeach; ?>
<?php endif; ?>

</body>
</html>