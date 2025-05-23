<?php

class Endereco
{
  public $rua;
  public $bairro;
  public $cidade;

  function __construct($rua, $bairro, $cidade)
  {
    $this->rua = $rua;
    $this->bairro = $bairro;
    $this->cidade = $cidade;
  }
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  $cep = $_POST['cep'] ?? '';

  if ($cep == '38400-100')
    $endereco = new Endereco('Av Floriano', 'Centro', 'Uberlândia');
  else if ($cep == '38400-200')
    $endereco = new Endereco('Rua Tiradentes', 'Fundinho', 'Uberlândia');
  else
    $endereco = new Endereco('', '', '');
  
  header('Content-Type: application/json; charset=utf-8');
  echo json_encode($endereco);
} else {
  http_response_code(405);
  echo json_encode(['erro' => 'Método não permitido. Use POST.']);
}
