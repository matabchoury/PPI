<?php
// sessionVerification.php: garante que apenas usuários logados acessem certas páginas

session_start(); // Inicia a sessão para acessar as variáveis de sessão

if (!isset($_SESSION["email"])) {
  // Se o usuário não estiver logado (variável de sessão não existe), redireciona para o login
  header("Location: index.html");
  exit();
}
?>
