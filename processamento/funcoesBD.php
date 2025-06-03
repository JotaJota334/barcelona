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

function buscarPorPosicao($posicao) {
    $conexao = conectarBD();
    $posicao = mysqli_real_escape_string($conexao, $posicao);
    $consulta = "SELECT nome FROM cards WHERE posicao = '$posicao'";
    $resultado = mysqli_query($conexao, $consulta);

    $jogadores = [];
    while ($linha = mysqli_fetch_assoc($resultado)) {
        $jogadores[] = $linha['nome'];
    }

    mysqli_close($conexao);
    return $jogadores;
}

// Buscar imagem pelo nome
function buscarImagemPorNome($nome) {
    $conexao = conectarBD();
    $nome = mysqli_real_escape_string($conexao, $nome);
    $consulta = "SELECT imagem FROM cards WHERE nome = '$nome'";
    $resultado = mysqli_query($conexao, $consulta);

    if ($linha = mysqli_fetch_assoc($resultado)) {
        return base64_encode($linha['imagem']); // codificar imagem para exibir
    } else {
        return null;
    }
}

?>