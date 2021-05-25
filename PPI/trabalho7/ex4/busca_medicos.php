<?php

require "../database/conexaoMysql.php";
$pdo = mysqlConnect();

class Medico
{
  public $nome;
  public $telefone;
  public $especialidade;

  function __construct($nome, $telefone, $especialidade)
  {
    $this->nome = $nome;
    $this->telefone = $telefone; 
    $this->especialidade = $especialidade;
  }
}

$especialidade = $_GET['especialidade'] ?? '';

$sql = <<<SQL
    SELECT nome_medico, telefone_medico
    FROM t7_medico
    WHERE especialidade_medico = ?
    SQL;

try{
  $stmt = $pdo->prepare($sql);
  $stmt->execute([$especialidade]);
} catch (Exception $e) {
    exit('Ocorreu uma falha: ' . $e->getMessage());
}

$medicos = array();
while ($row = $stmt->fetch()) {
    array_push($medicos, new Medico(htmlspecialchars($row['nome_medico']), htmlspecialchars($row['telefone_medico']),
        htmlspecialchars($row['especialidade_medico'])));
}

echo json_encode($medicos);