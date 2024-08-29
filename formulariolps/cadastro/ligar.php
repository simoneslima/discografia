<?php
// Incluir o arquivo de formulário HTML
include_once("form_lps.html");

// Verifica se os dados foram enviados pelo formulário
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Conexão com o banco de dados
    $host = "localhost:3306"; // Nome do host do banco de dados
    $usuario = "root"; // Nome de usuário do banco de dados
    $senha = ""; // Senha do banco de dados
    $banco = "discografia"; // Nome do banco de dados

    // Cria a conexão
    $conectar = new mysqli($host, $usuario, $senha, $banco);

    // Verifica a conexão
    if ($conectar->connect_error) {
        die("Conexão falhou: " . $conectar->connect_error);
    }

    // Pega os dados do formulário
    $Artista = $_POST['Artista'];
    $Disco = $_POST['Disco'];
    $Tipo = $_POST['Tipo'];
    $Faixas = $_POST['Faixas'];
    $Selo = $_POST['Selo'];
    $Origem = $_POST['Origem'];
    $Prensagem = $_POST['Prensagem'];
    $Midias = $_POST['Midias'];
    $Est_Disco = $_POST['Est_Disco'];
    $Capa_tipo = $_POST['Capa_tipo'];
    $Copias = $_POST['Copias'];

    // Prepara e vincula
    $ligar = $conectar->prepare("INSERT INTO vinil (Artista, Disco, Tipo, Faixas, Selo, Origem, Prensagem, Midias, Est_Disco, Capa_tipo, Copias) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");
    $ligar->bind_param("sssissssssi", $Artista, $Disco, $Tipo, $Faixas, $Selo, $Origem, $Prensagem, $Midias, $Est_Disco, $Capa_tipo, $Copias);

    // Executa
    if ($ligar->execute()) {
        echo "Novo registro criado com sucesso";
    } else {
        echo "Erro: " . $ligar->error;
    }

    // Fecha a conexão
    $ligar->close();
    $conectar->close();
}
?>

