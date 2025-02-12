<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="\estilo_resultado.css">
    <title>Busca por DVDS</title>
</head>
<body>
<div class="container">
<h1>Resultado da Busca</h1>
<?php
$host = "localhost"; // Nome do host do banco de dados
$usuario = "root"; // Nome de usuário do banco de dados
$senha = ""; // Senha do banco de dados
$banco = "catalogar"; // Nome do banco de dados

// Cria a conexão
$conn = new mysqli($host, $usuario, $senha, $banco);

// Verifica a conexão
if ($conn->connect_error) {
    die("Conexão falhou: " . $conn->connect_error);
}

// Verifica se foi feita uma consulta
if (isset($_GET['Singles'])) {
    // Filtra e sanitiza o termo de busca
    $termo_busca = $conn->real_escape_string($_GET['Singles']);

    // Consulta SQL para buscar títulos na tabela compacto
    $sql = "SELECT Singles FROM compacto WHERE Singles LIKE '%$termo_busca%'";

    // Executa a consulta
    $result = $conn->query($sql);

    // Verifica se houve resultados
    if ($result->num_rows > 0) {
        // Inicializa a contagem dos dvds
        $compacto_count = 1;

        // Exibe os resultados
        echo "<strong>Singles:</strong><br>";
        while ($row = $result->fetch_assoc()) {
            echo $compacto_count . ". " . $row['Singles'] . "<br>";
            $compacto_count++;
        }
        echo "<hr>"; // Adiciona uma linha divisória
    } else {
        echo "Nenhum resultado encontrado.";
    }
}

// Fecha a conexão
$conn->close();
?>
</div>
</body>
</html>