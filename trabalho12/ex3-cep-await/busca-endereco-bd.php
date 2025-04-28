<?php

require "conexaoMysql.php";
$pdo = mysqlConnect();

$cep = $_GET['cep'] ?? '';

try
{
  $stmt = $pdo->prepare(
    <<<SQL
    SELECT cep, logradouro, bairro, cidade
    FROM endereco
    WHERE cep = ?
    SQL
  );

  $stmt->execute([$cep]);  
  $endereco = $stmt->fetch(PDO::FETCH_OBJ);
  header('Content-Type: application/json; charset=utf-8');
  echo json_encode($endereco);
} 
catch (Exception $e) {
  exit("Falha ao buscar endereco: " . $e->getMessage());
}

CREATE TABLE endereco (
  cep VARCHAR(9) PRIMARY KEY,
  rua VARCHAR(100),
  bairro VARCHAR(50),
  cidade VARCHAR(50)
);

