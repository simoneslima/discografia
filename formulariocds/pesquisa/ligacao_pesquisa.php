<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="\estilo_resultado.css">
    <title>Busca de Artistas e Álbuns</title>
</head>
<body>
    <div class="container">
        <h1>Resultado da Busca</h1>
        <?php
        // Inclui seu código PHP aqui
        $host = "localhost";
        $usuario = "root";
        $senha = "";
        $banco = "catalogar";

        $conn = new mysqli($host, $usuario, $senha, $banco);

        if ($conn->connect_error) {
            die("Conexão falhou: " . $conn->connect_error);
        }

        if (isset($_GET['q'])) {
            $termo_busca = $conn->real_escape_string($_GET['q']);
            $sql = "SELECT Artista, GROUP_CONCAT(nome_disco SEPARATOR '<br>') AS Nome_disco 
                    FROM cds WHERE Artista LIKE '%$termo_busca%' GROUP BY Artista";
            $result = $conn->query($sql);

            if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
                    echo "<div class='artista'><strong>Artista:</strong> " . $row["Artista"] . "</div>";
                    echo "<div class='albuns'><strong>Álbuns:</strong><br>";
                    $albums = explode('<br>', $row["Nome_disco"]);
                    $album_count = 1;
                    foreach ($albums as $album) {
                        echo $album_count . ". " . $album . "<br>";
                        $album_count++;
                    }
                    echo "</div><hr>";
                }
            } else {
                echo "<div class='mensagem'>Nenhum resultado encontrado.</div>";
            }
        }

        $conn->close();
        ?>
    </div>
    <a href="\index.html" class="botao-voltar">Voltar</a>
</body>
</html>
