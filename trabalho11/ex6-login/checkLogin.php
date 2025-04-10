<?php

// Define uma classe para estruturar o resultado do login
class LoginResult
{
  public $isAuthorized; // Indica se o login foi bem-sucedido (true/false)
  public $newLocation;  // Armazena a URL de redirecionamento em caso de sucesso
  // Construtor que inicializa as propriedades da classe
  function __construct($isAuthorized, $newLocation)
  {
    $this->isAuthorized = $isAuthorized;
    $this->newLocation = $newLocation;
  }
}
// Obtém os valores enviados pelo formulário via POST, com valores padrão vazios se não existirem
$email = $_POST['email'] ?? '';
$senha = $_POST['senha'] ?? '';
// Validação simplificada para fins didáticos. Não faça isso em produção!
if ($email == 'fulano@mail.com' && $senha == '123456')
  // Se as credenciais estiverem corretas, cria um objeto LoginResult com sucesso
  $loginResult = new LoginResult(true, 'home.html');
else
  // Se as credenciais estiverem incorretas, cria um objeto LoginResult com falha
  $loginResult = new LoginResult(false, '');
// Define o cabeçalho da resposta como JSON, informando ao cliente o formato dos dados
header('Content-type: application/json');
// Converte o objeto LoginResult em uma string JSON e a envia como resposta
echo json_encode($loginResult);

//Resposta da pergunta EX6
/* Quando tentei entrar com o email dado e a senha 123 nada ocorreu porem quando tentei com a 
senha 123456 fui redirecinado para uma nova pagina Home */