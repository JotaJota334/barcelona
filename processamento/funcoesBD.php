<?php

function conectarBD() {
    $conexao = mysqli_connect("127.0.0.1", "root", "", "barcelona");
    return $conexao;
}

function InserirUser($nome, $email, $senha) {
    $conexao = conectarBD();
    $consulta = "INSERT INTO usuarios (nome, email, senha) VALUES ('$nome', '$email', '$senha')";
    mysqli_query($conexao, $consulta);
}

function RecuperarSenha($email) {
    $conexao = conectarBD();
    $consulta = "SELECT senha from usuarios WHERE email = '$email'";

    $dados = mysqli_fetch_assoc(mysqli_query($conexao, $consulta));
    
    return $dados['senha'];
    
}

function AlterarSenha($email, $novaSenha) {
    $conexao = conectarBD();
    $consulta = "UPDATE usuarios SET senha = '$novaSenha' WHERE email = '$email'";
    return mysqli_query($conexao, $consulta);
}



function recuperarTodosEmails() {
    $conexao = conectarBD(); // Usa a função que você já tem
    $consulta = "SELECT email FROM usuarios";
    
    $resultado = mysqli_query($conexao, $consulta);

    $emails = [];

    if (mysqli_num_rows($resultado) > 0) {
        while ($linha = mysqli_fetch_assoc($resultado)) {
            $emails[] = $linha['email'];
        }
    }

    mysqli_close($conexao);
    return $emails;
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