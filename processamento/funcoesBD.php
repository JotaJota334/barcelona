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

?>