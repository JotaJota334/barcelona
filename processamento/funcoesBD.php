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

function RecuperarCard() {
    $conexao = conectarBD();
    $consulta = "SELECT nome, posicao, imagem FROM cards";
    $resultado = mysqli_query($conexao, $consulta);
    
    $cards = array();

    if (mysqli_num_rows($resultado) > 0) {
        while ($linha = mysqli_fetch_assoc($resultado)) {
            $cards[] = $linha;
        }
    }

    mysqli_close($conexao);
    return $cards;
}

?>