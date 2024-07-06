<?php

// Incluir o arquivo de formulário HTML
include_once("formulario.html");

// Verifica se os dados foram enviados pelo formulário
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Conexão com o banco de dados
    $host = "localhost:3306"; // Nome do host do banco de dados
    $usuario = "root"; // Nome de usuário do banco de dados
    $senha = ""; // Senha do banco de dados
    $banco = "discografia"; // Nome do banco de dados

    // Cria a conexão
    $conn = new mysqli($host, $usuario, $senha, $banco);

    // Verifica a conexão
    if ($conn->connect_error) {
        die("Conexão falhou: " . $conn->connect_error);
    }

    // Pega os dados do formulário
    $artista = $_POST['Artista'];
    $nome_disco = $_POST['Nome_disco'];
    $quantidade = $_POST['Quant'];
    $faixas = $_POST['Faixas'];
    $tipo = $_POST['Tipo'];
    $quant_midia = $_POST['Quant_Midia'];
    $ano_lancamento = $_POST['Ano_Lancamento'];
    $ano_cd = $_POST['Ano_Cd'];
    $pais = $_POST['Pais'];


// Prepara e vincula
$stmt = $conn->prepare("INSERT INTO cds (artista, nome_disco, Quant, faixas, tipo, quant_midia, ano_lancamento, ano_cd, pais) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)");
$stmt->bind_param("ssiiisiss", $artista, $nome_disco, $quantidade, $faixas, $tipo, $quant_midia, $ano_lancamento, $ano_cd, $pais);


    // Executa
    if ($stmt->execute()) {
        echo "Novo registro criado com sucesso";
    } else {
        echo "Erro: " . $stmt->error;
    }

    // Fecha a conexão
    $stmt->close();
    $conn->close();
}
?>
