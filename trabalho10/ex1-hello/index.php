<?php

// Requer a conexão com o banco de dados
require "../conexaoMysql.php";
$pdo = mysqlConnect(); // Estabelece a conexão com o banco de dados utilizando a função definida no arquivo de conexão

try {
  // Definindo o comando SQL para selecionar os dados da tabela "aluno"
  $sql = <<<SQL
    SELECT nome, telefone
    FROM aluno
  SQL;

  // Executando a consulta SQL para obter os dados da tabela
  $stmt = $pdo->query($sql); // O método query executa a consulta e retorna um objeto de resultado
} 
catch (Exception $e) {
  // Caso ocorra um erro na execução da consulta (como erro de conexão ou SQL inválido), a execução é interrompida
  // e a mensagem de erro é exibida.
  exit('Ocorreu uma falha: ' . $e->getMessage());
}

?>

<!doctype html>
<html lang="pt-BR">

<head>
  <meta charset="utf-8">
  <!-- Tag de responsividade para garantir que a página seja visualizada corretamente em dispositivos móveis -->
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Hello World - Listagem de Dados em Tabela do MySQL</title>

  <!-- Inclusão do arquivo CSS do Bootstrap para estilização -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
</head>

<body>
  <div class="container">
    <!-- Cabeçalho da página com título -->
    <h3>Dados na tabela <b>aluno</b></h3>
    <!-- Tabela para exibir os dados -->
    <table class="table table-striped table-hover">
      <tr>
        <th>Nome</th> <!-- Coluna para nome do aluno -->
        <th>Telefone</th> <!-- Coluna para telefone do aluno -->
      </tr>

      <?php
      // Laço que percorre todas as linhas retornadas pela consulta SQL
      while ($row = $stmt->fetch()) {
        // Escapando os dados para prevenir XSS (Cross-Site Scripting), garantindo que caracteres especiais sejam convertidos
        // em entidades HTML, como <, >, &, etc., para evitar que sejam interpretados como código.
        $nome = htmlspecialchars($row['nome']);
        $telefone = htmlspecialchars($row['telefone']);

        // Exibindo os dados em cada linha da tabela
        // Cada linha da tabela é preenchida com o nome e telefone do aluno
        echo <<<HTML
        <tr>
          <td>$nome</td> <!-- Exibe o nome do aluno -->
          <td>$telefone</td> <!-- Exibe o telefone do aluno -->
        </tr>      
        HTML;
      }
      ?>
    </table>
    <!-- Link para voltar ao menu de opções -->
    <a href="../index.html">Menu de opções</a>
  </div>

</body>

</html>
