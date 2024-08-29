<?php
$host = "localhost"; // Nome do host do banco de dados
$usuario = "root"; // Nome de usuário do banco de dados
$senha = ""; // Senha do banco de dados
$banco = "discografia"; // Nome do banco de dados

// Cria a conexão
$conn = new mysqli($host, $usuario, $senha, $banco);

// Verifica a conexão
if ($conn->connect_error) {
    die("Conexão falhou: " . $conn->connect_error);
}

// Verifica se foi feita uma consulta
if (isset($_GET['pesquisa'])) {
    // Filtra e sanitiza o termo de busca
    $termo_busca = $conn->real_escape_string($_GET['pesquisa']);

    // Consulta SQL para buscar artistas e seus álbuns na tabela vinil
    $sql = "SELECT Artista, GROUP_CONCAT(Disco SEPARATOR ',') AS discos 
            FROM vinil 
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






