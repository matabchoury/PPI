<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <!-- 1: Tag de responsividade -->
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Página Dinâmica - Listagem de Contatos - Vulnerável</title>

  <!-- 2: Bootstrap CSS -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
</head>

<body>

  <div class="container">

    <h3>Contatos Carregados do Arquivo <i>contatos.txt</i></h3>
    <table class="table table-striped">
      <thead>
        <tr>
          <th>Nome</th>
          <th>CPF</th>
          <th>E-mail</th>
          <th>Telefone</th>
          <th>Endereço</th>
          <th>Número</th>
          <th>Cidade</th>
          <th>Estado</th>
        </tr>
      </thead>

      <tbody>
        <?php
        require "contatos.php";
        $arrayContatos = carregaContatosDeArquivo();
        foreach ($arrayContatos as $contato) {
          echo <<<HTML
            <tr>
              <td>$contato->nome</td>
              <td>$contato->cpf</td>
              <td>$contato->email</td>
              <td>$contato->telefone</td>
              <td>$contato->endereco</td>
              <td>$contato->numero</td>
              <td>$contato->cidade</td>
              <td>$contato->estado</td>
            </tr>
          HTML;
        }
        ?>
      </tbody>
    </table>
    <a href="index.html">Voltar à página inicial</a>
  </div>

</body>
</html>