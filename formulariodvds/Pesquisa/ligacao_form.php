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
if (isset($_GET['pesquisa'])) {
    // Filtra e sanitiza o termo de busca
    $termo_busca = $conn->real_escape_string($_GET['pesquisa']);

    // Consulta SQL para buscar títulos na tabela dvds
    $sql = "SELECT Titulo FROM dvds WHERE Titulo LIKE '%$termo_busca%'";

    // Executa a consulta
    $result = $conn->query($sql);

    // Verifica se houve resultados
    if ($result->num_rows > 0) {
        // Inicializa a contagem dos dvds
        $dvds_count = 1;

        // Exibe os resultados
        echo "<strong>Títulos:</strong><br>";
        while ($row = $result->fetch_assoc()) {
            echo $dvds_count . ". " . $row['Titulo'] . "<br>";
            $dvds_count++;
        }
        echo "<hr>"; // Adiciona uma linha divisória
    } else {
        echo "Nenhum resultado encontrado.";
    }
}

// Fecha a conexão
$conn->close();
?>



