<?php

require "contatos.php";

// coleta os dados do formulário
$nome = $_POST["nome"] ?? "";
$cpf = $_POST["cpf"] ?? "";
$email = $_POST["email"] ?? "";
$telefone = $_POST["telefone"] ?? "";
$endereco = $_POST["endereco"] ?? "";
$numero = $_POST["numero"] ?? "";
$cidade = $_POST["cidade"] ?? "";
$estado = $_POST["estado"] ?? "";

// cria um novo contato e acrescenta no arquivo de texto
$novoContato = new Contato($nome, $cpf, $email, $telefone, $endereco, $numero, $cidade, $estado);
$novoContato->SalvaEmArquivo();

// redireciona o navegador para a página de listagem de contatos
header("location: listaContatos.php");

?>