<?php
// Incluir o arquivo de formulário HTML
include_once("formdvds.html");

// Verifica se os dados foram enviados pelo formulário
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Conexão com o banco de dados
    $host = "localhost:3306"; // Nome do host do banco de dados
    $usuario = "root"; // Nome de usuário do banco de dados
    $senha = ""; // Senha do banco de dados
    $banco = "catalogar"; // Nome do banco de dados

    // Cria a conexão
    $conectar = new mysqli($host, $usuario, $senha, $banco);

    // Verifica a conexão
    if ($conectar->connect_error) {
        die("Conexão falhou: " . $conectar->connect_error);
    }

    // Pega os dados do formulário
    $titulo = $_POST['Titulo'];
    $tipoConteudo = $_POST['TipoConteudo'];
    $genero = $_POST['Genero'];
    $elenco = $_POST['Elenco'];
    $distribuidora = $_POST['Distribuidora'];
    $produto = $_POST['Produto'];
    $diretor = $_POST['Diretor'];
    $anoLancamento = $_POST['AnoLancamento'];
    $duracao = $_POST['Duracao'];
    $quantidadeMidias = $_POST['QuantidadeMidias']; // Novo campo adicionado

    // Prepara e vincula
    $ligar = $conectar->prepare("INSERT INTO dvds (Titulo, TipoConteudo, Genero, Elenco, Distribuidora, Produto, Diretor, AnoLancamento, Duracao, QuantidadeMidias) VALUES(?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");
    $ligar->bind_param("sssssssssi", $titulo, $tipoConteudo, $genero, $elenco, $distribuidora, $produto, $diretor, $anoLancamento, $duracao, $quantidadeMidias);

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



