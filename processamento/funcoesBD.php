<?php

function conectarBD() {
    $conexao = mysqli_connect("127.0.0.1", "root", "", "barcelona");
    return $conexao;
}

function verificarLogin($email, $senha) {
    $conexao = conectarBD();

    $sql = "SELECT * FROM usuarios WHERE email = ? AND senha = ?";

    $stmt = $conexao->prepare($sql);
    $stmt->bind_param("ss", $email, $senha);
    $stmt->execute();

    $resultado = $stmt->get_result();

    mysqli_close($conexao);

    return $resultado->num_rows === 1;
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

function InserirHighlight($highlight, $imagem) {
    $conexao = conectarBD();
    $consulta = "INSERT INTO highlights (highlights, imagem) VALUES ('$highlight', '$imagem')";
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

function RecuperarHighlights() {
    $conexao = conectarBD();
    $consulta = "SELECT highlights, imagem FROM highlights";

    $resultado = mysqli_query($conexao, $consulta);

    $highlights = array();

    if (mysqli_num_rows($resultado) > 0) {
        while ($linha = mysqli_fetch_assoc($resultado)) {
            $highlights[] = $linha;
        }
    }

    mysqli_close($conexao);
    return $highlights;
}

?>