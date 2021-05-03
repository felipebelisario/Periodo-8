<?php

require "../database/conexaoMysql.php";
$pdo = mysqlConnect();

try {

  $sql = <<<SQL
  SELECT codigo, nome, sexo, email, telefone
  FROM Pessoa
  SQL;

  $sql2 = <<<SQL
  SELECT peso, altura, tipo_sanguineo
  FROM Paciente
  WHERE codigo = ?
  SQL;

  // Neste exemplo não é necessário utilizar prepared statements
  // porque não há possibilidade de injeção de SQL, 
  // pois nenhum parâmetro é utilizado na query SQL
  $stmt = $pdo->query($sql);
} 
catch (Exception $e) {
  //error_log($e->getMessage(), 3, 'log.php');
  exit('Ocorreu uma falha: ' . $e->getMessage());
}
?>
<!doctype html>
<html lang="pt-BR">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Tabelas</title>

  <!-- Bootstrap CSS -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-CuOF+2SnTUfTwSZjCXf01h7uYhfOBuxIhGKPbfEJ3+FqH/s6cIFN9bGr1HmAg4fQ" crossorigin="anonymous">

  <style>
    body {
      padding-top: 2rem;
    }
    img {
      width: 15px;
      height: 15px;
    }
  </style>
</head>

<body>

  <div class="container">
    <h3>Endereços cadastrados</h3>
    <table class="table table-striped table-hover">
      <tr>
        <th></th>
        <th>Id</th>
        <th>Nome</th>
        <th>Sexo</th>
        <th>Email</th>
        <th>Telefone</th>
        <th>Peso</th>
        <th>Altura</th>
        <th>Tipo Sanguíneo</th>
      </tr>

      <?php
      while ($row = $stmt->fetch()) {

        // Limpa os dados produzidos pelo usuário
        // com possibilidade de ataque XSS
        $email = htmlspecialchars($row['email']);
        $nome = htmlspecialchars($row['nome']);
        $sexo = htmlspecialchars($row['sexo']);
        $codigo = $row['codigo'];

        $stmt2 = $pdo->prepare($sql2);
        if (!$stmt2->execute([
          $codigo
        ])) throw new Exception('Falha na primeira inserção');

        $row2 = $stmt2->fetch();
        $tiposanguineo = htmlspecialchars($row2['tipo_sanguineo']);

        echo <<<HTML
          <tr>
            <td><a href="ex4-exclui-paciente.php?codigo=$codigo">
              <img src="images/delete.png"></a>
            </td> 
            <td>$codigo</td>
            <td>$nome</td>
            <td>$sexo</td>
            <td>$email</td>
            <td>{$row['telefone']}</td>
            <td>{$row2['peso']}</td>
            <td>{$row2['altura']}</td>
            <td>$tiposanguineo</td>
          </tr>      
        HTML;
      }
      ?>

    </table>
    <a href="index.html">Menu de opções</a>
  </div>

</body>

</html>