<?php
// logout.php: responsável por encerrar a sessão do usuário

session_start(); // Inicia a sessão para poder destruí-la
session_unset(); // Remove todas as variáveis de sessão
session_destroy(); // Destroi a sessão

// Redireciona para a página de login após logout
header("Location: index.html");
exit();
?>
