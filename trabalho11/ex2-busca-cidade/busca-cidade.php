<?php

// Obtém o valor do parâmetro 'cep' enviado via GET. Se não existir, usa uma string vazia.
$cep = $_GET['cep'] ?? '';
// Verifica se o CEP corresponde a "38400-100"
if ($cep == '38400-100')
  echo 'Uberlândia'; // Retorna "Uberlândia" como resposta
// Verifica se o CEP corresponde a "38700-000"
else if ($cep == '38700-000')
  echo 'Patos de Minas'; // Retorna "Patos de Minas" como resposta
// Se o CEP não for reconhecido
else {
  http_response_code(404); // Define o código de resposta HTTP como 404 (não encontrado)
  echo "$cep is not available"; // Retorna uma mensagem indicando que o CEP não está disponível
}
