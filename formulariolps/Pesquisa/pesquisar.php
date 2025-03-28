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
if (isset($_GET['pesquisalp'])) {
    // Filtra e sanitiza o termo de busca
    $termo_busca = $conn->real_escape_string($_GET['pesquisalp']);

    // Consulta SQL para buscar artistas e seus álbuns na tabela lps
    $sql = "SELECT Artista, GROUP_CONCAT(Disco SEPARATOR ',') AS discos 
            FROM lps 
            WHERE Artista LIKE '%$termo_busca%' 
            GROUP BY Artista";

    // Executa a consulta
    $result = $conn->query($sql);

    // Verifica se houve erros na consulta
    if (!$result) {
        die("Erro na consulta: " . $conn->error);
    }

    // Verifica se houve resultados
    if ($result->num_rows > 0) {
        // Exibe os resultados
        while ($row = $result->fetch_assoc()) {
            // Exibe o nome do artista
            echo "<strong>Artista:</strong> " . htmlspecialchars($row["Artista"]) . "<br>";

            // Exibe os discos do artista em uma lista numerada
            echo "<strong>Discos:</strong><br>";
            $discos = explode(',', $row["discos"]); // Divide a lista de discos em um array
            echo "<ol>"; // Inicia a lista ordenada
            foreach ($discos as $index => $disco) {
                echo "<li>" . htmlspecialchars($disco) . "</li>"; // Adiciona cada disco à lista
            }
            echo "</ol>"; // Fecha a lista ordenada

            echo "<hr>"; // Adiciona uma linha divisória
        }
    } else {
        echo "Nenhum resultado encontrado.";
    }
} else {
    echo "Por favor, insira um termo de busca na URL.";
}

// Fecha a conexão
$conn->close();
?>

<!-- Botão de Voltar com Link -->
<a href="\index.html" class="botao-voltar">Voltar</a>
</div>
</body>
</html>






