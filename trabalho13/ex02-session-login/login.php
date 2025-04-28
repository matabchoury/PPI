<?php
// login.php: arquivo que processa o login

session_start(); // Inicia a sessão para armazenar informações do usuário

require "conexaoMysql.php"; // Conexão com o banco de dados
$pdo = mysqlConnect();

// Captura os dados enviados via POST
$email = $_POST["email"] ?? "";
$senha = $_POST["senha"] ?? "";

$sql = <<<SQL
SELECT hash_senha
FROM usuario
WHERE email = ?
SQL;

$stmt = $pdo->prepare($sql);
$stmt->execute([$email]);
$usuario = $stmt->fetch(PDO::FETCH_ASSOC);

if ($usuario !== false) {
  // Verifica se a senha fornecida corresponde ao hash no banco
  if (password_verify($senha, $usuario['hash_senha'])) {
    $_SESSION["email"] = $email; // Armazena o e-mail na sessão para identificar o usuário logado
    $response = ['success' => true, 'newLocation' => 'home.php'];
    echo json_encode($response);
    exit();
  }
}

// Se falhar (usuário não encontrado ou senha incorreta), envia resposta de falha
$response = ['success' => false];
echo json_encode($response);
?>
