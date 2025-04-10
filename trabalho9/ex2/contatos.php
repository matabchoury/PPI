<?php

class Contato
{
  public $nome;
  public $cpf;
  public $email;
  public $telefone;
  public $endereco;
  public $numero;
  public $cidade;
  public $estado;

  function __construct($nome, $cpf, $email, $telefone, $endereco, $numero, $cidade, $estado)
  {
    $this->nome = $nome;
    $this->cpf = $cpf;
    $this->email = $email;
    $this->telefone = $telefone;
    $this->endereco = $endereco;
    $this->numero = $numero;
    $this->cidade = $cidade;
    $this->estado = $estado;
  }

  public function SalvaEmArquivo()
  {
    // Abre o arquivo de texto para escrita de conteúdo no final
    $arq = fopen("contatos.txt", "a");

    // Neste exemplo os dados são armazenados de maneira simplificada,
    // no formato textual com campos separados por dois ponto-e-vírgula.
    fwrite($arq, "{$this->nome};{$this->cpf};{$this->email};{$this->telefone};{$this->endereco};{$this->numero};{$this->cidade};{$this->estado}\n");

    // Fecha o arquivo de texto.
    fclose($arq);
  }
}

// Carrega as informações dos contatos do arquivo de texto
// e retorna um array de objetos correspondente
function carregaContatosDeArquivo()
{
  $arrayContatos = [];

  // Abre o arquivo contatos.txt para leitura
  $arq = fopen("contatos.txt", "r");
  if (!$arq)
    return $arrayContatos;

  // Le os dados do arquivo, linha por linha, e armazena no vetor $contatos
  while (!feof($arq)) {
    // fgets lê uma linha de texto do arquivo, mas traz junto a quebra de linha (/n) no final, se houver
    // a função trim elimina caracteres em branco (inclusive /n) do início e do final da string
    $contato = trim(fgets($arq));

    if ($contato != "") {
      // Separa dados na linha utilizando o ';' como separador
      list($nome, $cpf, $email, $telefone, $endereco, $numero, $cidade, $estado) = array_pad(explode(';', $contato), 3, null);

      // Cria novo objeto representado o contato e adiciona no final do array
      $novoContato = new Contato($nome, $cpf, $email, $telefone, $endereco, $numero, $cidade, $estado);
      $arrayContatos[] = $novoContato;
    }
  }

  // Fecha o arquivo
  fclose($arq);
  return $arrayContatos;
}
