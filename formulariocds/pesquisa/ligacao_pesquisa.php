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
if (isset($_GET['q'])) {
    // Filtra e sanitiza o termo de busca
    $termo_busca = $conn->real_escape_string($_GET['q']);

    // Consulta SQL para buscar artistas e seus álbuns na tabela cds
    $sql = "SELECT Artista, GROUP_CONCAT(nome_disco SEPARATOR '<br>') AS Nome_disco FROM cds WHERE Artista LIKE '%$termo_busca%' GROUP BY Artista";

    // Executa a consulta
    $result = $conn->query($sql);

    // Verifica se houve resultados
    if ($result->num_rows > 0) {
        // Exibe os resultados
        while ($row = $result->fetch_assoc()) {
            // Exibe o nome do artista
            echo "<strong>Artista:</strong> " . $row["Artista"] . "<br>";

            // Separa os álbuns em um array
            $albums = explode('<br>', $row["Nome_disco"]);

            // Inicializa a contagem dos álbuns
            $album_count = 1;

            // Exibe os álbuns numerados
            echo "<strong>Álbuns:</strong><br>";
            foreach ($albums as $album) {
                echo $album_count . ". " . $album . "<br>";
                $album_count++;
            }

            echo "<hr>"; // Adiciona uma linha divisória
        }
    } else {
        echo "Nenhum resultado encontrado.";
    }
}

// Fecha a conexão
$conn->close();
?>


