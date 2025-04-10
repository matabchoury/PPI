<?php

require "../conexaoMysql.php";
$pdo = mysqlConnect();

$nome = $_POST["nome"] ?? "";
$telefone = $_POST["telefone"] ?? "";

$sql = <<<SQL
INSERT INTO aluno (nome, telefone)
VALUES (? , ?)
SQL;

try {
  $stmt = $pdo->prepare($sql);
  $stmt->execute([$nome, $telefone]);
  header("location: mostra-alunos.php");
  exit();
} catch (Exception $e) {

  exit('Falha inesperada: ' . $e->getMessage());
}

/* 
Código vulnerável abaixo (comentado para referência):

try {
  // NÃO FAÇA ISSO! Este código está vulnerável, pois não utiliza placeholders ou métodos de validação.

  // Aqui, as variáveis $nome e $telefone são diretamente inseridas no SQL, sem nenhum tipo de validação.
  // O PHP irá tentar "avaliar" as variáveis, o que pode permitir que comandos indesejados sejam executados no banco de dados,
  // caso o usuário tenha preenchido os campos de forma maliciosa.

  // Isso ocorre porque a variável é concatenada diretamente na string SQL, o que pode resultar em uma manipulação indesejada
  // da consulta e gerar resultados inesperados, como a exclusão de dados ou a inserção de informações indesejadas.
  
  // Código vulnerável:
  $sql = <<<SQL
  INSERT INTO aluno (nome, telefone)
  VALUES ('$nome', '$telefone'); // Dados inseridos diretamente no SQL sem tratamento
  SQL;  

  // O comando exec executa o SQL vulnerável, permitindo que valores maliciosos possam alterar o comportamento da consulta
  $pdo->exec($sql);
  header("location: mostra-alunos.php"); // Redireciona após a inserção
  exit();
} 
catch (Exception $e) {  
  // Exibe mensagem de erro se algo falhar
  exit('Falha ao cadastrar os dados: ' . $e->getMessage());
}
*/

