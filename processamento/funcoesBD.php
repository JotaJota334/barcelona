<?php

function conectarBD() {
    $conexao = mysqli_connect("127.0.0.1", "root", "", "barcelona");
    return $conexao;
}

function InserirCard($nome, $posicao, $imagem) {
    $conexao = conectarBD();
    $consulta = "INSERT INTO cards (nome, posicao, imagem) VALUES ('$nome', '$posicao', '$imagem')";
    mysqli_query($conexao, $consulta);
}

function BuscarCards() {
    $conexao = conectarBD();

    // Seleciona os campos, usando o nome como chave primária
    $consulta = "SELECT nome, posicao, imagem FROM cards ORDER BY nome ASC";
    $resultado = mysqli_query($conexao, $consulta);

    $cards = [];
    if ($resultado) {
        while ($row = mysqli_fetch_assoc($resultado)) {
            $cards[] = $row;
        }
    }

    mysqli_close($conexao);
    return $cards;
}

?>