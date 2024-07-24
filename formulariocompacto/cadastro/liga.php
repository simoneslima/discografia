<?php
// Incluir o arquivo de formulário HTML
include_once("form_comp.html");

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
  $Singles = $_POST['Singles'];
  $Rotacoes = $_POST['Rotacoes'];
  $Quant_Musicas = $_POST['Quant_Musicas'];
  $Selo = $_POST['Selo'];
  $Ano_Prensagem = $_POST['Ano_Prensagem'];
  $Origem = $_POST['Origem'];
  $Quant_Disco = $_POST['Quant_Disco'];


  // Prepara e vincula
$liga = $conectar->prepare("INSERT INTO compacto (Singles, Rotacoes, Quant_Musicas, Selo, Ano_Prensagem, Origem, Quant_Disco) VALUES(?, ?, ?, ?, ?, ?, ?)");
$liga->bind_param("ssissss", $Singles, $Rotacoes, $Quant_Musicas, $Selo, $Ano_Prensagem, $Origem, $Quant_Disco);

 // Executa
 if ($liga->execute()) {
    echo "Novo registro criado com sucesso";
} else {
    echo "Erro: " . $liga->error;
}

// Fecha a conexão
$liga->close();
$conectar->close();
}


?>

