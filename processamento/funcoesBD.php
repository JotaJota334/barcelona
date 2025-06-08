<?php

function conectarBD() {
    $conexao = mysqli_connect("127.0.0.1", "root", "", "barcelona");
    return $conexao;
}

function InserirUser($nome, $email, $senha) {
    $conexao = mysqli_connect("127.0.0.1", "root", "", "barcelona");
    $consulta = "INSERT INTO usuarios (nome, email, senha) VALUES ('$nome', '$email', '$senha')";
    mysqli_query($conexao, $consulta);
}

function RecuperarSenha($email) {
    $conexao = mysqli_connect("127.0.0.1", "root", "", "barcelona");
    $consulta = "SELECT senha from usuarios WHERE email = '$email'";

    $dados = mysqli_fetch_assoc(mysqli_query($conexao, $consulta));
    
    return $dados['senha'];
    
}

function AlterarSenha($email, $novaSenha) {
    $conexao = conectarBD();
    $consulta = "UPDATE usuarios SET senha = '$novaSenha' WHERE email = '$email'";
    return mysqli_query($conexao, $consulta);
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

    $posicao = mysqli_real_escape_string(conectarBD(), $posicao);
    // mysqli_real_escape_string 
    // irá escapar as strings e prepara-las para serem usadas em comandos SQL

    $consulta = "SELECT nome FROM cards WHERE posicao = '$posicao'";

    $resultado = mysqli_query(conectarBD(), $consulta);

    $jogadores = [];
    
    while ($linha = mysqli_fetch_assoc($resultado)) {
        $jogadores[] = $linha['nome'];
    }

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