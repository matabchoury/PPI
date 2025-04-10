<?php
require 'conexaoMysql.php';
require 'paciente.php';

$conexao = new PDO("mysql:host=localhost;dbname=sistema", "usuario", "senha");
$paciente = new Paciente($conexao);

if ($_GET['acao'] == 'adicionarPaciente') {
    $nome = $_POST['nome'];
    $sexo = $_POST['sexo'];
    $email = $_POST['email'];
    $peso = $_POST['peso'];
    $altura = $_POST['altura'];
    $tipo_sanguineo = $_POST['tipo_sanguineo'];

    $resultado = $paciente->Create($nome, $sexo, $email, $peso, $altura, $tipo_sanguineo);
    echo json_encode(['sucesso' => $resultado]);
} elseif ($_GET['acao'] == 'listarPacientes') {
    $stmt = $conexao->query("SELECT Pessoa.nome, Pessoa.email, Paciente.sexo, Paciente.peso, Paciente.altura, Paciente.tipo_sanguineo FROM Pessoa INNER JOIN Paciente ON Pessoa.idPessoa = Paciente.idPessoa");
    $pacientes = $stmt->fetchAll(PDO::FETCH_ASSOC);
    echo json_encode($pacientes);
}
?>
