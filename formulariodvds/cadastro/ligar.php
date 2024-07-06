<?php
// Incluir o arquivo de formulário HTML
include_once("formdvds.html");

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
  $titulo = $_POST['Titulo'];
  $tipoConteudo = $_POST['TipoConteudo'];
  $estudio = $_POST['Estudio'];
  $produto = $_POST['Produto'];
  $contemMusicas = $_POST['ContemMusicas'];
  $diretor = $_POST['Diretor'];
  $atorPrincipal = $_POST['AtorPrincipal'];
  $anoLancamento = $_POST['AnoLancamento'];
  $genero = $_POST['Genero'];
  $duracaoMinutos = $_POST['DuracaoMinutos'];

  // Prepara e vincula
$ligar = $conectar->prepare("INSERT INTO dvds (Titulo, TipoConteudo, Estudio, Produto, ContemMusicas, Diretor, AtorPrincipal, AnoLancamento, Genero, DuracaoMinutos) VALUES(?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");
$ligar->bind_param("sssssssisi", $titulo, $tipoConteudo, $estudio, $produto, $contemMusicas, $diretor, $atorPrincipal, $anoLancamento, $genero, $duracaoMinutos );

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

