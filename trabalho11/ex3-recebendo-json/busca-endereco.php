<?php

// Define a classe Endereco com 3 propriedades públicas: rua, bairro e cidade
class Endereco
{
  public $rua;
  public $bairro;
  public $cidade;
  // Construtor que define os valores das propriedades ao criar um novo objeto
  function __construct($rua, $bairro, $cidade)
  {
    $this->rua = $rua;
    $this->bairro = $bairro;
    $this->cidade = $cidade;
  }
}
// Obtém o valor do CEP enviado pela URL via método GET
$cep = $_GET['cep'] ?? ''; // Se não for informado, assume string vazia
// Verifica o CEP e instancia um objeto Endereco correspondente
if ($cep == '38400-100')
  $endereco = new Endereco('Av Floriano', 'Centro', 'Uberlândia');
else if ($cep == '38400-200')
  $endereco = new Endereco('Rua Tiradentes', 'Fundinho', 'Uberlândia');
// Se o CEP não for reconhecido, retorna um endereço vazio
else {
  $endereco = new Endereco('', '', '');
}
// Define o cabeçalho da resposta HTTP como JSON
header('Content-type: application/json');
// Converte o objeto Endereco em JSON e envia como resposta
echo json_encode($endereco);
